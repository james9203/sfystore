<?php

namespace jamesluo\sfystore\Http;

class Request
{
    public $url;
    public $headers;
    public $body;
    public $method;

    public function __construct($method, $url, array $headers = array(), $body = null)
    {
        $this->method = strtoupper($method);
        $this->url = $url;
        $this->headers = $headers;
        $this->body = $body;
    }
}
