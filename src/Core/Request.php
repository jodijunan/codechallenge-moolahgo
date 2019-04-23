<?php

namespace Homiedopie\Core;

/**
 * Request class
 */
class Request
{
    /**
     * $_POST values bag
     *
     * @var array
     */
    protected $post;
    /**
     * $_GET values bag
     *
     * @var array
     */
    protected $get;
    /**
     * $_SERVER values bag
     *
     * @var array
     */
    protected $server;
    /**
     * Request HTTP Method
     *
     * @var string
     */
    protected $method;
    /**
     * Request Value
     *
     * @var string
     */
    protected $value;
    /**
     * Request PATH_INFO
     *
     * @var string
     */
    protected $pathInfo;

    /**
     * Request constructor
     *
     * @param array $post
     * @param array $get
     * @param array $server
     */
    public function __construct($post, $get, $server)
    {
        $this->post = $post;
        $this->get = $get;
        $this->server = $server;
    }

    /**
     * Get request method
     *
     * @return string
     */
    public function getMethod()
    {
        if ($this->method != null) {
            return $this->method;
        }

        return $this->method = $this->server['REQUEST_METHOD'] ? $this->server['REQUEST_METHOD']: 'GET';
    }

    /**
     * Get request value
     *
     * @param string $key
     * @return string|null
     */
    public function getValue($key)
    {
        if (isset($this->value[$key])) {
            return $this->value[$key];
        }

        if (isset($this->get[$key])) {
            return $this->value[$key] = $this->get[$key];
        }

        if (isset($this->post[$key])) {
            return $this->value[$key] = $this->post[$key];
        }

        return null;
    }

    /**
     * Get server PATH_INFO
     *
     * @return void
     */
    public function getPathInfo()
    {
        if ($this->pathInfo != null) {
            return $this->pathInfo;
        }

        return $this->pathInfo = $this->server['PATH_INFO'] ? $this->server['PATH_INFO'] : null;
    }
}
