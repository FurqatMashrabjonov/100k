<?php

namespace Database\Seeders;

use App\Models\Checkout;
use App\Models\Payment;
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
                'description' => 'Sotilmadi',
                'id' => 4
            ]);

        Status::query()
            ->insert([
                'model' => Checkout::class,
                'key' => 'deliving',
                'description' => 'Yetkazilmoqda',
                'id' => 6
            ]);

        Status::query()
            ->insert([
                'model' => Checkout::class,
                'key' => 'ignore',
                'description' => 'Bekor qilindi',
                'id' => 7
            ]);

        Status::query()
            ->insert([
                'model' => Checkout::class,
                'key' => 'saled',
                'description' => 'Sotildi',
                'id' => 5
            ]);


        //Payments
        Status::query()
            ->insert([
                'model' => Payment::class,
                'key' => 'payed',
                'description' => 'To\'landi',
                'id' => 8
            ]);

        Status::query()
            ->insert([
                'model' => Payment::class,
                'key' => 'not_payed',
                'description' => 'To\'lanmadi',
                'id' => 9
            ]);

        Status::query()
            ->insert([
                'model' => Payment::class,
                'key' => 'abort',
                'description' => 'Bekor qilindi',
                'id' => 10
            ]);
    }
}
