<?php


namespace App\Http\Controllers\Admin;


class AdminController
{
    public function index(){
        return view("admin.dashboard")->with(['page' => 'dashboard']);
    }
}
