<?php


namespace App\Http\Controllers\Admin;


use App\Models\User;

class UsersController
{
    public function index(){
        $users = User::all();
        return view("admin.users", compact("users"));
    }
}
