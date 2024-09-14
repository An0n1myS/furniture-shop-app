<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PhotosTableSeeder extends Seeder
{
    public function run()
    {
        $galleries = DB::table('galleries')->pluck('id')->toArray();

        DB::table('photos')->insert(array_map(function () use ($galleries) {
            return [
                'id' => Str::uuid(),
                'gallery_id' => $galleries[array_rand($galleries)],
                'photo_url' => 'https://example.com/' . Str::random(10) . '.jpg',
                'created_at' => now(),
            ];
        }, range(1, 25)));
    }
}
