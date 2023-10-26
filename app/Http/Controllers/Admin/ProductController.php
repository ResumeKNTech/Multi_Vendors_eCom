<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\StoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = DB::table('products')
            ->leftJoin('brands', 'products.brand_id', '=', 'brands.id')
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->select(
                'products.*',
                'brands.brand_name',
                'categories.category_name'
            )
            ->get();

        return view('admin.product.index', ['products' => $products]);
    }

    public function create()
    {
        $categories = DB::table('categories')->get();
        $subcategories = DB::table('sub_categories')->get();
        $brands = DB::table('brands')->get();

        return view('admin.product.create', compact('categories', 'brands', 'subcategories'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->except('_token');
        $data['created_at'] = new \DateTime();
        // Upload main image
        if ($request->hasFile('images')) {
            $image = $request->file('images');
            $filename = time() . '-' . $image->getClientOriginalName();
            $image->move(public_path('product_upload'), $filename);
            $data['images'] = 'product_upload/' . $filename;
        }

        // Upload gallery images
        if ($request->hasFile('images_gallery')) {
            $images = $request->file('images_gallery');
            $imageNames = [];

            foreach ($images as $img) {
                $filename = time() . '-' . $img->getClientOriginalName();
                $img->move(public_path('product_gallery_upload'), $filename);
                $imageNames[] = 'product_gallery_upload/' . $filename;
            }

            $data['images_gallery'] = implode(',', $imageNames);
        }
        DB::table('products')->insert($data);
        return redirect()->route('admin.product.index')->with('success', 'Bạn đã tạo thành công.');
    }

    public function update(Request $request, $id)
    {
        $data = $request->except('_token');
        $data['updated_at'] = new \DateTime();

        // Upload main image
        if ($request->hasFile('images')) {
            $image = $request->file('images');
            $filename = time() . '-' . $image->getClientOriginalName();
            $image->move(public_path('product_upload'), $filename);
            $data['images'] = 'product_upload/' . $filename;
        } else {
            // If no main image is provided, unset it from the data
            unset($data['images']);
        }

        // Upload gallery images
        if ($request->hasFile('images_gallery')) {
            $images = $request->file('images_gallery');
            $imageNames = [];

            foreach ($images as $img) {
                $filename = time() . '-' . $img->getClientOriginalName();
                $img->move(public_path('product_gallery_upload'), $filename);
                $imageNames[] = 'product_gallery_upload/' . $filename;
            }

            $data['images_gallery'] = implode(',', $imageNames);
        } else {
            // If no gallery images are provided, unset it from the data
            unset($data['images_gallery']);
        }

        DB::table('products')->where('id', $id)->update($data);
        return redirect()->route('admin.product.index')->with('success', 'Bạn đã chỉnh sửa thành công.');
    }


    public function edit($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        $categories = DB::table('categories')->get();
        $subCategories = DB::table('sub_categories')->get();
        $brands = DB::table('brands')->get();
        return view('admin.product.edit', ['product' => $product, 'categories' => $categories, 'subCategories' => $subCategories, 'brands' => $brands]);
    }

    public function destroy($id)
    {
        DB::table('products')->where('id', $id)->delete();
        return redirect()->route('admin.product.index')->with('success', 'Bạn đã xoá thành công.');
    }
    public function getSubcategories(Request $request)
    {
        $subcategories = DB::table('sub_categories')->where('category_id', $request->category_id)->get();
        return response()->json($subcategories);
    }
}
