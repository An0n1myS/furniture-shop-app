<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CategoriesTableSeeder::class);
        $this->call(CollectionsTableSeeder::class);
        $this->call(ColorsTableSeeder::class);
        $this->call(MaterialsTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
    }
}
