<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RolePermissionController extends Controller
{
    public function index()
    {
        return view('admin.role_permission.index');
    }
    public function store()
    {
        return view('admin.role_permission.index')->with('success', 'Bạn đã thêm thành công.');
    }
    public function update()
    {
        return view('admin.role_permission.index')->with('success', 'Bạn đã chỉnh sửa thành công.');
    }
    public function destroy()
    {
        return view('admin.role_permission.index')->with('success', 'Bạn đã xóa thành công.');
    }
}
