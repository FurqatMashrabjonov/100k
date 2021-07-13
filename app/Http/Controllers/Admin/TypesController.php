<?php


namespace App\Http\Controllers\Admin;


use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TypesController
{
    public function index(){
       $types = Type::all();
        return view("admin.types", compact("types"));
    }

    public function store(Request $request){
        $request->validate([
            'name' => ['required']
        ]);

        $type = new Type();
        $type->key = Str::snake($request->name);
        $type->name = $request->name;
        $res = $type->save();
        if ($res)
            return redirect()->back();
    }
}
