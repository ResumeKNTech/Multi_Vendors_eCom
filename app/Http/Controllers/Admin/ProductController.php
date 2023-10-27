<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\StoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        // Lấy ID của người dùng hiện tại
        $userId = auth()->user()->id;

        // Lấy danh sách sản phẩm chỉ thuộc về người dùng hiện tại
        $products = DB::table('products')
            ->leftJoin('brands', 'products.brand_id', '=', 'brands.id')
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->leftJoin('sub_categories', 'products.sub_category_id', '=', 'sub_categories.id')
            ->select(
                'products.*',
                'brands.brand_name',
                'brands.logo_images',
                'categories.category_name',
                'sub_categories.sub_category_name',
                'brands.logo_images as lg'
            )
            ->where('products.user_id', $userId) // Lọc theo user_id
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
        // Lấy người dùng đang đăng nhập
        $user = Auth::user();

        // Kiểm tra xem người dùng có tồn tại không
        if (!$user) {
            return view('error.error');
        }
        // Kiểm tra vai trò của người dùng
        if ($user->type_user !== 'admin' && $user->type_user !== 'vendor') {
            return redirect()->back()->with('error', 'Bạn không có quyền tạo sản phẩm.');
        }
        $data = $request->except('_token');
        $data['created_at'] = now(); // Sử dụng hàm now() để lấy ngày giờ hiện tại

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
        // Chuyển đổi mảng thành chuỗi văn bản, sử dụng dấu phẩy làm phân cách
        $productTags = implode(',', $request->input('product_tags', []));

        // Lưu trữ dưới dạng văn bản vào cơ sở dữ liệu
        $data['product_tags'] = $productTags;
        // Tự động liên kết sản phẩm với người dùng
        $data['user_id'] = $user->id;

        // Sử dụng Query Builder để thêm sản phẩm
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
        // Chuyển đổi mảng thành chuỗi văn bản, sử dụng dấu phẩy làm phân cách
        $productTags = implode(',', $request->input('product_tags', []));

        // Lưu trữ dưới dạng văn bản vào cơ sở dữ liệu
        $data['product_tags'] = $productTags;
        DB::table('products')->where('id', $id)->update($data);
        return redirect()->route('admin.product.index')->with('success', 'Bạn đã chỉnh sửa thành công.');
    }


    public function edit($id)
    {
        $product = DB::table('products')
            ->where('id', $id)
            ->where('user_id', auth()->user()->id) // Kiểm tra user_id
            ->first();
        if (!$product) {
            return view('error.error');
        }
        $categories = DB::table('categories')->get();
        $subCategories = DB::table('sub_categories')->get();
        $brands = DB::table('brands')->get();
        return view('admin.product.edit', ['product' => $product, 'categories' => $categories, 'subCategories' => $subCategories, 'brands' => $brands]);
    }

    public function destroy($id)
    {
        $product = DB::table('products')
            ->where('id', $id)
            ->where('user_id', auth()->user()->id) // Kiểm tra user_id
            ->first();

            if (!$product) {
                return view('error.error');
            }

        DB::table('products')->where('id', $id)->delete();
        return redirect()->route('admin.product.index')->with('success', 'Bạn đã xóa thành công.');
    }

    public function getSubcategories(Request $request)
    {
        $subcategories = DB::table('sub_categories')->where('category_id', $request->category_id)->get();
        return response()->json($subcategories);
    }
}
