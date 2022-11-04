<?php

use App\Controllers\Admin\Users\UsersController;
use Core\Router;



Router::get('/home' , [UsersController::class , 'index'] )->name('test.app');
