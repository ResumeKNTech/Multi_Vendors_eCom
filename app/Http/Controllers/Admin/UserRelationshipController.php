<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRelationship\StoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserRelationshipController extends Controller
{
    public function index()
    {
        $userRelationships = DB::table('user_relationships')
            ->leftJoin('users', 'user_relationships.user_id', '=', 'users.id')
            ->leftJoin('categories', 'user_relationships.category_id', '=', 'categories.id')
            ->leftJoin('brands', 'user_relationships.brand_id', '=', 'brands.id')
            ->select(
                'user_relationships.*',
                'users.name as user_name',
                'categories.category_name',
                'brands.brand_name'
            )
            ->get();

        $users = DB::table('users')->where('type_user', 'vendor')->get();
        $categories = DB::table('categories')->get();
        $brands = DB::table('brands')->get();

        return view('admin.user_relationship.index', [
            'userRelationships' => $userRelationships,
            'users' => $users,
            'categories' => $categories,
            'brands' => $brands,
        ]);
    }

    public function store(StoreRequest $request)
    {

        $data = $request->except('_token');
        // Lấy giá trị từ trường select (category_id và brand_id)
        $categoryIds = $request->input('category_id', []);
        $brandIds = $request->input('brand_id', []);

        // Lưu giá trị vào cơ sở dữ liệu
        $data['category_id'] = implode(',', $categoryIds); // Lưu dưới dạng chuỗi CSV hoặc JSON tùy bạn
        $data['brand_id'] = implode(',', $brandIds); // Lưu dưới dạng chuỗi CSV hoặc JSON tùy bạn

        $data['created_at'] = now();
        DB::table('user_relationships')->insert($data);

        return redirect()->route('admin.user_relationship.index')->with('success', 'Bạn đã tạo thành công.');
    }

    public function update(Request $request, $id)
    {
        $data = $request->except('_token');
        $data['updated_at'] = now();
        DB::table('user_relationships')->where('id', $id)->update($data);

        return redirect()->route('admin.user_relationship.index')->with('success', 'Bạn đã chỉnh sửa thành công.');
    }

    public function destroy($id)
    {
        DB::table('user_relationships')->where('id', $id)->delete();

        return redirect()->route('admin.user_relationship.index')->with('success', 'Bạn đã xóa thành công.');
    }
}
