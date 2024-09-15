<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        $products = [
            // Corner Sofas
            [
                'title' => 'SELVA MINI',
                'category_id' => DB::table('categories')->where('title', 'corner sofas')->value('id'),
                'collection_id' => DB::table('collections')->where('title', 'avangarde')->value('id'),
                'description' => 'With its styling, Selva will delight even the most demanding enthusiasts of home leisure. Spacious seats, modern decorative elements, properly contoured backrests and adjustable headrests will ensure the highest quality of rest. Thanks to a convenient “dolphin” type automatic folding system, the sleeping function allows you to efficiently change it into a comfortable place to put unexpected guests up for the night and to store an extra set of bedding or a warm blanket in the container in the ottoman.',
                'price' => 1000.00,
                'color_id' => DB::table('colors')->where('title', 'grey')->value('id'),
                'material_id' => DB::table('materials')->where('title', 'austin')->value('id'),
            ],
            [
                'title' => 'SELVA L',
                'category_id' => DB::table('categories')->where('title', 'corner sofas')->value('id'),
                'collection_id' => DB::table('collections')->where('title', 'avangarde')->value('id'),
                'description' => 'With its styling, Selva will delight even the most demanding enthusiasts of home leisure. Spacious seats, modern decorative elements, properly contoured backrests and adjustable headrests will ensure the highest quality of rest. Thanks to a convenient “dolphin” type automatic folding system, the sleeping function allows you to efficiently change it into a comfortable place to put unexpected guests up for the night and to store an extra set of bedding or a warm blanket in the container in the ottoman.',
                'price' => 1200.00,
                'color_id' => DB::table('colors')->where('title', 'grey')->value('id'),
                'material_id' => DB::table('materials')->where('title', 'austin')->value('id'),
            ],
            [
                'title' => 'SELVA XL',
                'category_id' => DB::table('categories')->where('title', 'corner sofas')->value('id'),
                'collection_id' => DB::table('collections')->where('title', 'avangarde')->value('id'),
                'description' => 'With its styling, Selva will delight even the most demanding enthusiasts of home leisure. Spacious seats, modern decorative elements, properly contoured backrests and adjustable headrests will ensure the highest quality of rest. Thanks to a convenient “dolphin” type automatic folding system, the sleeping function allows you to efficiently change it into a comfortable place to put unexpected guests up for the night and to store an extra set of bedding or a warm blanket in the container in the ottoman.',
                'price' => 1400.00,
                'color_id' => DB::table('colors')->where('title', 'grey')->value('id'),
                'material_id' => DB::table('materials')->where('title', 'austin')->value('id'),
            ],
            [
                'title' => 'CALVARO L',
                'category_id' => DB::table('categories')->where('title', 'corner sofas')->value('id'),
                'collection_id' => DB::table('collections')->where('title', 'avangarde')->value('id'),
                'description' => 'The CALVARO collection is a proposal for all those who favor modern design and expect high comfort. Electrically extendable seat and adjustable headrests allow you to relax in a comfortable position. Calvaro is the epitome of comfort and functionality, meeting the expectations of the most demanding users.',
                'price' => 1500.00,
                'color_id' => DB::table('colors')->where('title', 'grey')->value('id'),
                'material_id' => DB::table('materials')->where('title', 'austin')->value('id'),
            ],
            [
                'title' => 'CANDELO MINI',
                'category_id' => DB::table('categories')->where('title', 'corner sofas')->value('id'),
                'collection_id' => DB::table('collections')->where('title', 'avangarde')->value('id'),
                'description' => 'Functional pillow is an additional feature, complementing the overall design to give maximum comfort. The top of the adjustment mechanism, which provide additional support for the head, allows you to achieve a comfortable position during rest.',
                'price' => 1100.00,
                'color_id' => DB::table('colors')->where('title', 'white')->value('id'),
                'material_id' => DB::table('materials')->where('title', 'alaska')->value('id'),
            ],
            [
                'title' => 'CANDELO L',
                'category_id' => DB::table('categories')->where('title', 'corner sofas')->value('id'),
                'collection_id' => DB::table('collections')->where('title', 'avangarde')->value('id'),
                'description' => 'Functional pillow is an additional feature, complementing the overall design to give maximum comfort. The top of the adjustment mechanism, which provide additional support for the head, allows you to achieve a comfortable position during rest.',
                'price' => 1300.00,
                'color_id' => DB::table('colors')->where('title', 'white')->value('id'),
                'material_id' => DB::table('materials')->where('title', 'alaska')->value('id'),
            ],
            [
                'title' => 'CANDELO XL',
                'category_id' => DB::table('categories')->where('title', 'corner sofas')->value('id'),
                'collection_id' => DB::table('collections')->where('title', 'avangarde')->value('id'),
                'description' => 'Functional pillow is an additional feature, complementing the overall design to give maximum comfort. The top of the adjustment mechanism, which provide additional support for the head, allows you to achieve a comfortable position during rest.',
                'price' => 1600.00,
                'color_id' => DB::table('colors')->where('title', 'white')->value('id'),
                'material_id' => DB::table('materials')->where('title', 'alaska')->value('id'),
            ],
            [
                'title' => 'FOCUS MINI',
                'category_id' => DB::table('categories')->where('title', 'corner sofas')->value('id'),
                'collection_id' => DB::table('collections')->where('title', 'avangarde')->value('id'),
                'description' => 'The Focus collection – sophisticated, modern designs which will be appreciated by every fan of contemporary interiors. Delicate stitching and quilting add stylish variety. The simple form is complemented by adjustable headrests that provide additional support for the head, and the seat depth adjustment further enhances usability.',
                'price' => 900.00,
                'color_id' => DB::table('colors')->where('title', 'black')->value('id'),
                'material_id' => DB::table('materials')->where('title', 'austin')->value('id'),
            ],
            [
                'title' => 'FOCUS L',
                'category_id' => DB::table('categories')->where('title', 'corner sofas')->value('id'),
                'collection_id' => DB::table('collections')->where('title', 'avangarde')->value('id'),
                'description' => 'The Focus collection – sophisticated, modern designs which will be appreciated by every fan of contemporary interiors. Delicate stitching and quilting add stylish variety. The simple form is complemented by adjustable headrests that provide additional support for the head, and the seat depth adjustment further enhances usability.',
                'price' => 1100.00,
                'color_id' => DB::table('colors')->where('title', 'black')->value('id'),
                'material_id' => DB::table('materials')->where('title', 'austin')->value('id'),
            ],
            [
                'title' => 'FOCUS XL',
                'category_id' => DB::table('categories')->where('title', 'corner sofas')->value('id'),
                'collection_id' => DB::table('collections')->where('title', 'avangarde')->value('id'),
                'description' => 'The Focus collection – sophisticated, modern designs which will be appreciated by every fan of contemporary interiors. Delicate stitching and quilting add stylish variety. The simple form is complemented by adjustable headrests that provide additional support for the head, and the seat depth adjustment further enhances usability.',
                'price' => 1400.00,
                'color_id' => DB::table('colors')->where('title', 'black')->value('id'),
                'material_id' => DB::table('materials')->where('title', 'austin')->value('id'),
            ],
            [
                'title' => 'BAGGIO',
                'category_id' => DB::table('categories')->where('title', 'corner sofas')->value('id'),
                'collection_id' => DB::table('collections')->where('title', 'avangarde')->value('id'),
                'description' => 'Baggio is a modern sofa with a simple, minimalist design. Ideal for contemporary interiors, it combines high comfort with a stylish look. The adjustable headrests provide additional comfort, and the elegant design complements any living room.',
                'price' => 1000.00,
                'color_id' => DB::table('colors')->where('title', 'beige')->value('id'),
                'material_id' => DB::table('materials')->where('title', 'velvet')->value('id'),
            ],
            [
                'title' => 'GIRAFFE SOFA',
                'category_id' => DB::table('categories')->where('title', 'sofas')->value('id'),
                'collection_id' => DB::table('collections')->where('title', 'modern')->value('id'),
                'description' => 'Giraffe Sofa – a piece of furniture that combines comfort with a unique design. Its high backrest and ergonomic shape make it an excellent choice for both relaxation and decoration. The choice of materials and colors allows for customization to fit any interior.',
                'price' => 800.00,
                'color_id' => DB::table('colors')->where('title', 'blue')->value('id'),
                'material_id' => DB::table('materials')->where('title', 'leather')->value('id'),
            ],
            // Continue adding more products following the same structure
        ];

        foreach ($products as $product) {
            DB::table('products')->insert(array_merge([
                'created_at' => now(),
                'updated_at' => now(),
            ], $product));
        }
    }
}
