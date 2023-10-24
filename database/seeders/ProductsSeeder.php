<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            'product_name' => 'Product 1',
            'product_title' => 'Product Title 1',
            'slug' => 'product-1',
            'product_description' => 'This is product 1.',
            'short_description' => 'Short description of product 1.',
            'images' => 'path_to_product_image.jpg',
            'images_gallery' => 'path_to_gallery_images',
            'product_tags' => 'tag1, tag2',
            'price' => 100.00,
            'offer_price' => 90.00,
            'sales_begin' => now(),
            'sales_end' => now()->addDays(30),
            'stock' => 100,
            'stock_status' => 'in_stock',
            'status' => 'published',
            'publish' => now(),
            'sub_category_id' => 1,
            'category_id' => 1,
            'brand_id' => 1,  
        ]);
    }
}
