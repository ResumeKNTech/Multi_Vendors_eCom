<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    protected $table = 'banners'; // Tên bảng trong cơ sở dữ liệu

    public function index()
    {
        $banners = DB::table($this->table)->orderBy('id', 'DESC')->paginate(10);
        return view('admin.banner.index', ['banners' => $banners]);
    }

    public function create()
    {
        return view('admin.banner.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'string|required|max:50',
            'description' => 'string|nullable',
            'photo' => 'required',
            'status' => 'required|in:active,inactive',
        ]);

        $data = $request->except('_token');
        $slug = Str::slug($request->title);
        $count = DB::table($this->table)->where('slug', $slug)->count();
        if ($count > 0) {
            $slug = $slug . '-' . date('ymdis') . '-' . rand(0, 999);
        }
        $data['slug'] = $slug;
        // Upload main image

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $filename = time() . '-' . $image->getClientOriginalName();
            $image->move(public_path('banner'), $filename);
            $data['photo'] = 'banner/' . $filename;
        }



        $status = DB::table($this->table)->insert($data);

        if ($status) {
            return redirect()->route('admin.banner.index')->with('success', 'Banner successfully deleted');
        } else {
            return redirect()->route('admin.banner.index')->with('error', 'Error occurred while deleting banner');
        }
    }

    public function edit($id)
    {
        $banner = DB::table($this->table)->where('id', $id)->first();
        return view('admin.banner.edit', ['banner' => $banner]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'string|required|max:50',
            'description' => 'string|nullable',
            'photo' => 'sometimes|required', // 'sometimes' để không bắt buộc khi không tải ảnh mới
            'status' => 'required|in:active,inactive',
        ]);
    
        $data = $request->except('_token');
        $slug = Str::slug($request->title);
        $count = DB::table($this->table)->where('slug', $slug)->where('id', '!=', $id)->count();
        if ($count > 0) {
            $slug = $slug . '-' . date('ymdis') . '-' . rand(0, 999);
        }
        $data['slug'] = $slug;
        // Upload main image
    
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $filename = time() . '-' . $image->getClientOriginalName();
            $image->move(public_path('banner'), $filename);
            $data['photo'] = 'banner/' . $filename;
        }
    
        $status = DB::table($this->table)->where('id', $id)->update($data);
    
        if ($status) {
            return redirect()->route('admin.banner.index')->with('success', 'Banner successfully updated');
        } else {
            return redirect()->route('admin.banner.index')->with('error', 'Error occurred while updating banner');
        }
    }
    

    public function destroy($id)
    {
        $status = DB::table($this->table)->where('id', $id)->delete();

        if ($status) {
            return redirect()->route('admin.banner.index')->with('success', 'Banner successfully deleted');
        } else {
            return redirect()->route('admin.banner.index')->with('error', 'Error occurred while deleting banner');
        }
    }
}
