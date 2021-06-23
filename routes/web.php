<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Auth\BeforeLogin;
use App\Http\Controllers\Auth\UserItemsController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReferalController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get("/", [ProductController::class, 'index']);

Route::group(['middleware' => 'guest'], function () {
    Route::post('before_login', [BeforeLogin::class, 'index'])->name('before_login');
    Route::get('verify', [BeforeLogin::class, 'getVerify']);
    Route::post("verify", [BeforeLogin::class, 'verify'])->name("verify");
    Route::get("user_items", [UserItemsController::class, 'index']);
    Route::post("user_items", [UserItemsController::class, 'save'])->name("user_items");
    Route::get("get_cities", [CityController::class, 'index'])->name("get_cities");

});

Route::get("product/{product}", [ProductController::class, 'productDetail']);
Route::post("like", [ProductController::class, 'like'])->name("like");

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get("login", [AuthController::class, 'getLoginForm']);
    Route::post("login", [AuthController::class, 'login'])->name("login");

    Route::group(['middleware' => 'admin'], function () {
        Route::get("dashboard", [AdminController::class, 'index'])->name("dashboard");

        //Products
        Route::get("/products", [ProductsController::class, 'index']);
        Route::post("/products", [ProductsController::class, 'store'])->name('products');
    });
});



//--------------Referal--------------

Route::get("r/{referal_token}", [ReferalController::class, 'index']);

//-----------------------------------
