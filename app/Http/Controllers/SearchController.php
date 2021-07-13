<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function getSearchView(){
        $types = Type::all();
        $products = Product::all();
        return view("search", compact('types', 'products'));
    }
    public function singleSearch($type_id){
        $products = Product::query()->where("type_id", $type_id)->with(['image'])->get();
        return successResponse($products->toArray());
    }
}
