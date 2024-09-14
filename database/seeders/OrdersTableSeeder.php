<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrdersTableSeeder extends Seeder
{
    public function run()
    {
        $users = DB::table('users')->pluck('id')->toArray();
        $payments = DB::table('payments')->pluck('id')->toArray();
        $deliveries = DB::table('deliveries')->pluck('id')->toArray();

        DB::table('orders')->insert(array_map(function () use ($users, $payments, $deliveries) {
            return [
                'id' => Str::uuid(),
                'user_id' => $users[array_rand($users)],
                'payment_id' => $payments[array_rand($payments)],
                'delivery_id' => $deliveries[array_rand($deliveries)],
                'order_price' => rand(1000, 10000) / 100,
                'date' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }, range(1, 25)));
    }
}
