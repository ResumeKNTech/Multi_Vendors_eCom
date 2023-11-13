<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\PostTag;
use App\Models\User;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::getAllPost();
        // return $posts;
        return view('admin.post.index')->with('posts', $posts);
    }

    public function create()
    {
        $categories = PostCategory::where('status', 'active')->get();
        $tags = PostTag::get();
        $users = User::get();
        return view('admin.post.create')->with('users', $users)->with('categories', $categories)->with('tags', $tags);
    }

    public function store(Request $request)
    {
        // return $request->all();
        $this->validate($request, [
            'title' => 'string|required',
            'quote' => 'string|nullable',
            'summary' => 'string|required',
            'description' => 'string|nullable',
            'photo' => 'nullable',
            'tags' => 'nullable',
            'added_by' => 'nullable',
            'post_cat_id' => 'required',
            'status' => 'required|in:active,inactive'
        ]);

        $data = $request->all();

        $slug = Str::slug($request->title);
        $count = Post::where('slug', $slug)->count();
        if ($count > 0) {
            $slug = $slug . '-' . date('ymdis') . '-' . rand(0, 999);
        }
        $data['slug'] = $slug;

        // Upload main image
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $filename = time() . '-' . $image->getClientOriginalName();
            $image->move(public_path('post'), $filename);
            $data['photo'] = 'post/' . $filename;
        }
        $tags = $request->input('tags');
        if ($tags) {
            $data['tags'] = implode(',', $tags);
        } else {
            $data['tags'] = '';
        }
        // return $data;

        $status = Post::create($data);
        if ($status) {
            request()->merge(['success' => 'Thông báo đã được tạo.']);
        } else {
            request()->merge(['success' => 'Không thể tạo thông báo.']);
        }

        return redirect()->route('admin.post.index');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = PostCategory::get();
        $tags = PostTag::get();
        $users = User::get();
        return view('admin.post.edit')->with('categories', $categories)->with('users', $users)->with('tags', $tags)->with('post', $post);
    }


    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        // return $request->all();
        $this->validate($request, [
            'title' => 'string|required',
            'quote' => 'string|nullable',
            'summary' => 'string|required',
            'description' => 'string|nullable',
            'photo' => 'nullable',
            'tags' => 'nullable',
            'added_by' => 'nullable',
            'post_cat_id' => 'required',
            'status' => 'required|in:active,inactive'
        ]);

        $data = $request->all();
        $tags = $request->input('tags');
        // return $tags;
        if ($tags) {
            $data['tags'] = implode(',', $tags);
        } else {
            $data['tags'] = '';
        }
        // return $data;

        $status = $post->fill($data)->save();
        if ($status) {
            request()->merge(['success' => 'Thông báo đã được tạo.']);
        } else {
            request()->merge(['success' => 'Không thể tạo thông báo.']);
        }

        return redirect()->route('admin.post.index');
    }


    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        $status = $post->delete();

        if ($status) {
            request()->merge(['success' => 'Thông báo đã được tạo.']);
        } else {
            request()->merge(['success' => 'Không thể tạo thông báo.']);
        }

        return redirect()->route('admin.post.index');
    }
}
