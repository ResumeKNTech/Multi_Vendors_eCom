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
        DB::table('brands')->insert([
            'logo_images' => 'path_to_logo.png',
            'brand_name' => 'Brand 1',
            'is_featured' => 'public',
            'status' => 'published',
        ]);
    }
}
