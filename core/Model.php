<?php
namespace Core;


use Illuminate\Database\Capsule\Manager as Capsule;

use Illuminate\Database\Eloquent\Model as BaseModel;


class Model extends BaseModel {

    protected $driver;

    protected $connection = 'mysql';

    public function __construct()
    {
        parent::__construct();
        $this->driver = new Capsule;
        $this->driver->addConnection([
            'driver' => config('database.driver'),
            'host' => config('database.host'),
            'database' => config('database.database'),
            'username' => config('database.username'),
            'password' => config('database.password'),
            'charset' => config('database.charset'),
            'collation' =>config('database.collation'),
            'prefix' => config('database.prefix'),
        ]);
    }

    
}