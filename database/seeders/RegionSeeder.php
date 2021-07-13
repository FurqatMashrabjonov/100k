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
                'name' => "Toshkent shahri"
            ]);

        Region::query()
            ->create([
                'id' => 2,
                'name' => "Andijon viloyati"
            ]);
			
        Region::query()
            ->create([
                'id' => 3,
                'name' => "Fargʻona viloyati"
            ]);
			
		Region::query()
            ->create([
                'id' => 4,
                'name' => "Namangan viloyati"
            ]);
			
		Region::query()
            ->create([
                'id' => 5,
                'name' => "Toshkent viloyati"
            ]);
		
		Region::query()
            ->create([
                'id' => 6,
                'name' => "Sirdaryo viloyati"
            ]);
		
		Region::query()
            ->create([
                'id' => 7,
                'name' => "Jizzax viloyati"
            ]);
			
		Region::query()
            ->create([
                'id' => 8,
                'name' => "Surxondaryo viloyati"
            ]);
			
		Region::query()
            ->create([
                'id' => 9,
                'name' => "Qashqadaryo viloyati"
            ]);
			
		Region::query()
            ->create([
                'id' => 10,
                'name' => "Samarqand viloyati"
            ]);
			
		Region::query()
            ->create([
                'id' => 11,
                'name' => "Buxoro viloyati"
            ]);
			
		Region::query()
            ->create([
                'id' => 12,
                'name' => "Navoiy viloyati"
            ]);
			
		Region::query()
            ->create([
                'id' => 13,
                'name' => "Xorazm viloyati"
            ]);
			
		Region::query()
            ->create([
                'id' => 14,
                'name' => "Qoraqalpogʻiston"
            ]);

    }
}
