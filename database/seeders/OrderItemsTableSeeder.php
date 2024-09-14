<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderItemsTableSeeder extends Seeder
{
    public function run()
    {
        $orders = DB::table('orders')->pluck('id')->toArray();
        $products = DB::table('products')->pluck('id')->toArray();

        DB::table('order_items')->insert(array_map(function () use ($orders, $products) {
            return [
                'id' => Str::uuid(),
                'order_id' => $orders[array_rand($orders)],
                'product_id' => $products[array_rand($products)],
                'count' => rand(1, 5),
                'total_price' => rand(500, 5000) / 100,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }, range(1, 25)));
    }
}
