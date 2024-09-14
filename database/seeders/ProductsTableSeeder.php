<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        $colors = DB::table('colors')->pluck('id')->toArray();
        $collections = DB::table('collections')->pluck('id')->toArray();
        $categories = DB::table('categories')->pluck('id')->toArray();
        $materials = DB::table('materials')->pluck('id')->toArray();

        DB::table('products')->insert(array_map(function () use ($colors, $collections, $categories, $materials) {
            return [
                'id' => Str::uuid(),
                'title' => Str::random(10),
                'description' => Str::random(50),
                'price' => rand(100, 10000) / 100,
                'color_id' => $colors[array_rand($colors)],
                'collection_id' => $collections[array_rand($collections)],
                'category_id' => $categories[array_rand($categories)],
                'material_id' => $materials[array_rand($materials)],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }, range(1, 25)));
    }
}
