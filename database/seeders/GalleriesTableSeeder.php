<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class GalleriesTableSeeder extends Seeder
{
    public function run()
    {
        $products = DB::table('products')->pluck('id')->toArray();

        DB::table('galleries')->insert(array_map(function () use ($products) {
            return [
                'id' => Str::uuid(),
                'title' => Str::random(20),
                'product_id' => $products[array_rand($products)],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }, range(1, 25)));
    }
}
