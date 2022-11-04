<?php

use Core\Application;
use Core\Request;
use Core\Router;
use Core\View;

function request()
{
    return Application::$request;
}

function url()
{
    return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
}

function route($name , ...$params)
{
    return Router::route($name , $params);
}

function view(string $address)
{
    return new View($address);
}


function config($index = null)
{
    $configs = include('config.php');
    if(is_null($index)) return $configs;
    else if(array_key_exists($index , $configs)) return $configs[$index];
    else if(str_contains($index , '.'))
    {
        $exploded = explode('.' , $index );
        if( array_key_exists($exploded[0] , $configs))
        {
            $secondIndex = $configs[$exploded[0]];
            if(array_key_exists($exploded[1] , $secondIndex))
                return $configs[$exploded[0]][$exploded[1]];
        }
    }
    else return null;
}