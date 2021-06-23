<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'email' => "admin@mail.ru",
            'password' => Hash::make("admin12345"),
            "phone" => "+998994444444",
            'is_admin' => true,
            'avatar' => "admin.jpg",
            'first_name' => "Admin",
            'last_name' => "Adminov"
        ]);
    }
}
