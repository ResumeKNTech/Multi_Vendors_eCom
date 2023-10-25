<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Tạo seed data cho bảng 'categories'
        DB::table('categories')->insert([
            'category_name' => 'Điện Tử',
            'slug' => Str::slug('Điện Tử'),
            'description' => 'Danh mục sản phẩm điện tử.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        // Danh mục Thể Thao.
        DB::table('categories')->insert([
            'category_name' => 'Thể Thao',
            'slug' => Str::slug('Thể Thao'),
            'description' => 'Danh mục sản phẩm thể thao.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        // Danh mục Thời Trang.
        DB::table('categories')->insert([
            'category_name' => 'Thời Trang',
            'slug' => Str::slug('Thời Trang'),
            'description' => 'Danh mục sản phẩm thời trang.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        // Danh mục Văn Phòng Phẩm.
        DB::table('categories')->insert([
            'category_name' => 'Văn Phòng Phẩm',
            'slug' => Str::slug('Văn Phòng Phẩm'),
            'description' => 'Danh mục sản phẩm văn phòng phẩm.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        // Danh mục Mẹ và Bé.
        DB::table('categories')->insert([
            'category_name' => 'Mẹ và Bé',
            'slug' => Str::slug('Mẹ và Bé'),
            'description' => 'Danh mục sản phẩm cho mẹ và bé.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        // Danh mục Thực Phẩm.
        DB::table('categories')->insert([
            'category_name' => 'Thực Phẩm',
            'slug' => Str::slug('Thực Phẩm'),
            'description' => 'Danh mục sản phẩm thực phẩm.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        // Danh mục Đồ Gia Dụng.
        DB::table('categories')->insert([
            'category_name' => 'Đồ Gia Dụng',
            'slug' => Str::slug('Đồ Gia Dụng'),
            'description' => 'Danh mục sản phẩm đồ gia dụng.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        // Danh mục Thực Phẩm tươi sống.
        DB::table('categories')->insert([
            'category_name' => 'Thực Phẩm tươi sống',
            'slug' => Str::slug('Thực Phẩm tươi sống'),
            'description' => 'Danh mục sản phẩm thực phẩm tươi sống.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        // Danh mục Thực Phẩm đóng hộp.
        DB::table('categories')->insert([
            'category_name' => 'Thực Phẩm đóng hộp',
            'slug' => Str::slug('Thực Phẩm đóng hộp'),
            'description' => 'Danh mục sản phẩm thực phẩm đóng hộp.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        // Danh mục Đồ nấu ăn.
        DB::table('categories')->insert([
            'category_name' => 'Đồ nấu ăn',
            'slug' => Str::slug('Đồ nấu ăn'),
            'description' => 'Danh mục sản phẩm đồ nấu ăn cho gia đình.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        // Danh mục Đồ trang trí nhà cửa.
        DB::table('categories')->insert([
            'category_name' => 'Đồ trang trí nhà cửa',
            'slug' => Str::slug('Đồ trang trí nhà cửa'),
            'description' => 'Danh mục sản phẩm đồ trang trí cho nhà cửa.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        // Danh mục Sửa rửa mặt.
        DB::table('categories')->insert([
            'category_name' => 'Sửa rửa mặt',
            'slug' => Str::slug('Sửa rửa mặt'),
            'description' => 'Danh mục sản phẩm liên quan đến làm đẹp.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        // Danh mục Kem dưỡng.
        DB::table('categories')->insert([
            'category_name' => 'Kem dưỡng',
            'slug' => Str::slug('Kem dưỡng'),
            'description' => 'Danh mục sản phẩm liên quan đến làm đẹp.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        // Danh mục Body Mist.
        DB::table('categories')->insert([
            'category_name' => 'Body Mist',
            'slug' => Str::slug('Body Mist'),
            'description' => 'Danh mục sản phẩm liên quan đến làm đẹp.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        // Danh mục Nước hoa.
        DB::table('categories')->insert([
            'category_name' => 'Nước hoa',
            'slug' => Str::slug('Nước hoa'),
            'description' => 'Danh mục sản phẩm liên quan đến làm đẹp.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        // Danh mục Dầu gội.
        DB::table('categories')->insert([
            'category_name' => 'Dầu gội',
            'slug' => Str::slug('Dầu gội'),
            'description' => 'Danh mục sản phẩm liên quan đến làm đẹp.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        // Danh mục Chăm sóc da.
        DB::table('categories')->insert([
            'category_name' => 'Chăm sóc da',
            'slug' => Str::slug('Chăm sóc da'),
            'description' => 'Danh mục sản phẩm liên quan đến làm đẹp.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
    
}
