<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::query()
            ->insert([
                'name' => 'Yunusobod',
                'region_id' => 1,
            ]);

        City::query()
            ->insert([
                'name' => 'Chilonzor',
                'region_id' => 1,
            ]);

        City::query()
            ->insert([
                'name' => "Mirzo Ulug'bek",
                'region_id' => 1,
            ]);
        City::query()
            ->insert([
                'name' => 'Asaka',
                'region_id' => 2,
            ]);
        City::query()
            ->insert([
                'name' => "Bo'z",
                'region_id' => 2,
            ]);
    }
}
