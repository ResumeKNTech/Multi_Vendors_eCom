<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
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
            'product_name' => 'Samsung Galaxy S21',
            'product_title' => 'Samsung Galaxy S21 5G Smartphone',
            'slug' => Str::slug('Samsung Galaxy S21'),
            'product_description' => 'The Samsung Galaxy S21 is a high-end 5G smartphone with a stunning display and powerful performance.',
            'short_description' => 'High-end 5G smartphone with stunning display and powerful performance.',
            'images' => 'upload/path_to_product_image_1.jpg',
            'images_gallery' => 'upload/path_to_gallery_images_1',
            'product_tags' => 'Samsung, Galaxy S21, 5G, Smartphone',
            'price' => 799.99,
            'offer_price' => 699.99,
            'sales_begin' => now(),
            'sales_end' => now()->addDays(30),
            'stock' => 50,
            'stock_status' => 'in_stock',
            'status' => 'published',
            'publish' => now(),
            'sub_category_id' => 1, // sub_category_id cho 'Laptop'
            'category_id' => 1, // category_id cho 'Điện Tử'
            'brand_id' => 1, // brand_id cho 'Samsung'
        ]);
        DB::table('products')->insert([
            'product_name' => 'Apple MacBook Air',
            'product_title' => 'Apple MacBook Air 13-inch Laptop',
            'slug' => Str::slug('Apple MacBook Air'),
            'product_description' => 'The Apple MacBook Air is a lightweight and powerful laptop with a Retina display.',
            'short_description' => 'Lightweight and powerful laptop with Retina display.',
            'images' => 'upload/path_to_product_image_2.jpg',
            'images_gallery' => 'upload/path_to_gallery_images_2',
            'product_tags' => 'Apple, MacBook Air, Laptop',
            'price' => 999.99,
            'offer_price' => 899.99,
            'sales_begin' => now(),
            'sales_end' => now()->addDays(30),
            'stock' => 30,
            'stock_status' => 'in_stock',
            'status' => 'published',
            'publish' => now(),
            'sub_category_id' => 1, // sub_category_id cho 'Laptop'
            'category_id' => 1, // category_id cho 'Điện Tử'
            'brand_id' => 2, // brand_id cho 'Apple'
        ]);

        DB::table('products')->insert([
            'product_name' => 'Nike Air Max 90',
            'product_title' => 'Nike Air Max 90 Men\'s Running Shoes',
            'slug' => Str::slug('Nike Air Max 90'),
            'product_description' => 'The Nike Air Max 90 is a classic men\'s running shoe known for its comfort and style.',
            'short_description' => 'Classic men\'s running shoe with comfort and style.',
            'images' => 'upload/path_to_product_image_3.jpg',
            'images_gallery' => 'upload/path_to_gallery_images_3',
            'product_tags' => 'Nike, Air Max 90, Running Shoes',
            'price' => 129.99,
            'offer_price' => 119.99,
            'sales_begin' => now(),
            'sales_end' => now()->addDays(30),
            'stock' => 60,
            'stock_status' => 'in_stock',
            'status' => 'published',
            'publish' => now(),
            'sub_category_id' => 3, // sub_category_id cho 'Thời Trang'
            'category_id' => 3, // category_id cho 'Thời Trang'
            'brand_id' => 3, // brand_id cho 'Nike'
        ]);

        // Sản phẩm 4
        DB::table('products')->insert([
            'product_name' => 'Sony PlayStation 5',
            'product_title' => 'Sony PlayStation 5 Gaming Console',
            'slug' => Str::slug('Sony PlayStation 5'),
            'product_description' => 'The Sony PlayStation 5 is the next-generation gaming console with stunning graphics and speed.',
            'short_description' => 'Next-generation gaming console with stunning graphics and speed.',
            'images' => 'upload/path_to_product_image_4.jpg',
            'images_gallery' => 'upload/path_to_gallery_images_4',
            'product_tags' => 'Sony, PlayStation 5, Gaming Console',
            'price' => 499.99,
            'offer_price' => 449.99,
            'sales_begin' => now(),
            'sales_end' => now()->addDays(30),
            'stock' => 20,
            'stock_status' => 'in_stock',
            'status' => 'published',
            'publish' => now(),
            'sub_category_id' => 1,
            'category_id' => 1,
            'brand_id' => 6,
        ]);

        // Sản phẩm 5
        DB::table('products')->insert([
            'product_name' => 'Adidas Ultraboost',
            'product_title' => 'Adidas Ultraboost Running Shoes',
            'slug' => Str::slug('Adidas Ultraboost'),
            'product_description' => 'The Adidas Ultraboost is a top-of-the-line running shoe designed for performance and comfort.',
            'short_description' => 'Top-of-the-line running shoe for performance and comfort.',
            'images' => 'upload/path_to_product_image_5.jpg',
            'images_gallery' => 'upload/path_to_gallery_images_5',
            'product_tags' => 'Adidas, Ultraboost, Running Shoes',
            'price' => 169.99,
            'offer_price' => 149.99,
            'sales_begin' => now(),
            'sales_end' => now()->addDays(30),
            'stock' => 40,
            'stock_status' => 'in_stock',
            'status' => 'published',
            'publish' => now(),
            'sub_category_id' => 3,
            'category_id' => 3,
            'brand_id' => 4,
        ]);

        // Sản phẩm 6
        DB::table('products')->insert([
            'product_name' => 'Johnson & Johnson Baby Shampoo',
            'product_title' => 'Johnson & Johnson Baby Shampoo (500ml)',
            'slug' => Str::slug('Johnson & Johnson Baby Shampoo'),
            'product_description' => 'Johnson & Johnson Baby Shampoo is a gentle and tear-free formula for babies.',
            'short_description' => 'Gentle and tear-free baby shampoo from Johnson & Johnson.',
            'images' => 'upload/path_to_product_image_6.jpg',
            'images_gallery' => 'upload/path_to_gallery_images_6',
            'product_tags' => 'Johnson & Johnson, Baby Shampoo, Gentle, Tear-free',
            'price' => 7.99,
            'offer_price' => 6.99,
            'sales_begin' => now(),
            'sales_end' => now()->addDays(30),
            'stock' => 100,
            'stock_status' => 'in_stock',
            'status' => 'published',
            'publish' => now(),
            'sub_category_id' => 5,
            'category_id' => 5,
            'brand_id' => 5,
        ]);

        // Sản phẩm 7
        DB::table('products')->insert([
            'product_name' => 'Nestlé Cerelac Baby Cereal',
            'product_title' => 'Nestlé Cerelac Baby Cereal (Rice, 400g)',
            'slug' => Str::slug('Nestlé Cerelac Baby Cereal'),
            'product_description' => 'Nestlé Cerelac Baby Cereal is a nutritious option for your baby\'s first solid food.',
            'short_description' => 'Nutritious baby cereal for your baby\'s first solid food.',
            'images' => 'upload/path_to_product_image_7.jpg',
            'images_gallery' => 'upload/path_to_gallery_images_7',
            'product_tags' => 'Nestlé, Cerelac, Baby Cereal, Nutritious',
            'price' => 5.99,
            'offer_price' => 4.99,
            'sales_begin' => now(),
            'sales_end' => now()->addDays(30),
            'stock' => 80,
            'stock_status' => 'in_stock',
            'status' => 'published',
            'publish' => now(),
            'sub_category_id' => 5,
            'category_id' => 5,
            'brand_id' => 7,
        ]);

        // Sản phẩm 8
        DB::table('products')->insert([
            'product_name' => 'KitchenAid Stand Mixer',
            'product_title' => 'KitchenAid Artisan Series 5-Quart Stand Mixer',
            'slug' => Str::slug('KitchenAid Stand Mixer'),
            'product_description' => 'The KitchenAid Stand Mixer is a versatile kitchen appliance for baking and cooking.',
            'short_description' => 'Versatile kitchen appliance for baking and cooking.',
            'images' => 'upload/path_to_product_image_8.jpg',
            'images_gallery' => 'upload/path_to_gallery_images_8',
            'product_tags' => 'KitchenAid, Stand Mixer, Baking, Cooking',
            'price' => 349.99,
            'offer_price' => 299.99,
            'sales_begin' => now(),
            'sales_end' => now()->addDays(30),
            'stock' => 25,
            'stock_status' => 'in_stock',
            'status' => 'published',
            'publish' => now(),
            'sub_category_id' => 9,
            'category_id' => 7,
            'brand_id' => 8,
        ]);

        // Sản phẩm 9
        DB::table('products')->insert([
            'product_name' => 'Philips Hue Smart Bulbs',
            'product_title' => 'Philips Hue White and Color Ambiance Smart Bulbs (4-Pack)',
            'slug' => Str::slug('Philips Hue Smart Bulbs'),
            'product_description' => 'Philips Hue Smart Bulbs allow you to control your lighting with your smartphone or voice.',
            'short_description' => 'Smart bulbs for smartphone and voice-controlled lighting.',
            'images' => 'upload/path_to_product_image_9.jpg',
            'images_gallery' => 'upload/path_to_gallery_images_9',
            'product_tags' => 'Philips Hue, Smart Bulbs, Lighting, Smartphone Control',
            'price' => 149.99,
            'offer_price' => 129.99,
            'sales_begin' => now(),
            'sales_end' => now()->addDays(30),
            'stock' => 35,
            'stock_status' => 'in_stock',
            'status' => 'published',
            'publish' => now(),
            'sub_category_id' => 11,
            'category_id' => 7,
            'brand_id' => 9,
        ]);

        // Sản phẩm 10
        DB::table('products')->insert([
            'product_name' => 'Coca-Cola Classic',
            'product_title' => 'Coca-Cola Classic 12-Pack Cans',
            'slug' => Str::slug('Coca-Cola Classic'),
            'product_description' => 'Coca-Cola Classic is the original and refreshing soft drink in a convenient 12-pack.',
            'short_description' => 'Original and refreshing soft drink in a 12-pack.',
            'images' => 'upload/path_to_product_image_10.jpg',
            'images_gallery' => 'upload/path_to_gallery_images_10',
            'product_tags' => 'Coca-Cola, Classic, Soft Drink',
            'price' => 6.99,
            'offer_price' => 5.99,
            'sales_begin' => now(),
            'sales_end' => now()->addDays(30),
            'stock' => 60,
            'stock_status' => 'in_stock',
            'status' => 'published',
            'publish' => now(),
            'sub_category_id' => 13,
            'category_id' => 8,
            'brand_id' => 10,
        ]);

        // Sản phẩm 11
        DB::table('products')->insert([
            'product_name' => 'Pampers Baby Diapers',
            'product_title' => 'Pampers Swaddlers Baby Diapers (Size 1, 96 Count)',
            'slug' => Str::slug('Pampers Baby Diapers'),
            'product_description' => 'Pampers Swaddlers Baby Diapers are soft and comfortable for your baby\'s delicate skin.',
            'short_description' => 'Soft and comfortable baby diapers for delicate skin.',
            'images' => 'upload/path_to_product_image_11.jpg',
            'images_gallery' => 'upload/path_to_gallery_images_11',
            'product_tags' => 'Pampers, Baby Diapers, Swaddlers',
            'price' => 29.99,
            'offer_price' => 24.99,
            'sales_begin' => now(),
            'sales_end' => now()->addDays(30),
            'stock' => 70,
            'stock_status' => 'in_stock',
            'status' => 'published',
            'publish' => now(),
            'sub_category_id' => 15,
            'category_id' => 5,
            'brand_id' => 11,
        ]);

        // Sản phẩm 12
        DB::table('products')->insert([
            'product_name' => 'LG 55-Inch 4K Smart TV',
            'product_title' => 'LG 55-Inch 4K Ultra HD Smart TV (2023 Model)',
            'slug' => Str::slug('LG 55-Inch 4K Smart TV'),
            'product_description' => 'The LG 55-Inch 4K Smart TV offers stunning visuals and smart features for your entertainment.',
            'short_description' => 'Stunning 55-inch 4K Smart TV with smart features.',
            'images' => 'upload/path_to_product_image_12.jpg',
            'images_gallery' => 'upload/path_to_gallery_images_12',
            'product_tags' => 'LG, 4K Smart TV, Ultra HD, Smart Features',
            'price' => 699.99,
            'offer_price' => 649.99,
            'sales_begin' => now(),
            'sales_end' => now()->addDays(30),
            'stock' => 15,
            'stock_status' => 'in_stock',
            'status' => 'published',
            'publish' => now(),
            'sub_category_id' => 1,
            'category_id' => 1,
            'brand_id' => 12,
        ]);

        // Sản phẩm 13
        DB::table('products')->insert([
            'product_name' => 'Dell Inspiron 15 Laptop',
            'product_title' => 'Dell Inspiron 15 15.6-inch Laptop',
            'slug' => Str::slug('Dell Inspiron 15 Laptop'),
            'product_description' => 'The Dell Inspiron 15 is a versatile laptop with a large display for work and entertainment.',
            'short_description' => 'Versatile 15.6-inch laptop for work and entertainment.',
            'images' => 'upload/path_to_product_image_13.jpg',
            'images_gallery' => 'upload/path_to_gallery_images_13',
            'product_tags' => 'Dell, Inspiron 15, Laptop',
            'price' => 549.99,
            'offer_price' => 499.99,
            'sales_begin' => now(),
            'sales_end' => now()->addDays(30),
            'stock' => 25,
            'stock_status' => 'in_stock',
            'status' => 'published',
            'publish' => now(),
            'sub_category_id' => 1,
            'category_id' => 1,
            'brand_id' => 13,
        ]);

        // Sản phẩm 14
        DB::table('products')->insert([
            'product_name' => 'Asus ROG Gaming Laptop',
            'product_title' => 'Asus ROG Zephyrus G14 Gaming Laptop',
            'slug' => Str::slug('Asus ROG Gaming Laptop'),
            'product_description' => 'The Asus ROG Zephyrus G14 is a high-performance gaming laptop with a powerful AMD Ryzen processor.',
            'short_description' => 'High-performance gaming laptop with AMD Ryzen processor.',
            'images' => 'upload/path_to_product_image_14.jpg',
            'images_gallery' => 'upload/path_to_gallery_images_14',
            'product_tags' => 'Asus, ROG, Gaming Laptop, AMD Ryzen',
            'price' => 1299.99,
            'offer_price' => 1199.99,
            'sales_begin' => now(),
            'sales_end' => now()->addDays(30),
            'stock' => 20,
            'stock_status' => 'in_stock',
            'status' => 'published',
            'publish' => now(),
            'sub_category_id' => 1,
            'category_id' => 1,
            'brand_id' => 14,
        ]);

        // Sản phẩm 15
        DB::table('products')->insert([
            'product_name' => 'Logitech Wireless Mouse',
            'product_title' => 'Logitech MX Master 3 Wireless Mouse',
            'slug' => Str::slug('Logitech Wireless Mouse'),
            'product_description' => 'The Logitech MX Master 3 is a high-precision wireless mouse for productivity and creativity.',
            'short_description' => 'High-precision wireless mouse for productivity and creativity.',
            'images' => 'upload/path_to_product_image_15.jpg',
            'images_gallery' => 'upload/path_to_gallery_images_15',
            'product_tags' => 'Logitech, Wireless Mouse, MX Master 3',
            'price' => 99.99,
            'offer_price' => 89.99,
            'sales_begin' => now(),
            'sales_end' => now()->addDays(30),
            'stock' => 50,
            'stock_status' => 'in_stock',
            'status' => 'published',
            'publish' => now(),
            'sub_category_id' => 9,
            'category_id' => 7,
            'brand_id' => 15,
        ]);

        // Sản phẩm 16
        DB::table('products')->insert([
            'product_name' => 'Sony 65-Inch 4K Smart TV',
            'product_title' => 'Sony 65-Inch 4K Ultra HD Smart TV (2023 Model)',
            'slug' => Str::slug('Sony 65-Inch 4K Smart TV'),
            'product_description' => 'The Sony 65-Inch 4K Smart TV offers stunning visuals and advanced smart features.',
            'short_description' => 'Stunning 65-inch 4K Smart TV with advanced smart features.',
            'images' => 'upload/path_to_product_image_16.jpg',
            'images_gallery' => 'upload/path_to_gallery_images_16',
            'product_tags' => 'Sony, 4K Smart TV, Ultra HD, Smart Features',
            'price' => 799.99,
            'offer_price' => 749.99,
            'sales_begin' => now(),
            'sales_end' => now()->addDays(30),
            'stock' => 15,
            'stock_status' => 'in_stock',
            'status' => 'published',
            'publish' => now(),
            'sub_category_id' => 1,
            'category_id' => 1,
            'brand_id' => 6,
        ]);

        // Sản phẩm 17
        DB::table('products')->insert([
            'product_name' => 'Nike Air Jordan 1',
            'product_title' => 'Nike Air Jordan 1 Retro High OG Basketball Shoes',
            'slug' => Str::slug('Nike Air Jordan 1'),
            'product_description' => 'The Nike Air Jordan 1 Retro High OG is a classic basketball shoe known for its style and performance.',
            'short_description' => 'Classic basketball shoe with style and performance.',
            'images' => 'upload/path_to_product_image_17.jpg',
            'images_gallery' => 'upload/path_to_gallery_images_17',
            'product_tags' => 'Nike, Air Jordan 1, Basketball Shoes',
            'price' => 169.99,
            'offer_price' => 149.99,
            'sales_begin' => now(),
            'sales_end' => now()->addDays(30),
            'stock' => 40,
            'stock_status' => 'in_stock',
            'status' => 'published',
            'publish' => now(),
            'sub_category_id' => 3,
            'category_id' => 3,
            'brand_id' => 3,
        ]);

        // Sản phẩm 18
        DB::table('products')->insert([
            'product_name' => 'Huggies Diapers',
            'product_title' => 'Huggies Little Snugglers Diapers (Size 2, 144 Count)',
            'slug' => Str::slug('Huggies Diapers'),
            'product_description' => 'Huggies Little Snugglers Diapers provide softness and protection for your baby.',
            'short_description' => 'Soft and protective baby diapers from Huggies.',
            'images' => 'upload/path_to_product_image_18.jpg',
            'images_gallery' => 'upload/path_to_gallery_images_18',
            'product_tags' => 'Huggies, Diapers, Little Snugglers',
            'price' => 39.99,
            'offer_price' => 34.99,
            'sales_begin' => now(),
            'sales_end' => now()->addDays(30),
            'stock' => 60,
            'stock_status' => 'in_stock',
            'status' => 'published',
            'publish' => now(),
            'sub_category_id' => 15,
            'category_id' => 5,
            'brand_id' => 11,
        ]);

        // Sản phẩm 19
        DB::table('products')->insert([
            'product_name' => 'Samsung 32-Inch LED TV',
            'product_title' => 'Samsung 32-Inch HD LED TV (2023 Model)',
            'slug' => Str::slug('Samsung 32-Inch LED TV'),
            'product_description' => 'The Samsung 32-Inch HD LED TV offers clear picture quality for your entertainment.',
            'short_description' => '32-inch HD LED TV with clear picture quality.',
            'images' => 'upload/path_to_product_image_19.jpg',
            'images_gallery' => 'upload/path_to_gallery_images_19',
            'product_tags' => 'Samsung, 32-Inch LED TV, HD, LED',
            'price' => 249.99,
            'offer_price' => 229.99,
            'sales_begin' => now(),
            'sales_end' => now()->addDays(30),
            'stock' => 25,
            'stock_status' => 'in_stock',
            'status' => 'published',
            'publish' => now(),
            'sub_category_id' => 1,
            'category_id' => 1,
            'brand_id' => 6,
        ]);

        // Sản phẩm 20
        DB::table('products')->insert([
            'product_name' => 'Breville Espresso Machine',
            'product_title' => 'Breville Barista Express Espresso Machine',
            'slug' => Str::slug('Breville Espresso Machine'),
            'product_description' => 'The Breville Barista Express Espresso Machine lets you make cafe-quality espresso at home.',
            'short_description' => 'Cafe-quality espresso machine for home use.',
            'images' => 'upload/path_to_product_image_20.jpg',
            'images_gallery' => 'upload/path_to_gallery_images_20',
            'product_tags' => 'Breville, Espresso Machine, Barista Express',
            'price' => 699.99,
            'offer_price' => 649.99,
            'sales_begin' => now(),
            'sales_end' => now()->addDays(30),
            'stock' => 20,
            'stock_status' => 'in_stock',
            'status' => 'published',
            'publish' => now(),
            'sub_category_id' => 9,
            'category_id' => 7,
            'brand_id' => 16,
        ]);
    }
}
