<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckLogin
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            // Lấy thông tin người dùng hiện tại
            $user = Auth::user();

            // Kiểm tra xem người dùng có phải là "vendor" hoặc "admin" hay không
            if ($user->type_user == 'vendor' || $user->type_user == 'admin') {
                // Nếu là vendor hoặc admin, tiếp tục xử lý request
                return $next($request);
            }
        }

        // Nếu người dùng chưa đăng nhập hoặc không phải là vendor hoặc admin, chuyển hướng đến trang đăng nhập
        return redirect()->route('auth.login');
    }
}
