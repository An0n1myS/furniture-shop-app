<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PaymentsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('payments')->insert(array_map(function () {
            return [
                'id' => Str::uuid(),
                'title' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }, range(1, 25)));
    }
}
