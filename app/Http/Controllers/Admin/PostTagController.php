<?php

namespace App\Http\Controllers\Admin;

use App\Models\PostTag;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostTagController extends Controller
{

    public function index()
    {
        $postTag = PostTag::orderBy('id', 'DESC')->paginate(10);
        return view('admin.post-tag.index')->with('postTags', $postTag);
    }

    public function create()
    {
        return view('admin.post-tag.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'string|required',
            'status' => 'required|in:active,inactive'
        ]);
        $data = $request->all();
        $slug = Str::slug($request->title);
        $count = PostTag::where('slug', $slug)->count();
        if ($count > 0) {
            $slug = $slug . '-' . date('ymdis') . '-' . rand(0, 999);
        }
        $data['slug'] = $slug;
        $status = PostTag::create($data);
        if ($status) {
            request()->merge(['success' => 'Thông báo đã được tạo.']);
        } else {
            request()->merge(['success' => 'Không thể tạo thông báo.']);
        }
        return redirect()->route('admin.post-tag.index');
    }


    public function edit($id)
    {
        $postTag = PostTag::findOrFail($id);
        return view('admin.post-tag.edit')->with('postTag', $postTag);
    }


    public function update(Request $request, $id)
    {
        $postTag = PostTag::findOrFail($id);
        // return $request->all();
        $this->validate($request, [
            'title' => 'string|required',
            'status' => 'required|in:active,inactive'
        ]);
        $data = $request->all();
        $status = $postTag->fill($data)->save();
        if ($status) {
            request()->merge(['success' => 'Thông báo đã được tạo.']);
        } else {
            request()->merge(['success' => 'Không thể tạo thông báo.']);
        }
        return redirect()->route('admin.post-tag.index');
    }

    public function destroy($id)
    {
        $postTag = PostTag::findOrFail($id);

        $status = $postTag->delete();

        if ($status) {
            request()->merge(['success' => 'Thông báo đã được tạo.']);
        } else {
            request()->merge(['success' => 'Không thể tạo thông báo.']);
        }
        return redirect()->route('admin.post-tag.index');
    }
}
