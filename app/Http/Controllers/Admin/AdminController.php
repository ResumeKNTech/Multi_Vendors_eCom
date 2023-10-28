<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $admins = DB::table('users')
            ->select(
                'users.*',
            )
            ->where('users.type_user', '=', 'admin') // Chỉ lấy người dùng có type_user là "admin"
            ->get();

        return view('admin.admin.index', ['admins' => $admins]);
    }

}
