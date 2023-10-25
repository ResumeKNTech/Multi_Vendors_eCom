<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SubCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Tạo seed data cho bảng 'sub_categories'
        DB::table('sub_categories')->insert([
            'sub_category_name' => 'Laptop',
            'slug' => Str::slug('Laptop'),
            'description' => 'Sản phẩm laptop.',
            'category_id' => 1, // Đặt category_id cho subcategory này
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Sản phẩm liên quan đến điện thoại di động.
        DB::table('sub_categories')->insert([
            'sub_category_name' => 'Điện Thoại',
            'slug' => Str::slug('Điện Thoại'),
            'description' => 'Sản phẩm điện thoại di động.',
            'category_id' => 1, // Đặt category_id cho subcategory này
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Sản phẩm liên quan đến bóng đá.
        DB::table('sub_categories')->insert([
            'sub_category_name' => 'Bóng đá',
            'slug' => Str::slug('Bóng đá'),
            'description' => 'Sản phẩm liên quan đến bóng đá.',
            'category_id' => 2, // Đặt category_id cho subcategory này
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Sản phẩm liên quan đến bơi lội.
        DB::table('sub_categories')->insert([
            'sub_category_name' => 'Bơi lội',
            'slug' => Str::slug('Bơi lội'),
            'description' => 'Sản phẩm liên quan đến bơi lội.',
            'category_id' => 2, // Đặt category_id cho subcategory này
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Sản phẩm liên quan đến thời trang (Nam).
        DB::table('sub_categories')->insert([
            'sub_category_name' => 'Quần Áo Nam',
            'slug' => Str::slug('Quần Áo Nam'),
            'description' => 'Sản phẩm liên quan đến thời trang.',
            'category_id' => 3, // Đặt category_id cho subcategory này
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Sản phẩm liên quan đến thời trang (Nữ).
        DB::table('sub_categories')->insert([
            'sub_category_name' => 'Quần Áo Nữ',
            'slug' => Str::slug('Quần Áo Nữ'),
            'description' => 'Sản phẩm liên quan đến thời trang.',
            'category_id' => 3, // Đặt category_id cho subcategory này
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Sản phẩm liên quan đến văn phòng phẩm (Bút Viết).
        DB::table('sub_categories')->insert([
            'sub_category_name' => 'Bút Viết',
            'slug' => Str::slug('Bút Viết'),
            'description' => 'Sản phẩm liên quan đến văn phòng phẩm.',
            'category_id' => 4, // Đặt category_id cho subcategory này
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Sản phẩm liên quan đến văn phòng phẩm (Tập Sách).
        DB::table('sub_categories')->insert([
            'sub_category_name' => 'Tập Sách',
            'slug' => Str::slug('Tập Sách'),
            'description' => 'Sản phẩm liên quan đến văn phòng phẩm.',
            'category_id' => 4, // Đặt category_id cho subcategory này
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Sản phẩm quần áo cho trẻ em.
        DB::table('sub_categories')->insert([
            'sub_category_name' => 'Quần áo trẻ em',
            'slug' => Str::slug('Quần áo trẻ em'),
            'description' => 'Sản phẩm quần áo cho trẻ em.',
            'category_id' => 5, // category_id cho 'Mẹ và Bé'
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Đồ chơi dành cho trẻ em.
        DB::table('sub_categories')->insert([
            'sub_category_name' => 'Đồ chơi trẻ em',
            'slug' => Str::slug('Đồ chơi trẻ em'),
            'description' => 'Đồ chơi dành cho trẻ em.',
            'category_id' => 5, // category_id cho 'Mẹ và Bé'
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Sản phẩm thực phẩm tươi sống.
        DB::table('sub_categories')->insert([
            'sub_category_name' => 'Thực phẩm tươi sống',
            'slug' => Str::slug('Thực phẩm tươi sống'),
            'description' => 'Sản phẩm thực phẩm tươi sống.',
            'category_id' => 6, // category_id cho 'Thực Phẩm'
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Sản phẩm thực phẩm đóng hộp.
        DB::table('sub_categories')->insert([
            'sub_category_name' => 'Thực phẩm đóng hộp',
            'slug' => Str::slug('Thực phẩm đóng hộp'),
            'description' => 'Sản phẩm thực phẩm đóng hộp.',
            'category_id' => 6, // category_id cho 'Thực Phẩm'
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Sản phẩm đồ nấu ăn cho gia đình.
        DB::table('sub_categories')->insert([
            'sub_category_name' => 'Đồ nấu ăn',
            'slug' => Str::slug('Đồ nấu ăn'),
            'description' => 'Sản phẩm đồ nấu ăn cho gia đình.',
            'category_id' => 7, // category_id cho 'Đồ Gia Dụng'
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Sản phẩm đồ trang trí cho nhà cửa.
        DB::table('sub_categories')->insert([
            'sub_category_name' => 'Đồ trang trí nhà cửa',
            'slug' => Str::slug('Đồ trang trí nhà cửa'),
            'description' => 'Sản phẩm đồ trang trí cho nhà cửa.',
            'category_id' => 7, // category_id cho 'Đồ Gia Dụng'
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Sản phẩm liên quan đến làm đẹp (Sửa rửa mặt).
        DB::table('sub_categories')->insert([
            'sub_category_name' => 'Sửa rửa mặt',
            'slug' => Str::slug('Sửa rửa mặt'),
            'description' => 'Sản phẩm liên quan đến làm đẹp.',
            'category_id' => 8, // Đặt category_id cho subcategory này
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Sản phẩm liên quan đến làm đẹp (Kem dưỡng).
        DB::table('sub_categories')->insert([
            'sub_category_name' => 'Kem dưỡng',
            'slug' => Str::slug('Kem dưỡng'),
            'description' => 'Sản phẩm liên quan đến làm đẹp.',
            'category_id' => 8, // Đặt category_id cho subcategory này
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Sản phẩm liên quan đến làm đẹp (Body Mist).
        DB::table('sub_categories')->insert([
            'sub_category_name' => 'Body Mist',
            'slug' => Str::slug('Body Mist'),
            'description' => 'Sản phẩm liên quan đến làm đẹp.',
            'category_id' => 8, // Đặt category_id cho subcategory này
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // Sản phẩm liên quan đến làm đẹp (Nước hoa).
        DB::table('sub_categories')->insert([
            'sub_category_name' => 'Nước hoa',
            'slug' => Str::slug('Nước hoa'),
            'description' => 'Sản phẩm liên quan đến làm đẹp.',
            'category_id' => 8, // Đặt category_id cho subcategory này
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Sản phẩm liên quan đến làm đẹp (Dầu gội).
        DB::table('sub_categories')->insert([
            'sub_category_name' => 'Dầu gội',
            'slug' => Str::slug('Dầu gội'),
            'description' => 'Sản phẩm liên quan đến làm đẹp.',
            'category_id' => 8, // Đặt category_id cho subcategory này
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Sản phẩm liên quan đến làm đẹp (Chăm sóc da).
        DB::table('sub_categories')->insert([
            'sub_category_name' => 'Chăm sóc da',
            'slug' => Str::slug('Chăm sóc da'),
            'description' => 'Sản phẩm liên quan đến làm đẹp.',
            'category_id' => 8, // Đặt category_id cho subcategory này
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
