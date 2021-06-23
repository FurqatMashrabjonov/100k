<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Region;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
           CitySeeder::class,
           RegionSeeder::class,
            UserSeeder::class,
            StatusSeeder::class,
            TypeSeeder::class,
            ProductSeeder::class,
            ReferalSeeder::class,
            DiscountSeeder::class
        ]);
    }
}
