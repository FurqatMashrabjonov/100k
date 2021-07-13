<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\Discount;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Helpers\TelegramBotHelper;
use Illuminate\Support\Carbon;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'product_id' => ['required', 'numeric'],
            'phone' => ['required'],
            'region_id' => ['required', 'numeric'],
            'address' => ['required'],
            'count' => ['required', 'numeric']
        ]);
        $checkout = new Checkout();
        $checkout->name = $request->name;
        $checkout->phone = phone_format($request->phone);
        $checkout->region_id = $request->region_id;
        $checkout->address = $request->address;
        $checkout->count = $request->count;
        $checkout->product_id = $request->product_id;
        $checkout->status = Checkout::NOT_ACCEPTED;
//        $checkout->created_at = Carbon::now()->addHour(5);
//        $checkout->updated_at = Carbon::now()->addHour(5);

        $checkout->referal_id = (isset($request->referal_id) and $request->referal_id) ? $request->referal_id : null;
        $product = Product::query()->where('id', $request->product_id)->with(['discount', 'image'])->first();
        if ($product->discount->type == Discount::PERCENT){
            $amount =((int)$product->price - ((int)$product->price * (int)$product->discount->value) / 100) * (int)$checkout->count;
        }else if ($product->discount->type == Discount::SUMM) {
            $amount = ((int)$product->price - (int)$product->discount->value) * (int)$checkout->count;
        }

        if ($amount != null){
            $checkout->amount = $amount;
        }
        if ($checkout->save()){
            TelegramBotHelper::sendCheckout($checkout);
            TelegramBotHelper::sendTest($checkout);
            $product = Product::find($checkout->product_id);
            return view("success_checkout", compact("checkout", 'product'));

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function show(Checkout $checkout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function edit(Checkout $checkout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Checkout $checkout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function destroy(Checkout $checkout)
    {
        //
    }
}
