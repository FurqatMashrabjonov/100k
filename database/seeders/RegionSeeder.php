<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Region::query()
            ->create([
                'id' => 1,
                'name' => "Toshkent"
            ]);

        Region::query()
            ->create([
                'id' => 2,
                'name' => "Andijon"
            ]);

    }
}
