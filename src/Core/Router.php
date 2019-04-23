<?php

namespace Homiedopie\Core;

/**
 * Router class
 */
class Router
{
    /**
     * Route collection
     *
     * @var array
     */
    protected $routes = [];

    /**
     * Get route
     *
     * @param string $route
     * @param string|array $options
     * @return null|string
     */
    public function get($route, $options)
    {
        return $this->addRoute('GET', $route, $options);
    }

    /**
     * Post route
     *
     * @param string $route
     * @param string|array $options
     * @return null|string
     */
    public function post($route, $options)
    {
        return $this->addRoute('POST', $route, $options);
    }

    /**
     * Add route that accepts all methods
     *
     * @param string $route
     * @param string|array $options
     * @return void
     */
    public function route($route, $options)
    {
        return $this->addRoute('all', $route, [
            'method' => 'all',
            'options' => $options
        ]);
    }

    /**
     * Add route to collection
     *
     * @param string $method
     * @param string $route
     * @param array $options
     * @return void
     */
    private function addRoute($method, $route, $options)
    {
        $this->routes[$route][$method] = $options;
    }

    /**
     * Matches route against the route collection
     *
     * @param string $method
     * @param string $route
     * @param callable $matcher
     * @return null|array
     */
    public function matchRoute($method, $route, $matcher = null)
    {
        if (!\is_string($route)) {
            error_log('Router::matchRoute - Empty route - '.$route);
            return null;
        }

        $useDefault = $matcher == null;
        if ($useDefault) {
            // Use default route matching
            if (isset($this->routes[$route])) {
                $route = $this->routes[$route];
                if (isset($route[$method])) {
                    return $route[$method];
                }
                if (isset($route['all'])) {
                    return $route['all'];
                }
            }
            return null;
        }

        if (\is_callable($matcher)) {
            return $matcher($this->routes, $route)[$method];
        }

        error_log('Router::matchRoute - No match - '.$route);
        return null;
    }
}
