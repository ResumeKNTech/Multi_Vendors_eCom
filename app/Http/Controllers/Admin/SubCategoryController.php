<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SubCategory\StoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{
    public function index()
    {

        $subCategories = DB::table('sub_categories')
        ->leftJoin('categories', 'sub_categories.category_id', '=', 'categories.id')
        ->select(
            'sub_categories.*',
            'categories.category_name'
        )
        ->get();
        $categories = DB::table('categories')->get();
        return view('admin.sub_category.index', ['subCategories' => $subCategories,'categories'=> $categories]);
    }

   

    public function store(StoreRequest $request)
    {
        $data = $request->except('_token');
        $data['created_at']=new \DateTime();
        DB::table('sub_categories')->insert($data);
        return redirect()
        ->route('admin.sub_category.index')
        ->with('success', 'Bạn đã tạo thành công.');
    }

    public function update(Request $request, $id)
    {
        $data = $request->except('_token');
        $data['updated_at']=new \DateTime();
        DB::table('sub_categories')->where('id', $id)->update($data);
        return redirect()->route('admin.sub_category.index')->with('success', 'Bạn đã chỉnh sửa thành công.');
    }

    public function destroy($id)
    {
        $hasProducts = DB::table('products')->where('sub_category_id', $id)->count() > 0;
        if ($hasProducts) {
            return redirect()->back()->withErrors(['error' => 'Không thể xóa danh mục con này vì còn sản phẩm liên quan.']);
        }

        DB::table('sub_categories')->where('id', $id)->delete();
        return redirect()->route('admin.sub_category.index')->with('success', 'Bạn đã xóa thành công.');
    }
}
