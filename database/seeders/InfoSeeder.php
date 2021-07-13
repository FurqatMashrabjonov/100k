<?php

namespace Database\Seeders;

use App\Models\Info;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class InfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Info::query()
            ->insert([
                'key' => 'success_register',
                'description' => 'Siz muvoffiqiyatli ro\'yxatdan o\'tdingiz!',
                'url' => "home",
                'created_at' => Carbon::now()
            ]);

        Info::query()
            ->insert([
                'key' => 'balance_replenished',
                'description' => 'Hisobingiz to\'ldirildi.',
                'url' => "profile/admin",
                'created_at' => Carbon::now()
            ]);

        Info::query()
            ->insert([
                'key' => 'liked_product',
                'description' => 'Tovar mening sevimlilarimga qo\'shildi.',
                'url' => "profile/my_likes",
                'created_at' => Carbon::now()

            ]);

        Info::query()
            ->insert([
                'key' => 'team_added',
                'description' => 'Jamoaingizda yangi a\'zo qo\'shilmoqchi.',
                'url' => "profile/team",
                'created_at' => Carbon::now()

            ]);

        Info::query()
            ->insert([
                'key' => 'balance_withdrawed',
                'description' => 'hisobingizdan mablag\' yechib olindi.',
                'url' => "profile/balance_history",
                'created_at' => Carbon::now()

            ]);

    }
}
