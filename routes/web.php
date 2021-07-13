<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Auth\BeforeLogin;
use App\Http\Controllers\Auth\UserItemsController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReferalController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TeamController;
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

Route::get("time", function (){
    return \Illuminate\Support\Carbon::now()->addHour(5);
});


Auth::routes();

Route::get("*", function (){
    return view("404");
});

Route::get("notify_viewed", [\App\Http\Controllers\NotificationController::class, 'viewed']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get("/", [ProductController::class, 'index']);

Route::group(['middleware' => 'guest'], function () {
    Route::post('before_login', [BeforeLogin::class, 'index'])->name('before_login');
    Route::get('verify', [BeforeLogin::class, 'getVerify']);
    Route::post("verify", [BeforeLogin::class, 'verify'])->name("verify");
    Route::get("user_items", [UserItemsController::class, 'index']);
    Route::post("user_items", [UserItemsController::class, 'save'])->name("user_items");
});
Route::get("get_cities", [CityController::class, 'index'])->name("get_cities");


Route::group(['middleware' => 'auth', 'prefix' => 'profile', 'as' => 'profile.'], function () {
    Route::get('admin', [ProfileController::class, 'getAdminView']);
    Route::get('favorites', [ProfileController::class, 'getFavoritesView']);

    Route::get("payment", [PaymentController::class, 'index']);
    Route::post("payment_sent", [PaymentController::class, 'store']);

    Route::get("my_likes", [ProfileController::class, 'getMyLikesView']);
    Route::get("my_orders", [ProfileController::class, 'getMyOrdersView']);
    Route::get('settings', [ProfileController::class, 'getSettingsView']);
    Route::post('update_user', [ProfileController::class, 'updateUser']);
    Route::get("balance_history", [ProfileController::class, 'getBalanceHistoryView']);
    Route::get("about", [ProfileController::class, 'getAboutView']);
    Route::get("diagrams", [ProfileController::class, 'getDiagramsView']);
    Route::get("team", [ProfileController::class, 'getTeamView']);
    Route::get("subway", [ProfileController::class, 'getSubwayView']);
    Route::get('requests', [ProfileController::class, 'getRequestsView']);


    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::get('referals', [ProfileController::class, 'getReferalsView']);
        Route::get("referals/delete/{referal}", [ReferalController::class, 'destroy']);
        Route::get("statistika", [ProfileController::class, 'getStatistikaView']);
        Route::get("market", [ProfileController::class, 'getMarketView']);
        Route::post('referals', [ReferalController::class, 'store'])->name("create_referal");
    });
});


Route::post("checkout_create", [CheckoutController::class, 'store'])->name("checkout_create");

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
        Route::post("update_product", [ProductsController::class, 'update'])->name("update_product");
        //Checkout
        Route::get("/checkouts", [\App\Http\Controllers\Admin\CheckoutController::class, 'index']);
        Route::get("checkout_saled/{id}", [\App\Http\Controllers\Admin\CheckoutController::class, 'checkoutSaled']);
        Route::get("checkout_salling/{id}", [\App\Http\Controllers\Admin\CheckoutController::class, 'checkoutSelling']);
        Route::get('checkout_accepted/{id}', [\App\Http\Controllers\Admin\CheckoutController::class, 'checkoutAccepted']);
        //Payments
        Route::get("/payments", [\App\Http\Controllers\Admin\PaymentController::class, 'index']);
        Route::get("payment_status/{status}/{id}", function ($status, $id, \App\Http\Controllers\Admin\PaymentController $payment){
           return $payment->{$status . "_method"} ($id);
        });

        //Discounts
        Route::get("discounts", [\App\Http\Controllers\Admin\DiscountController::class, 'index']);
        Route::post("discounts", [\App\Http\Controllers\Admin\DiscountController::class, 'store'])->name("discount");

        //Users
        Route::get("users", [\App\Http\Controllers\Admin\UsersController::class, 'index']);

        //Types
        Route::get("types", [\App\Http\Controllers\Admin\TypesController::class, 'index']);
        Route::post("types", [\App\Http\Controllers\Admin\TypesController::class, 'store']);

        //Requests
        Route::post("store_request", [\App\Http\Controllers\Admin\CheckoutController::class, 'storeRequest']);

        Route::post("reason_store", [\App\Http\Controllers\Admin\CheckoutController::class, 'reasonUpdate']);
    });
});


//Search
Route::get("search", [SearchController::class, 'getSearchView']);
Route::get("searched/{type_id}", [SearchController::class, 'singleSearch']);

//--------------Referal--------------

Route::get("r/{referal_token}", [ReferalController::class, 'index']);
Route::get("u/{team_token}",    [TeamController::class, 'index']);
//-----------------------------------


Route::get("contact", function () {
    return view("contact");
});



Route::get("ddd", function (){
    \App\Helpers\TelegramBotHelper::sendTest();
});

Route::get("/upload", function (){
    return view("image_uploader");
});