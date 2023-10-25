<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tạo seed data cho bảng 'brands'
        DB::table('brands')->insert([
            'logo_images' => 'upload/path_to_logo_1.png',
            'brand_name' => 'Samsung',
            'is_featured' => 'public',
            'status' => 'published',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('brands')->insert([
            'logo_images' => 'upload/path_to_logo_2.png',
            'brand_name' => 'Apple',
            'is_featured' => 'public',
            'status' => 'published',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('brands')->insert([
            'logo_images' => 'upload/path_to_logo_3.png',
            'brand_name' => 'Nike',
            'is_featured' => 'public',
            'status' => 'published',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('brands')->insert([
            'logo_images' => 'upload/path_to_logo_4.png',
            'brand_name' => 'Adidas',
            'is_featured' => 'public',
            'status' => 'published',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('brands')->insert([
            'logo_images' => 'upload/path_to_logo_5.png',
            'brand_name' => 'Johnson & Johnson',
            'is_featured' => 'public',
            'status' => 'published',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('brands')->insert([
            'logo_images' => 'upload/path_to_logo_6.png',
            'brand_name' => 'Sony',
            'is_featured' => 'public',
            'status' => 'published',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('brands')->insert([
            'logo_images' => 'upload/path_to_logo_7.png',
            'brand_name' => 'Microsoft',
            'is_featured' => 'public',
            'status' => 'published',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('brands')->insert([
            'logo_images' => 'upload/path_to_logo_8.png',
            'brand_name' => 'Coca-Cola',
            'is_featured' => 'public',
            'status' => 'published',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Tạo seed data cho thêm các thương hiệu khác
        DB::table('brands')->insert([
            'logo_images' => 'upload/path_to_logo_9.png',
            'brand_name' => 'Nike',
            'is_featured' => 'public',
            'status' => 'published',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('brands')->insert([
            'logo_images' => 'upload/path_to_logo_10.png',
            'brand_name' => 'Puma',
            'is_featured' => 'public',
            'status' => 'published',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('brands')->insert([
            'logo_images' => 'upload/path_to_logo_11.png',
            'brand_name' => 'Reebok',
            'is_featured' => 'public',
            'status' => 'published',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('brands')->insert([
            'logo_images' => 'upload/path_to_logo_12.png',
            'brand_name' => 'LG',
            'is_featured' => 'public',
            'status' => 'published',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('brands')->insert([
            'logo_images' => 'upload/path_to_logo_13.png',
            'brand_name' => 'Dell',
            'is_featured' => 'public',
            'status' => 'published',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('brands')->insert([
            'logo_images' => 'upload/path_to_logo_14.png',
            'brand_name' => 'Asus',
            'is_featured' => 'public',
            'status' => 'published',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('brands')->insert([
            'logo_images' => 'upload/path_to_logo_15.png',
            'brand_name' => 'Logitech',
            'is_featured' => 'public',
            'status' => 'published',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('brands')->insert([
            'logo_images' => 'upload/path_to_logo_16.png',
            'brand_name' => 'HP',
            'is_featured' => 'public',
            'status' => 'published',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Tạo seed data cho các thương hiệu liên quan đến danh mục 'Mẹ và Bé'
        DB::table('brands')->insert([
            'logo_images' => 'upload/path_to_logo_17.png',
            'brand_name' => 'Johnson\'s Baby',
            'is_featured' => 'public',
            'status' => 'published',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('brands')->insert([
            'logo_images' => 'upload/path_to_logo_18.png',
            'brand_name' => 'Gerber',
            'is_featured' => 'public',
            'status' => 'published',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Tạo seed data cho các thương hiệu liên quan đến danh mục 'Thực Phẩm'
        DB::table('brands')->insert([
            'logo_images' => 'upload/path_to_logo_19.png',
            'brand_name' => 'Coca-Cola',
            'is_featured' => 'public',
            'status' => 'published',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('brands')->insert([
            'logo_images' => 'upload/path_to_logo_20.png',
            'brand_name' => 'Nestlé',
            'is_featured' => 'public',
            'status' => 'published',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Tạo seed data cho các thương hiệu liên quan đến danh mục 'Đồ Gia Dụng'
        DB::table('brands')->insert([
            'logo_images' => 'upload/path_to_logo_21.png',
            'brand_name' => 'KitchenAid',
            'is_featured' => 'public',
            'status' => 'published',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('brands')->insert([
            'logo_images' => 'upload/path_to_logo_22.png',
            'brand_name' => 'Philips',
            'is_featured' => 'public',
            'status' => 'published',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
