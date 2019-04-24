<?php

namespace Homiedopie\Core;

/**
 * Request class
 */
class Response
{
    /**
     * Header bag
     *
     * @var array
     */
    protected $headers;
    /**
     * Response content
     *
     * @var string
     */
    protected $content;
    /**
     * HTTP Status code
     *
     * @var int
     */
    protected $statusCode;
    /**
     * HTTP Status Text
     *
     * @var string
     */
    protected $statusText;
    /**
     * Status codes translation table.
     *
     * The list of codes is complete according to the
     * {@link http://www.iana.org/assignments/http-status-codes/ Hypertext Transfer Protocol (HTTP) Status Code Registry}
     * (last updated 2016-03-01).
     *
     * Unless otherwise noted, the status code is defined in RFC2616.
     *
     * @var array
     * @copyright 2019 Symfony
     */
    protected $statusTexts = [
        100 => 'Continue',
        101 => 'Switching Protocols',
        102 => 'Processing',            // RFC2518
        103 => 'Early Hints',
        200 => 'OK',
        201 => 'Created',
        202 => 'Accepted',
        203 => 'Non-Authoritative Information',
        204 => 'No Content',
        205 => 'Reset Content',
        206 => 'Partial Content',
        207 => 'Multi-Status',          // RFC4918
        208 => 'Already Reported',      // RFC5842
        226 => 'IM Used',               // RFC3229
        300 => 'Multiple Choices',
        301 => 'Moved Permanently',
        302 => 'Found',
        303 => 'See Other',
        304 => 'Not Modified',
        305 => 'Use Proxy',
        307 => 'Temporary Redirect',
        308 => 'Permanent Redirect',    // RFC7238
        400 => 'Bad Request',
        401 => 'Unauthorized',
        402 => 'Payment Required',
        403 => 'Forbidden',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        406 => 'Not Acceptable',
        407 => 'Proxy Authentication Required',
        408 => 'Request Timeout',
        409 => 'Conflict',
        410 => 'Gone',
        411 => 'Length Required',
        412 => 'Precondition Failed',
        413 => 'Payload Too Large',
        414 => 'URI Too Long',
        415 => 'Unsupported Media Type',
        416 => 'Range Not Satisfiable',
        417 => 'Expectation Failed',
        418 => 'I\'m a teapot',                                               // RFC2324
        421 => 'Misdirected Request',                                         // RFC7540
        422 => 'Unprocessable Entity',                                        // RFC4918
        423 => 'Locked',                                                      // RFC4918
        424 => 'Failed Dependency',                                           // RFC4918
        425 => 'Too Early',                                                   // RFC-ietf-httpbis-replay-04
        426 => 'Upgrade Required',                                            // RFC2817
        428 => 'Precondition Required',                                       // RFC6585
        429 => 'Too Many Requests',                                           // RFC6585
        431 => 'Request Header Fields Too Large',                             // RFC6585
        451 => 'Unavailable For Legal Reasons',                               // RFC7725
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
        502 => 'Bad Gateway',
        503 => 'Service Unavailable',
        504 => 'Gateway Timeout',
        505 => 'HTTP Version Not Supported',
        506 => 'Variant Also Negotiates',                                     // RFC2295
        507 => 'Insufficient Storage',                                        // RFC4918
        508 => 'Loop Detected',                                               // RFC5842
        510 => 'Not Extended',                                                // RFC2774
        511 => 'Network Authentication Required',                             // RFC6585
    ];

    /**
     * Response constructor
     *
     * @param string $content
     * @param integer $status
     * @param array $headers
     */
    public function __construct($content, $status, $headers = [])
    {
        $this->headers = $headers;
        $this->content = $content;
        $this->setStatusCode($status);
    }

    /**
     * Set HTTP status code along with the associate HTTP status text
     *
     * @param string $statusCode
     * @return this
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        $this->statusText = isset($this->statusTexts[$statusCode]) ? $this->statusTexts[$statusCode]: 'unknown';

        return $this;
    }

    /**
     * Responsible for sending header response
     *
     * @return this
     */
    public function outputHeaders()
    {
        if (headers_sent()) {
            return $this;
        }

        foreach ($this->headers as $key => $value) {
            $replace = strcasecmp($key, 'Content-Type') === 0;
            header($key.': '.$value, $replace, $this->statusCode);
        }

        header(sprintf('HTTP/1.0 %s %s', $this->statusCode, $this->statusText), true, $this->statusCode);
        return $this;
    }

    /**
     * Output response content
     *
     * @return this
     */
    public function outputContent()
    {
        echo $this->content;
        return $this;
    }

    /**
     * Flush output content and headers
     *
     * @return this
     */
    public function sendOutput()
    {
        $this->outputHeaders()->outputContent();

        if (\function_exists('fastcgi_finish_request')) {
            // Terminate request
            fastcgi_finish_request();
        }

        return $this;
    }

    /**
     * Return view template
     *
     * @param string $view
     * @param array $options
     * @return Response
     */
    public static function view($view, $options = [])
    {
        return new self(Template::render($view, $options), 200);
    }
}
