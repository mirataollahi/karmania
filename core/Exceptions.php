<?php

namespace Core;


use Symfony\Component\ErrorHandler\Debug;
use Symfony\Component\ErrorHandler\ErrorHandler;
use Symfony\Component\ErrorHandler\DebugClassLoader;

class Exceptions {
    
    public function __construct()
    {
        Debug::enable();
    }
}

