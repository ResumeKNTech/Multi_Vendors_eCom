<?php

namespace App\Http\Controllers\Client\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Hiển thị form đăng nhập
    public function showLoginForm()
    {
        return view('client.auth.login');
    }

    // Xử lý đăng nhập
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/'); // Chuyển hướng đến trang chính sau khi đăng nhập thành công
        }

        $errors = [];

        if (!Auth::validate($credentials)) {
            $errors['email'] = 'Email đăng nhập không chính xác.';
        } else {
            $errors['password'] = 'Password đăng nhập không chính xác.';
        }

        return back()->withErrors($errors)->withInput($request->except('password'));
    }

    // Xử lý đăng xuất
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('client.login');
    }
}
