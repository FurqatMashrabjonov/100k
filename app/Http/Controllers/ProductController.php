<?php

namespace App\Http\Controllers;

use App\Models\Info;
use App\Models\Like;
use App\Models\Notification;
use App\Models\Product;
use App\Models\Region;
use Illuminate\Http\Request;
use MongoDB\Driver\Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where("status_id", Product::NOT_SALED)
            ->with(['image', 'user', 'discount'])
            ->orderBy("created_at","desc")
            ->get();

        return view("welcome", compact("products"));
    }


    public function productDetail($product_id)
    {
        $product = Product::query()->where("id", $product_id)
            ->with(['image', 'user', 'discount'])
            ->first();
        $regions = Region::all();
        if (!empty($product) and $product){
            return view("product_single", compact("product", 'regions'));
        }else {
            return redirect(url("/"));
        }
    }


    public function like(Request $request)
    {
        if (auth()->check()) {

            $like = Like::query()
                ->where('user_id', auth()->user()->getAuthIdentifier())
                ->where('product_id', $request->product_id)
                ->first();
            if (!empty($like) and $like){
                return errorResponse();
            }else{
                Like::query()->insert([
                    'user_id' => auth()->user()->getAuthIdentifier(),
                    'product_id' => $request->product_id
                ]);
                Product::query()->find($request->product_id)->increment("like");

                $info = Info::query()->where("key", "liked_product")->first();
                Notification::query()->insert([
                    'user_id' => auth()->user()->getAuthIdentifier(),
                    'info_id' => $info->id,
                    'status' => Notification::NOT_VIEWED
                ]);

                return successResponse([
                    'like' => Product::query()->find($request->product_id)->like
                ]);
            }
        }else{
            return redirect(route("login"));
        }
    }





    public function referal($user, $product){
        return successResponse(['user' => $user, 'product' => $product]);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
