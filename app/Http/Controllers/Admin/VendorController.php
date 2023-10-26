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
    // public function index()
    // {
    //     $data = DB::table('user_relationships')
    //         ->leftJoin('users', 'user_relationships.user_id', '=', 'users.id')
    //         ->leftJoin('categories', 'user_relationships.category_id', '=', 'categories.id')
    //         ->leftJoin('brands', 'user_relationships.brand_id', '=', 'brands.id')
    //         ->select(
    //             'users.id as user_id',
    //             'users.name as user_name',
    //             'users.type_user as type_user',
    //             'users.email as email',
    //             'user_relationships.created_at as user_relationship_created_at',
    //             'categories.category_name',
    //             'categories.created_at as category_created_at',
    //             'brands.brand_name as brand_name',
    //             'brands.created_at as brand_created_at',
    //             'brands.logo_images as lg'
    //         )
    //         ->where('users.type_user', '=', 'vendor') // Chỉ lấy người dùng có type_user là "vendor"
    //         ->get();
    
    //     // Tạo mảng chứa thông tin các category_id và brand_id của cùng một user_id
    //     $userBrands = [];
    //     foreach ($data as $item) {
    //         $userBrands[$item->user_id][] = [
    //             'category_name' => $item->category_name,
    //             'brand_name' => $item->brand_name,
    //             'lg' => $item->lg,
    //         ];
    //     }
    
    //     return view('admin.vendor.index', ['data' => $data, 'userBrands' => $userBrands]);
    // }
    

    // public function index()
    // {
    //     $data = DB::table('user_relationships')
    //         ->leftJoin('users', 'user_relationships.user_id', '=', 'users.id')
    //         ->leftJoin('categories', 'user_relationships.category_id', '=', 'categories.id')
    //         ->leftJoin('brands', 'user_relationships.brand_id', '=', 'brands.id')
    //         ->select(
    //             'users.id as user_id',
    //             'users.name as user_name',
    //             'users.type_user as type_user',
    //             'users.email as email',
    //             'user_relationships.created_at as user_relationship_created_at',
    //             'categories.category_name as category_name',
    //             'categories.id as category_id',
    //             'categories.created_at as category_created_at',
    //             'brands.brand_name as brand_name',
    //             'brands.created_at as brand_created_at',
    //             'brands.logo_images as lg'
    //         )
    //         ->where('users.type_user', '=', 'vendor') // Chỉ lấy người dùng có type_user là "vendor"
    //         ->get();
    
    //     // Tạo mảng chứa thông tin các category_id và brand_id của cùng một user_id
    //     $userBrands = [];
    //     $userCategories = [];
    
    //     foreach ($data as $item) {
    //         $userBrands[$item->user_id][] = [
    //             'brand_name' => $item->brand_name,
    //             'lg' => $item->lg,
    //         ];
    
    //         $userCategories[$item->user_id][] = [
    //             'category_name' => $item->category_name,
    //         ];
    //     }
    // dd($data);
    //     return view('admin.vendor.index', ['data' => $data, 'userBrands' => $userBrands, 'userCategories' => $userCategories]);
    // }
    
    public function index()
    {
        $data = DB::table('user_relationships')
            ->leftJoin('users', 'user_relationships.user_id', '=', 'users.id')
            ->leftJoin('categories', 'user_relationships.category_id', '=', 'categories.id')
            ->leftJoin('brands', 'user_relationships.brand_id', '=', 'brands.id')
            ->select(
                'users.id as user_id',
                'users.name as user_name',
                'users.user_image as user_image',
                'users.type_user as type_user',
                'users.email as email',
                'user_relationships.created_at as user_relationship_created_at',
                'categories.category_name',
                'categories.created_at as category_created_at',
                'brands.brand_name as brand_name',
                'brands.created_at as brand_created_at',
                'brands.logo_images as lg'
            )
            ->where('users.type_user', '=', 'vendor') // Chỉ lấy người dùng có type_user là "vendor"
            ->get();
    
        $processedUserIds = []; // Mảng lưu trữ user_id đã được xử lý
        $userBrands = []; // Mảng lưu trữ thông tin brand của từng user_id
        $userCategories = []; // Mảng lưu trữ thông tin category của từng user_id
    
        foreach ($data as $item) {
            $userBrands[$item->user_id][] = [
                'brand_name' => $item->brand_name,
                'lg' => $item->lg,
            ];
    
            $userCategories[$item->user_id][] = [
                'category_name' => $item->category_name,
            ];
        }
    
        return view('admin.vendor.index', ['data' => $data, 'processedUserIds' => $processedUserIds, 'userBrands' => $userBrands, 'userCategories' => $userCategories]);
    }
    
    public function create()
    {
        $userRelationships = DB::table('user_relationships')
            ->leftJoin('categories', 'user_relationships.category_id', '=', 'categories.id')
            ->leftJoin('brands', 'user_relationships.brand_id', '=', 'brands.id')
            ->select(
                'user_relationships.*',
                'categories.category_name',
                'brands.brand_name'
            )
            ->get();

        return view('admin.vendor.create', ['userRelationships' => $userRelationships]);
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

        DB::table('user_relationships')->insert($data);
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
