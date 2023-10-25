<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Brand\StoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    public function index()
    {
        $brands = DB::table('brands')->get();
        return view('admin.brand.index', ['brands' => $brands]);
    }

    public function create()
    {
        return view('admin.brand.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->except('_token');
        $data['created_at'] = new \DateTime();
        // Upload main image
        if ($request->hasFile('logo_images')) {
            $image = $request->file('logo_images');
            $filename = time() . '-' . $image->getClientOriginalName();
            $image->move(public_path('upload'), $filename);
            $data['logo_images'] = 'upload/' . $filename;
        }


        DB::table('brands')->insert($data);
        return redirect()->route('admin.brand.index');
    }

    public function update(Request $request, $id)
    {
        $data = $request->except('_token');
        $data['updated_at'] = new \DateTime();

        // Handling the logo image upload
        if ($request->hasFile('logo_images')) {
            $image = $request->file('logo_images');
            $filename = time() . '-' . $image->getClientOriginalName();
            $image->move(public_path('upload'), $filename);
            $data['logo_images'] = 'upload/' . $filename;
        }

        DB::table('brands')->where('id', $id)->update($data);
        return redirect()->route('admin.brand.index');
    }



    public function edit($id)
    {
        $brand = DB::table('brands')->where('id', $id)->first();
        return view('admin.brand.edit', ['brand' => $brand]);
    }



    public function destroy($id)
    {
        $hasProducts = DB::table('products')->where('brand_id', $id)->count() > 0;
        if ($hasProducts) {
            return redirect()->back()->withErrors(['error' => 'Không thể xoá vì liên quan tới sản phẩm.']);
        }

        DB::table('brands')->where('id', $id)->delete();
        return redirect()->route('admin.brand.index');
    }
}
