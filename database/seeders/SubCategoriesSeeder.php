<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SubCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sub_categories')->insert([
            'sub_category_name' => 'Subcategory 1',
            'slug' => 'subcategory-1',
            'description' => 'This is subcategory 1.',
            'category_id' => 1, 
        ]);
    }
}
