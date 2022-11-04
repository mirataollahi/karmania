<?php

namespace Core;

class Route {

    public $uri , $controller , $method , $name , $urlMethod , $fullUrl;

    public function __construct(string $uri , string $controller , string $method , $name = null , $urlMethod = 'get')
    {
        $this->uri = $uri;
        $this->controller = $controller;
        $this->method = $method;
        $this->name = $name;
        $this->urlMethod = $urlMethod;
        $this->fullUrl = $this->fullUrl($uri);

    }
    
    public function name(string $name)
    {
        $this->name = $name;
    }

    public function fullUrl($uri)
    {
        $schema = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
        $host = $schema . "://" . $_SERVER['HTTP_HOST'];
        return $host . $uri;
    }

    

}