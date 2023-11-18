<?php

namespace App\Http\Controllers\Client;

use App\Models\Banner;
use App\Models\Product;
use App\Models\Category;
use App\Models\PostTag;
use App\Models\Post;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $ok = Product::where('status', 'published')->orderBy('id', 'DESC')->limit(2)->get();

        $posts = Post::where('status', 'active')->orderBy('id', 'DESC')->limit(3)->get();
        $banners = Banner::where('status', 'active')->limit(3)->orderBy('id', 'DESC')->get();
        // return $banner;
        $products = Product::where('status', 'published')->orderBy('id', 'DESC')->get();
        $category = Category::orderBy('id', 'DESC')->get();

        // Lấy tất cả người dùng và danh mục liên quan của họ
        $vendors = User::with('relatedCategories')
            ->where('type_user', 'vendor')
            ->get();
        return view('client.pages.index')
            ->with('posts', $posts)
            ->with('banners', $banners)
            ->with('product_lists', $products)
            ->with('category_lists', $category)
            ->with('vendors', $vendors)
            ->with('ok', $ok);
    }
}
