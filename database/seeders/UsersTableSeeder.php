<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $names = [
            'Phan Đăng Khoa',
            'Nguyễn Anh Khoa',
            'Nguyễn Văn Quý',
            'Nguyễn Minh Thiện',
            'Huỳnh Minh Mẫn',
            'Lê Minh Thiên',
            'Trịnh Hoàng Sơn',
            'Nguyễn Hoàng Phúc',
            'Bành Bảo Huân',
            'Huỳnh Bảo Ngọc',
            'Trần Thanh Nhân',
            'Trần Lê Bình'
        ];

        $userTypes = ['customer', 'vendor', 'admin'];

        foreach ($names as $name) {
            $fullName = explode(' ', $name);
            $email = Str::slug($name) . '@gmail.com'; // Sử dụng Str::slug để loại bỏ các ký tự đặc biệt

            $randomUserTypeIndex = random_int(0, count($userTypes) - 1);
            $typeUser = $userTypes[$randomUserTypeIndex];

            DB::table('users')->insert([
                'name' => $name,
                'first_name' => $fullName[0],
                'last_name' => end($fullName),
                'user_image' => 'default.jpg',
                'gender' => 'men',
                'type_user' => $typeUser,
                'email' => $email,
                'password' => bcrypt('password'),
                'birthday' => now(),
                'short_bio' => 'Short bio here',
                'phone' => '0935769311',
                'address' => 'Address here',
                'city' => 'City here',
                'link_fb' => 'https://facebook.com',
                'link_github' => 'https://github.com',
                'link_zalo' => 'https://zalo.com',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
