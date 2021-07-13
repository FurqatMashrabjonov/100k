<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get("products", function (){
    $products = \App\Models\Product::all();
    return successResponse($products->toArray());
});

Route::get("checkouts/{status}", [ApiController::class, 'checkouts']);
Route::get('checkout_accepted/{id}', [\App\Http\Controllers\Admin\CheckoutController::class, 'checkoutAccepted']);
Route::get("checkout_salling/{id}", [\App\Http\Controllers\Admin\CheckoutController::class, 'checkoutSellingApi']);
Route::get("checkout_saled/{id}", [\App\Http\Controllers\Admin\CheckoutController::class, 'checkoutSaledApi']);
//Route::get('checkout_accepted/{id}', [\App\Http\Controllers\Admin\CheckoutController::class, 'checkoutAcceptedApi']);