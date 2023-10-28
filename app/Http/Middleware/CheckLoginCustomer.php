<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckLoginCustomer
{
    public function handle(Request $request, Closure $next): Response
    {
        // Kiểm tra xem người dùng đã đăng nhập hay chưa
        if (Auth::check()) {
            // Lấy thông tin người dùng hiện tại
            $user = Auth::user();

            // Kiểm tra xem người dùng có phải là "customer" hay không
            if ($user->type_user == 'customer') {
                // Nếu là customer, tiếp tục xử lý request
                return $next($request);
            }
        }

        // Nếu không phải là customer hoặc chưa đăng nhập, bạn có thể xử lý tùy ý ở đây, ví dụ chuyển hướng hoặc trả về lỗi.
        return redirect()->route('client.login');    }
}
