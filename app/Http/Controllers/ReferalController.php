<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Referal;
use App\Models\Region;
use App\Models\User;
use Illuminate\Http\Request;

class ReferalController extends Controller
{






    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
     */
    public function index($referal_token)
    {
        $referal = Referal::query()
            ->where("token", $referal_token)
            ->with(['user', 'product'])
            ->first();
        $regions = Region::all();
        if (!empty($referal) and $referal){
            $product = Product::where("id", $referal->product_id)->with(['user', 'image', 'discount'])->first();
            $referal_user = $referal->user;
            return view("product_single", compact('product', 'referal_user', 'referal', 'regions'));
        }else{
            return view("404");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Referal  $referal
     * @return \Illuminate\Http\Response
     */
    public function show(Referal $referal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Referal  $referal
     * @return \Illuminate\Http\Response
     */
    public function edit(Referal $referal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Referal  $referal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Referal $referal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Referal  $referal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Referal $referal)
    {
        //
    }
}
