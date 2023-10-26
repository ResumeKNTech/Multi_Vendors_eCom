<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = DB::table('categories')->get();
        return view('admin.category.index', ['categories' => $categories]);
    }

    
    public function store(StoreRequest $request)
    {
        $data = $request->except('_token');
        $data['created_at']=new \DateTime();
        DB::table('categories')->insert($data);
        return redirect()->route('admin.category.index')->with('success', 'Bạn đã tạo thành công.');
    }

    public function update(Request $request, $id)
    {
        $data = $request->except('_token');
        $data['updated_at']=new \DateTime();
        DB::table('categories')->where('id', $id)->update($data);
        return redirect()->route('admin.category.index')->with('success', 'Bạn đã chỉnh sửa thành công.');
    }

    public function destroy($id)
    {
        $hasSubCategory = DB::table('sub_categories')->where('category_id', $id)->count() > 0;
        if ($hasSubCategory) {
            // Handle error: cannot delete due to foreign key constraint
            return redirect()->back()->withErrors(['error' => 'Không thể xóa danh mục này vì còn tồn tại danh mục con liên quan tới nó.']);
        }

        DB::table('categories')->where('id', $id)->delete();

        return redirect()->route('admin.category.index')->with('success', 'Bạn đã xóa thành công.');
    }
}

