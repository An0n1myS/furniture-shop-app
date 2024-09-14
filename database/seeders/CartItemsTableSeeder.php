<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CartItemsTableSeeder extends Seeder
{
    public function run()
    {
        $carts = DB::table('carts')->pluck('id')->toArray();
        $products = DB::table('products')->pluck('id')->toArray();

        DB::table('cart_items')->insert(array_map(function () use ($carts, $products) {
            return [
                'id' => Str::uuid(),
                'cart_id' => $carts[array_rand($carts)],
                'product_id' => $products[array_rand($products)],
                'count' => rand(1, 10),
                'total_price' => rand(100, 1000) / 100,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }, range(1, 25)));
    }
}
