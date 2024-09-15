<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MaterialsTableSeeder extends Seeder
{
    public function run()
    {
        $materials = [
            'austin',
            'leather',
            'ohio',
            'oregon',
            'alaska',
            'velvet',

        ];

        foreach ($materials as $material) {
            DB::table('materials')->insert(array_merge([
                'title' => $material,
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}
