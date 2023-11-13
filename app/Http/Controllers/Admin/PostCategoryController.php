<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PostCategory;
use Illuminate\Support\Str;
class PostCategoryController extends Controller
{

    public function index()
    {
        $postCategory=PostCategory::orderBy('id','DESC')->paginate(10);
        return view('admin.post-category.index')->with('postCategories',$postCategory);
    }

    public function create()
    {
        return view('admin.post-category.create');
    }

    public function store(Request $request)
    {
        // return $request->all();
        $this->validate($request,[
            'title'=>'string|required',
            'status'=>'required|in:active,inactive'
        ]);
        $data=$request->all();
        $slug=Str::slug($request->title);
        $count=PostCategory::where('slug',$slug)->count();
        if($count>0){
            $slug=$slug.'-'.date('ymdis').'-'.rand(0,999);
        }
        $data['slug']=$slug;
        $status=PostCategory::create($data);
        if ($status) {
            request()->merge(['success' => 'Thông báo đã được tạo.']);
        } else {
            request()->merge(['success' => 'Không thể tạo thông báo.']);
        }
        return redirect()->route('admin.post-category.index');
    }


    public function edit($id)
    {
        $postCategory=PostCategory::findOrFail($id);
        return view('admin.post-category.edit')->with('postCategory',$postCategory);
    }

    public function update(Request $request, $id)
    {
        $postCategory=PostCategory::findOrFail($id);
         // return $request->all();
         $this->validate($request,[
            'title'=>'string|required',
            'status'=>'required|in:active,inactive'
        ]);
        $data=$request->all();
        $status=$postCategory->fill($data)->save();
        if ($status) {
            request()->merge(['success' => 'Thông báo đã được tạo.']);
        } else {
            request()->merge(['success' => 'Không thể tạo thông báo.']);
        }
        return redirect()->route('admin.post-category.index');
    }

    public function destroy($id)
    {
        $postCategory=PostCategory::findOrFail($id);

        $status=$postCategory->delete();

        if ($status) {
            request()->merge(['success' => 'Thông báo đã được tạo.']);
        } else {
            request()->merge(['success' => 'Không thể tạo thông báo.']);
        }
        return redirect()->route('admin.post-category.index');
    }
}
