<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function getSearchView(){
        $types = Type::all();
        $products = Product::query()->where("type_id", $types[0]->id)->get();
        return view("search", compact('types', 'products'));
    }
}
