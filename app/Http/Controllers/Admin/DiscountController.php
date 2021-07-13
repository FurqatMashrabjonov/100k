<?php


namespace App\Http\Controllers\Admin;


use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController
{

    public function index(){
        $discounts = Discount::all();
        return view("admin.discounts", compact("discounts"));
    }

    public function store(Request $request){
        $request->validate([
           'name' => ['required', 'string'],
           'type' => ['required'],
            'value' => ['required', 'numeric']
        ]);

            $discount = new Discount();
            $discount->name = $request->name;
            $discount->type = $request->type;
            $discount->value = $request->value;
            if ($discount->save()){
                return redirect()->back();
            }
    }

}
