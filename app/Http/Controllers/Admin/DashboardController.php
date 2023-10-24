<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
}
