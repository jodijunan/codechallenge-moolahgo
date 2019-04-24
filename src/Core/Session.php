<?php

namespace Homiedopie\Core;

/**
 * Session class
 */
class Session
{
    /**
     * Session instance
     *
     * @var Session
     */
    protected static $instance;

    /**
     * Session constructor
     */
    public function __construct()
    {}


    /**
     * Session set key value
     *
     * @param string $key
     * @return void
     */
    public function set($key, $value)
    {
        if (!$key) {
            return;
        }
        $_SESSION[$key] = $value;
    }

    /**
     * Session get key
     *
     * @param string $key
     * @return string|null
     */
    public function get($key)
    {
        return isset($_SESSION[$key]) ? $_SESSION[$key]: null;
    }

    /**
     * Remove session key
     *
     * @param string $key
     * @return void
     */
    public function remove($key)
    {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }

    /**
     * Session singleton instantation
     *
     * @return void
     */
    public static function getInstance()
    {
        if (static::$instance) {
            return static::$instance;
        }

        return static::$instance = new self();
    }

    /**
     * Session start
     *
     * @return void
     */
    public function start()
    {
        session_start();
    }
}
