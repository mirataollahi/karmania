<?php

namespace Core;
class Request
{

    public $server = [];
    public $get = [];
    public $post = [];
    public $input = [];

    public function __construct()
    {
        $this->makeRequest();
    }

    public function __get($name)
    {
        if (isset($this->$name) === true){
            return $this->$name;
        } else {
            return null;
        }
    }

    public function input($index)
    {
        $params = $this->params();
        if(array_key_exists($index , $params)) 
            return $params[$index];
        else return null;
    }

    public function get($index)
    {
        return $this->input($index);
    }


    public function makeRequest()
    {
        $this->server = $_SERVER;
        $this->get = $_GET;
        $this->post = $_POST;
    }

    public function params()
    {
        $arrray = [];
        return array_merge($arrray , $this->get , $this->post);  
    }

    public function server($index = null)
    {
        if(array_key_exists($index , $this->server)) 
            return $this->server[$index];

        else if(is_null($index)) return $this->server;
        else return null;
    }

    
}