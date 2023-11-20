<?php

namespace Utility;

final class Request {
    private $method;
    private $uri;
    private $headers;
    private $data;

    public function __construct() {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->uri = $_SERVER['REQUEST_URI'];
        $this->headers = getallheaders();
        $this->data = $_REQUEST; // Includes GET, POST, and COOKIE data
    }

    public function getMethod() {
        return $this->method;
    }

    public function getUri() {
        return $this->uri;
    }

    public function getHeaders() {
        return $this->headers;
    }

    public function getData() {
        return $this->data;
    }

    public function get($name) {
        if (isset($this->data[$name])) {
            return $this->data[$name];
        } 
        else 
        {
            throw new \Exception('No key passed under "'. $name .'"');
        }
    }
}