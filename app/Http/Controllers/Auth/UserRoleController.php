<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    public function index()
    {
        return view('admin.user_role.index');
    }
    public function store()
    {
        return view('admin.user_role.index')->with('success', 'Bạn đã thêm thành công.');
    }
    public function update()
    {
        return view('admin.user_role.index')->with('success', 'Bạn đã chỉnh sửa thành công.');
    }
    public function destroy()
    {
        return view('admin.user_role.index')->with('success', 'Bạn đã xóa thành công.');
    }
}
