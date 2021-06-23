<?php


namespace App\Http\Controllers\Auth;


use App\Models\User;
use Faker\Factory;
use Illuminate\Support\Facades\Hash;
use \Illuminate\Support\Str;

trait CreateUserTrait
{
    public function createUser($phone)
    {
        $faker = Factory::create();

        $user = new User();
        $user->phone = $phone;
        $user->email = $faker->unique()->email;
        $user->password = Hash::make(Str::random(10));
        $user->phone_token = rand(100000, 999999);
        $user->save();
        return $user;
    }
}
