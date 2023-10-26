<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class VendorController extends Controller
{

    public function show($id)
    {
        // Find the user by ID using Query Builder
        $user = DB::table('users')->where('id', $id)->first();

        // Check if the user exists
        if (!$user) {
            abort(404, 'User not found');
        }

        // Return the view with the user details
        return view('admin.vendor.show', ['user' => $user]);
    }
    public function index()
    {
        $users = DB::table('users')
            ->leftJoin('categories', 'users.category_id', '=', 'categories.id')
            ->leftJoin('brands', 'users.brand_id', '=', 'brands.id')
            ->select(
                'users.*',
                'categories.category_name',
                'brands.brand_name'
            )
            ->where('users.type_user', '=', 'vendor') // Chỉ lấy người dùng có type_user là "vendor"
            ->get();

        return view('admin.vendor.index', ['users' => $users]);
    }



    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $data = $request->except('_token', 'password');
        $data['created_at'] = new \DateTime();
        $data['password'] = bcrypt($request->input('password')); // Encrypt the password

        // Upload user image
        if ($request->hasFile('user_image')) {
            $image = $request->file('user_image');
            $filename = time() . '-' . $image->getClientOriginalName();
            $image->move(public_path('upload'), $filename);
            $data['user_image'] = 'upload/' . $filename;
        }

        DB::table('users')->insert($data);
        return redirect()->route('admin.vendor.index');
    }

    public function update(Request $request, $id)
    {
        $data = $request->except('_token', 'password');
        $data['updated_at'] = new \DateTime();
        if ($request->input('password')) {
            $data['password'] = bcrypt($request->input('password')); // Encrypt the password if it's changed
        }

        // Upload user image
        if ($request->hasFile('user_image')) {
            $image = $request->file('user_image');
            $filename = time() . '-' . $image->getClientOriginalName();
            $image->move(public_path('upload'), $filename);
            $data['user_image'] = 'upload/' . $filename;
        }

        DB::table('users')->where('id', $id)->update($data);
        return redirect()->route('admin.vendor.index');
    }

    public function edit($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        return view('admin.user.edit', ['user' => $user]);
    }


    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect()->route('admin.vendor.index');
    }
}
