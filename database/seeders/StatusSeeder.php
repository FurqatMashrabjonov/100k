<?php

namespace Database\Seeders;

use App\Models\Checkout;
use App\Models\Product;
use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::query()
            ->insert([
                'model' => Product::class,
                'key' => 'not_saled',
                'description' => 'Sotilmagan'
            ]);

        Status::query()
            ->insert([
                'model' => Product::class,
                'key' => 'saled',
                'description' => 'Sotilgan'
            ]);

        Status::query()
            ->insert([
                'model' => Product::class,
                'key' => 'sent',
                'description' => 'Jo\'natildi'
            ]);

        Status::query()
            ->insert([
                'model' => Checkout::class,
                'key' => 'not_saled',
                'description' => 'Sotilmadi'
            ]);

        Status::query()
            ->insert([
                'model' => Checkout::class,
                'key' => 'saled',
                'description' => 'Sotildi'
            ]);
    }
}
