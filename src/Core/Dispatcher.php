<?php

namespace Homiedopie\Core;

/**
 * Router class
 */
class Dispatcher
{
    /**
     * Dispatches request to the right controllers
     *
     * @param Request $request
     * @param array|string $options
     * @return void
     */
    public function dispatch(Request $request, $options)
    {
        if (\is_string($options)) {
            return $this->resolve($request, $options);
        } elseif (\is_array($options)) {
            $options = isset($options['options']) ? $options['options']: null;
            return $this->resolve($request, $options);
        }
        error_log('Dispatcher::resolve - Empty result');
        return null;
    }

    /**
     * Resolves class and methods
     *
     * @param Request $request
     * @param array|string $options
     * @return null|Response
     */
    protected function resolve($request, $options, $optionMethod = null)
    {
        if (!$options) {
            error_log('Dispatcher::resolve - Empty option');
            return null;
        }

        $resolveAll = $optionMethod === 'all';
        $class = null;
        $method = \strtolower($request->getMethod());

        if (!\is_string($options)) {
            if (!is_array($options)) {
                error_log('Dispatcher::resolve - Options not array');
                return null;
            }

            if (isset($options['controller'])) {
                $class = $options['controller'];
            }
            if (isset($options['method'])) {
                $method = $options['method'];
            }
        } else {
            $classMethod = explode('@', $options);
            $class = $classMethod[0];

            if (isset($classMethod[1])) {
                $method = $classMethod[1];
            }
        }

        try {
            $controller = new $class();
            return $controller->$method($request);
        } catch (\Error $error) {
            error_log('Dispatcher::resolve - Something went wrong - Error: '.$error->getMessage());
            throw $error;
        } catch (\Exception $exception) {
            error_log('Dispatcher::resolve - Something went wrong - Exception: '.$exception->getMessage());
            throw $exception;
        }
    }
}
