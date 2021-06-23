<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::query()
            ->insert([
                'id' => 3,
                'name' => 'Telefon Sotiladi',
                'description' => "<p>Telefon sotiladi</p><br>Zor telefon. Holati yangi.",
                'price' => 3200000,
                'like' => 0,
                'user_id' => 1,
                'token' => Str::random(40),
                'status_id' => 1,
                'type_id' => 1,

            ]);

            Image::query()
                ->insert([
                   'product_id' => 3,
                   'name' => '1.jpg'
                ]);
        Image::query()
            ->insert([
                'product_id' => 3,
                'name' => '2.jpg'
            ]);
    }
}
