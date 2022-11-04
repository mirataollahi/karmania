<?php


return [

    
    'name' => 'cms',

    'url' => 'http://localhost',

    'timezone' => 'UTC',

    'database' => [
        'driver' => 'mysql' ,
        'host' => '127.0.0.1' ,
        'database' => 'cms' ,
        'username' => 'root' ,
        'password' => '' ,
        'charset' => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix' => '',
    ] ,



    /*
    |--------------------------------------------------------------------------
    | application running service
    |--------------------------------------------------------------------------
    |
    | This array of class services will be registered when this application
    | is started.
    |
    */
    'services' => [

        //application core service
        'request' => Core\Request::class ,
        'route' => Core\Router::class ,
        'errorHandler' => Core\Exceptions::class ,
        'model' => Core\Model::class ,

    ],

];