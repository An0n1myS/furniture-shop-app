<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ColorsTableSeeder extends Seeder
{
    public function run()
    {
        $colors = [
            'grey',
            'dark grey',
            'white',
            'black',
            'rose',
            'dark blue',
            'green',
            'brown',
            'beige',
            'blue',
        ];

        foreach ($colors as $color) {
            DB::table('colors')->insert(array_merge([
                'title' => $color,
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}
