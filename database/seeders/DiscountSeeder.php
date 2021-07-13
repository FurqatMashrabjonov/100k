<?php

namespace Database\Seeders;

use App\Models\Discount;
use Illuminate\Database\Seeder;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Discount::query()->insert([
           'id' => 1,
           'name' => "Yozgi ta'til munosabati bilan har bir tovarga 10% chegirma!!!",
           'type' => Discount::PERCENT,
           'value' => 10
        ]);
    }
}
