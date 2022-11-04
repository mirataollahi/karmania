<?php

namespace App\Controllers;

class Controller {

    public function __construct()
    {
        
    }
    
    public static function dispachController($route)
    {
        $controller = new $route->controller;
        $method = $route->method;
        $response = $controller->$method();
        echo $response->render();
    
    }
}