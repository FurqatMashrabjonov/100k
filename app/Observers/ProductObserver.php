<?php

namespace App\Observers;

use App\Models\Product;
use App\Models\Referal;

class ProductObserver
{
    public function deleted(Product $product){
        Referal::query()->where("product_id", $product->id)->delete();
    }
}
