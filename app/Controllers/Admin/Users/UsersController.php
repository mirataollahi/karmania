<?php

namespace App\Controllers\Admin\Users;

use App\Models\User;

class UsersController{

    public function __construct()
    {
        
    }

    public function index()
    {
        $users = User::query()->get();
        return view('admin.users.index');

    }

    public function show($id)
    {

    }

    public function create()
    {

    }
    
    public function store()
    {
        
    }

    public function edit($id)
    {
        
    }

    public function update($id)
    {
        
    }


    public function destroy($id)
    {
        
    }
}