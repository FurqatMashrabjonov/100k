<?php


namespace App\Http\Controllers\Admin;


use App\Models\Image;
use App\Models\Product;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductsController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::query()->with(['status', 'type', 'image'])->get();
        return view('admin.products', compact('products'));
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'description' => ['required'],
            'type_id' => ['required', 'numeric', 'exists:types,id'],
            'price' => ['required', 'numeric'],
            'images' => ['required', 'mimes:jpg,jpeg,png'],
            'count' => ['required', 'numeric']
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->type_id = $request->type_id;
        $product->status_id = Product::NOT_SALED;
        $product->token = Str::random(40);
        $product->user_id = auth()->user()->getAuthIdentifier();
        $product->like = 0;
        $product->count = $request->count;

        if ($product->save()) {

            $image = $request->file('images');
            $image_name = time() . '.' . $image->getClientOriginalName();
            $destinationPath = public_path('products');
            $image->move($destinationPath, $image_name);
            Image::query()->insert([
                'name' => $image_name,
                'product_id' => $product->id
            ]);
            //
//            foreach ($images as $image) {
//                $image_name = time() . '.' . $image->getClientOriginalName();
//                $destinationPath = public_path('products');
//                $image->move($destinationPath, $image_name);
//                Image::query()->insert([
//                    'name' => $image_name,
//                    'product_id' => $product->id
//                ]);
//            }

        }
        return response()->json($request->all());
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
