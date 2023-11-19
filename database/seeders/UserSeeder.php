<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Adminaaaasd',
            'first_name' => 'Khoaaa',
            'last_name' => 'Nguyễaan',
            'user_image' => 'upload/khoa_real.jpg',
            'phone' => "0935769312",
            'birthday' => '2003/06/03',
            'gender' => 'men',
            'short_bio' => 'Tôi là Admin của sàn thương mại điện tử này, một sàn thương mại điện tử đa người dùng, hữu ích cho cuộc sống.',
            'address' => "629 Nguyễn Hữu Trí",
            'city' => "HCM",
            'type_user' => 'vendor',
            'link_fb' => "https://www.facebook.com/babyhaybun",
            'link_github' => "https://github.com/laravelkid/",
            'link_zalo' => "https://github.com/laravelkid/",
            'email' => 'adminasdsa@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('adminasdsa@gmail.com'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
