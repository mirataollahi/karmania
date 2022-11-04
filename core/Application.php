<?php

namespace Core;

use App\Controllers\Controller;

class Application
{

    protected $config ;
    public static $request = null;
    public function __construct()
    {
        $this->config = include('config.php');
        $this->runServices();
        $this->parsUrl();
        
    }

    public function __get($name)
    {
        if (isset($this->$name) === true){
            return $this->$name;
        } else {
            return null;
        }
    }

    public function request()
    {
        return self::$request;
    }

    public function runServices()
    {
        $services = $this->config['services'];
        foreach($services as $name => $service)
        {
            $runnigService =  new $service;
            if($name == 'request') self::$request = $runnigService;
        }
    }

    public function parsUrl()
    {
        $method = strtolower( request()->server('REQUEST_METHOD') );
        $uri = request()->server('PATH_INFO');
        $route = Router::findUri( $uri , $method);
        if($route) Controller::dispachController($route);
        
    }

  
}   