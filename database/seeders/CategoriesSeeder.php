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
            'category_name' => 'Category 1',
            'slug' => Str::slug('Category 1'), // Tạo slug từ tên category
            'description' => 'This is category 1.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('categories')->insert([
            'category_name' => 'Category 2',
            'slug' => Str::slug('Category 2'),
            'description' => 'This is category 2.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

      
    }
}
