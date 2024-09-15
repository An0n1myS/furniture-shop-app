<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CollectionsTableSeeder extends Seeder
{
    public function run()
    {
        $collections = [
            'avangarde',
            'simple',
            'leather',
            'young',
            'elegance',
            'dream',
            'box springs',
            'box springs massive',
            'relax',
            'accessories',
            'modern'
        ];

        foreach ($collections as $collection) {
            DB::table('collections')->insert(array_merge([
                'title' => $collection,
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}
