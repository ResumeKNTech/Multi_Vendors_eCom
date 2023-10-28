<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CustomerController extends Controller
{
    public function index()
    {
        $customers = DB::table('users')
            ->select(
                'users.*',
            )
            ->where('users.type_user', '=', 'customer') // Chỉ lấy người dùng có type_user là "customer"
            ->get();

        return view('admin.customer.index', ['customers' => $customers]);
    }
    public function create(){
        return view('admin.customer.create');
    }
}
