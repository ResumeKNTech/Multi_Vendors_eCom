<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
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
            'type_user' => 'vendor',
            'user_image' => $request->input('user_image'), // Lấy giá trị từ request
            'link_fb' => $request->input('link_fb'), // Lấy giá trị từ request
            'link_github' => $request->input('link_github'), // Lấy giá trị từ request
            'link_zalo' => $request->input('link_zalo'), // Lấy giá trị từ request
            'short_bio' => $request->input('short_bio'), // Lấy giá trị từ request
            'address' => $request->input('address'), // Lấy giá trị từ request
            'city' => $request->input('city'), // Lấy giá trị từ request
        ];

        // Kiểm tra xem có tệp hình ảnh người dùng được tải lên không
        if ($request->hasFile('user_image')) {
            $image = $request->file('user_image');
            $filename = time() . '-' . $image->getClientOriginalName();
            $image->move(public_path('upload'), $filename);
            $userData['user_image'] = 'upload/' . $filename;
        }

        // Sử dụng Query Builder để thêm người dùng mới vào bảng 'users' và lấy ID của người dùng
        $user_id = DB::table('users')->insertGetId($userData);

        // Tạo một mảng dữ liệu cho bảng 'user_relationships'
        $userRelationshipData = [
            'user_id' => $user_id,
            'category_id' => $request->input('category_id'),
            'brand_id' => $request->input('brand_id'),
        ];
        // Tạo một mảng dữ liệu cho thông báo
        $notificationData = [
            'id' => Uuid::uuid4()->toString(),
            'user_id' => $user_id,
            'type' => 'YourNotificationType', // Loại thông báo, ví dụ: 'App\Notifications\UserRegistered'
            'notifiable_type' => 'App\Models\User', // Model mà thông báo này liên quan đến
            'notifiable_id' => $user_id,
            'message' => 'Shop ' . $userData['name'] . ' vừa được tạo.',
        ];

        DB::table('user_relationships')->insert($userRelationshipData);
        DB::table('notifications')->insert($notificationData);
        // Đăng nhập người dùng sau khi đăng ký
        $user = DB::table('users')->where('email', $request->input('email'))->first();
        Auth::loginUsingId($user->id);

        // Chuyển hướng người dùng sau khi đăng ký thành công
        return redirect('admin/dashboard');
    }
}
