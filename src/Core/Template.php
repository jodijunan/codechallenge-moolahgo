<?php

namespace Homiedopie\Core;

/**
 * Router class
 */
class Template
{
    /**
     * View directory
     *
     * @var string
     */
    protected static $directory;

    /**
     * Set view directory
     *
     * @param string $directory
     * @return void
     */
    public static function setViewDirectory($directory)
    {
        static::$directory = $directory;
    }

    /**
     * Require view file
     *
     * @param string $view
     * @param array $options
     * @return void
     */
    public static function requireFile($view, $options = [])
    {
        extract($options);
        try {
            require(static::$directory . DIRECTORY_SEPARATOR . $view . '.php');
        } catch (\Error $err) {
            error_log('Template::require - Something went wrong - Error: '.$err->getMessage());
        } catch (\Exception $exception) {
            error_log('Template::require - Something went wrong - Exception: '.$err->getMessage());
        }
    }

    /**
     * Render function
     *
     * @param string $view
     * @param array $options
     * @return string
     */
    public static function render($view, $options)
    {
        ob_start();
        static::requireFile($view, $options);
        return \ob_get_clean();
    }
}
