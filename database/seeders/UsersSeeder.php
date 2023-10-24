<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Tạo seed data cho bảng 'users'
        DB::table('users')->insert([
            'name' => 'Customer',
            'first_name' => 'Name',
            'last_name' => 'My',
            'user_image' => 'path_to_image.jpg',
            'gender' => 'men',
            'type_user' => 'customer',
            'address' => '123 Main Street',
            'birthday' => Carbon::parse('1990-03-06'),
            'email' => 'customer@gmail.com',
            'password' => Hash::make('customer@gmail.com'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        // Tạo seed data cho bảng 'users'
        DB::table('users')->insert([
            'name' => 'Vendor',
            'first_name' => 'Name',
            'last_name' => 'My',
            'user_image' => 'path_to_image.jpg',
            'gender' => 'men',
            'type_user' => 'vendor',
            'address' => '321 Main Street',
            'birthday' => Carbon::parse('2003-03-06'),
            'email' => 'vendor@gmail.com',
            'password' => Hash::make('vendor@gmail.com'),
            'category_id' => 1,
            'brand_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Vendor 2',
            'first_name' => 'Name',
            'last_name' => 'My',
            'user_image' => 'path_to_image.jpg',
            'gender' => 'woman',
            'type_user' => 'vendor',
            'address' => '789 Main Street',
            'birthday' => Carbon::parse('2003-08-01'),
            'email' => 'vendor2@gmail.com',
            'password' => Hash::make('vendor2@gmail.com'),
            'category_id' => 1,
            'brand_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
