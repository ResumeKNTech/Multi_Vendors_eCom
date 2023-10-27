<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $users = DB::table('users')
            ->select(
                'users.*',
            )
            ->where('users.type_user', '=', 'customer') // Chỉ lấy người dùng có type_user là "customer"
            ->get();

        return view('admin.user.index', ['users' => $users]);
    }



    public function create()
    {
        return view('admin.user.create');
    }

    public function store(StoreRequest $request)
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
        return redirect()->route('admin.user.index');
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
        return redirect()->route('admin.user.index');
    }

    public function edit($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        return view('admin.user.edit', ['user' => $user]);
    }


    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect()->route('admin.user.index');
    }
}
