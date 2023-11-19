<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        $categoryCount = DB::table('categories')->count();
        $productCount = DB::table('products')->count();

        // Đếm số lượng người dùng có type_user là "customer"
        $customerCount = DB::table('users')->where('type_user', 'customer')->count();

        // Đếm số lượng người dùng có type_user là "vendor"
        $vendorCount = DB::table('users')->where('type_user', 'vendor')->count();

        return view('admin.dashboard', compact('categoryCount', 'productCount', 'customerCount', 'vendorCount'));
    }
    public function storageLink()
{
    // Kiểm tra xem thư mục storage đã được liên kết chưa
    if (File::exists(public_path('storage'))) {
        // Xóa liên kết tượng trưng (symbolic link) hiện có
        File::delete(public_path('storage'));
    }

    // Tạo lại liên kết tượng trưng cho thư mục storage
    try {
        Artisan::call('storage:link');
        return redirect()->back()->with('success', 'Successfully linked storage.');
    } catch (\Exception $exception) {
        return redirect()->back()->with('error', $exception->getMessage());
    }
}

}
