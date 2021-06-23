<?php

namespace Database\Seeders;

use App\Models\Referal;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ReferalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Referal::insert([
           'user_id' => 1,
            'product_id' => 3,
            'token' => Str::random(50)
        ]);
    }
}
