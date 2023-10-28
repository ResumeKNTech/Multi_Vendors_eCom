<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        return view('admin.role.index');
    }
    public function store()
    {
        return view('admin.role.index')->with('success', 'Bạn đã thêm thành công.');
    }
    public function update()
    {
        return view('admin.role.index')->with('success', 'Bạn đã chỉnh sửa thành công.');
    }
    public function destroy()
    {
        return view('admin.role.index')->with('success', 'Bạn đã xóa thành công.');
    }
}
