<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            'corner sofas',
            'sofas',
            'beds',
            'chaise longues',
            'armchairs',
            'poufs',
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert(array_merge([
                'title' => $category,
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}
