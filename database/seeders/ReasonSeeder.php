<?php

namespace Database\Seeders;

use App\Models\Reason;
use Illuminate\Database\Seeder;

class ReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reason::query()
            ->insert([
                'description' => "Qo'ng'iroqlarga javob berilmadi"
            ]);
        Reason::query()
            ->insert([
                'description' => "Xaridor tomonidan bekor qilindi"
            ]);
        Reason::query()
            ->insert([
                'description' => "Tovar xaridorga ma'qul kelmadi"
            ]);
        Reason::query()
            ->insert([
                'description' => "Yetkazib berilishda muammolar sodir bo'ldi"
            ]);
    }
}
