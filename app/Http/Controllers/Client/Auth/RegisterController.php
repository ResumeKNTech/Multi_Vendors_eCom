<?php

namespace App\Http\Controllers\Client\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('client.auth.register');
    }
    public function register(Request $request)
    {
        $userData = [
            'name' => $request->input('name'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ];

        // Sử dụng Query Builder để thêm người dùng mới vào cơ sở dữ liệu
        DB::table('users')->insert($userData);

        // Đăng nhập người dùng sau khi đăng ký
        $user = DB::table('users')->where('email', $request->input('email'))->first();
        Auth::loginUsingId($user->id);

        return redirect()->route('index');

    }
}
