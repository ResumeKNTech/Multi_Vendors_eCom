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
        $banner = DB::table($this->table)->orderBy('id', 'DESC')->paginate(10);
        return view('admin.banner.index', ['banners' => $banner]);
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
            'photo' => 'string|required',
            'status' => 'required|in:active,inactive',
        ]);

        $data = $request->all();
        $slug = Str::slug($request->title);
        $count = DB::table($this->table)->where('slug', $slug)->count();
        if ($count > 0) {
            $slug = $slug . '-' . date('ymdis') . '-' . rand(0, 999);
        }
        $data['slug'] = $slug;

        $status = DB::table($this->table)->insert($data);

        if ($status) {
            return redirect()->route('banner.index')->with('success', 'Banner successfully deleted');
        } else {
            return redirect()->route('banner.index')->with('error', 'Error occurred while deleting banner');
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
            'photo' => 'string|required',
            'status' => 'required|in:active,inactive',
        ]);

        $data = $request->all();

        $status = DB::table($this->table)->where('id', $id)->update($data);

        if ($status) {
            return redirect()->route('banner.index')->with('success', 'Banner successfully deleted');
        } else {
            return redirect()->route('banner.index')->with('error', 'Error occurred while deleting banner');
        }

    }

    public function destroy($id)
    {
        $status = DB::table($this->table)->where('id', $id)->delete();

        if ($status) {
            return redirect()->route('banner.index')->with('success', 'Banner successfully deleted');
        } else {
            return redirect()->route('banner.index')->with('error', 'Error occurred while deleting banner');
        }

    }
}
