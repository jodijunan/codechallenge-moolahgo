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
     * Get raw post
     *
     * @var string
     */
    protected $rawPost;
    /**
     * Get decoded raw post
     *
     * @var string
     */
    protected $decodedRawPost;

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

        return $this->method = isset($this->server['REQUEST_METHOD']) ? $this->server['REQUEST_METHOD']: 'GET';
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
     * Get all post values
     *
     * @return array|null
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * Get raw post body
     *
     * @param string $key
     * @return string
     */
    public function getRawPost()
    {
        if ($this->rawPost) {
            return $this->rawPost;
        }

        return $this->rawPost = file_get_contents('php://input');
    }

    /**
     * Get decoded raw post body
     *
     * @param string $key
     * @return array|null
     */
    public function getDecodedRawPost()
    {
        $body = null;
        if (!$body) {
            $body = $this->getRawPost();
            if (is_string($body)) {
                $body = json_decode($body, true);
                if ($body !== null || $body !== false) {
                    return $this->decodedRawPost = $body;
                }
            }
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

        $url = isset($this->server['REQUEST_URI']) ? parse_url($_SERVER['REQUEST_URI']) : null;
        return $this->pathInfo = $url !== false ? $url['path']: null;
    }
}
