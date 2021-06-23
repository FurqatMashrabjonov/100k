<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::query()
            ->insert([
                'key' => 'phone',
                'name' => 'Telefon'
            ]);

        Type::query()
            ->insert([
                'key' => 'computer',
                'name' => 'Kompyuter'
            ]);

        Type::query()
            ->insert([
                'key' => 'electronic',
                'name' => 'Elektronika'
            ]);
    }
}
