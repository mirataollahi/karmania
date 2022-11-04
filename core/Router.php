<?php

namespace Core;

class Router{

    public static  $routes = []; 

    public function __construct()
    {
        include('web.php');
    }

    public static function get(string $uri , array $mixedControllerMethods ,  $routeName = null)
    {
        return self::registerRoute( $uri ,  $mixedControllerMethods ,  $routeName , 'get');
    }

    public static function post(string $uri , array $mixedControllerMethods ,  $routeName = null)
    {
        return self::registerRoute( $uri ,  $mixedControllerMethods ,  $routeName , 'post');
    }
    public static function put(string $uri , array $mixedControllerMethods ,  $routeName = null)
    {
        return self::registerRoute( $uri ,  $mixedControllerMethods ,  $routeName , 'put');
    }
    public static function delete(string $uri , array $mixedControllerMethods ,  $routeName = null)
    {
        return self::registerRoute( $uri ,  $mixedControllerMethods ,  $routeName , 'delete');
    }

    
    public static function resource(string $uri , $controller , string $routeName)
    {
        self::registerRoute( $uri ,  [$controller , 'get'] ,  $routeName , 'get');
        self::registerRoute( $uri ,  [$controller , 'post'] ,  $routeName , 'post');
        self::registerRoute( $uri ,  [$controller , 'put'] ,  $routeName , 'put');
        self::registerRoute( $uri ,  [$controller , 'delete'] ,  $routeName , 'delete');
        return $routeName;

    }

    public function name($route , $name)
    {
        if($route = $this->find($route)) $route['name'] = $name;
    }

    public function registerRoute(string $uri , array $mixedControllerMethods , $routeName = null , string $urlMethod)
    {
        $route = new Route($uri , $mixedControllerMethods[0]  , $mixedControllerMethods[1] , $routeName , $urlMethod);
        self::$routes [] = $route;
        return $route;
    }

    public static function route(string $name , ...$params)
    {
        $route = self::findRouteByName($name);
        return $route ?  $route->fullUrl : '#';
    }

    public function find($route)
    {
        foreach(self::$routes as $item) 
            if ($route->uri == $item->uri AND $route->method == $item->method ) return $route ;
        return null;
    }

    public static function findUri(string $uri , string $method)
    {
        foreach(self::$routes as $item) 
            if ($uri == $item->uri AND $method == $item->urlMethod ) return $item ;
        return null;
    }

    public function findRouteByName($name)
    {
        foreach(self::$routes as $route) 
            if ($route->name == $name ) return $route ;

        return null;
    }

}