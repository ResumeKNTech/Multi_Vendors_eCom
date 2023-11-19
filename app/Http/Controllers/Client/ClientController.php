<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Banner;

use App\Models\PostTag;
use App\Models\Post;
use App\Models\User;
class ClientController extends Controller
{
    public function productSubCat(Request $request){
        $subCategory = Category::getSubCategoryBySlug($request->sub_slug);
        if (!$subCategory) {
            return redirect()->back()->with('error', 'Danh mục không tìm thấy');
        }


        $products = $subCategory->products; // Đây là danh sách sản phẩm của danh mục con
        $recent_products = Product::where('status','published')->orderBy('id','DESC')->limit(3)->get();

        if (request()->is('e-shop.loc/product-grids')) {
            return view('client.pages.product-grids', [
                'products' => $products,
                'recent_products' => $recent_products
            ]);
        } else {
            return view('client.pages.product-lists', [
                'products' => $products,
                'recent_products' => $recent_products
            ]);
        }
    }
    public function productSearch(Request $request){
        $recent_products=Product::where('status','published')->orderBy('id','DESC')->limit(3)->get();
        $products=Product::orwhere('product_title','like','%'.$request->search.'%')
                    ->orwhere('slug','like','%'.$request->search.'%')
                    ->orwhere('product_description','like','%'.$request->search.'%')
                    ->orwhere('short_description','like','%'.$request->search.'%')
                    ->orwhere('price','like','%'.$request->search.'%')
                    ->orderBy('id','DESC')
                    ->paginate('9');
        return view('client.pages.product-grids')->with('products',$products)->with('recent_products',$recent_products);
    }

    public function productCat(Request $request){
        $products=Category::getCategoryBySlug($request->slug);
        // return $request->slug;
        $recent_products=Product::where('status','published')->orderBy('id','DESC')->limit(3)->get();

        if(request()->is('e-shop.loc/product-grids')){
            return view('client.pages.product-grids')->with('products',$products->products)->with('recent_products',$recent_products);
        }
        else{
            return view('client.pages.product-lists')->with('products',$products->products)->with('recent_products',$recent_products);
        }

    }
    public function productBrand(Request $request){
        $products=Brand::getProductByBrand($request->brand_name);

        $recent_products=Product::where('status','published')->orderBy('id','DESC')->limit(3)->get();
        if(request()->is('e-shop.loc/product-grids')){

            return view('client.pages.product-grids')->with('products',$products->products)->with('recent_products',$recent_products);
        }
        else{
            return view('client.pages.product-lists')->with('products',$products->products)->with('recent_products',$recent_products);
        }

    }
    public function productFilter(Request $request)
    {
        $data = $request->all();
        // return $data;
        $showURL = "";
        if (!empty($data['show'])) {
            $showURL .= '&show=' . $data['show'];
        }

        $sortByURL = '';
        if (!empty($data['sortBy'])) {
            $sortByURL .= '&sortBy=' . $data['sortBy'];
        }

        $catURL = "";
        if (!empty($data['category'])) {
            foreach ($data['category'] as $category) {
                if (empty($catURL)) {
                    $catURL .= '&category=' . $category;
                } else {
                    $catURL .= ',' . $category;
                }
            }
        }

        $brandURL = "";
        if (!empty($data['brand'])) {
            foreach ($data['brand'] as $brand) {
                if (empty($brandURL)) {
                    $brandURL .= '&brand=' . $brand;
                } else {
                    $brandURL .= ',' . $brand;
                }
            }
        }
        // return $brandURL;

        $priceRangeURL = "";
        if (!empty($data['price_range'])) {
            $priceRangeURL .= '&price=' . $data['price_range'];
        }
        if (request()->is('e-shop.loc/product-grids')) {
            return redirect()->route('product-grids', $catURL . $brandURL . $priceRangeURL . $showURL . $sortByURL);
        } else {
            return redirect()->route('product-lists', $catURL . $brandURL . $priceRangeURL . $showURL . $sortByURL);
        }
    }
    public function productGrids()
    {
        $products = Product::query();

        if (!empty($_GET['category'])) {
            $slug = explode(',', $_GET['category']);
            // dd($slug);
            $cat_ids = Category::select('id')->whereIn('slug', $slug)->pluck('id')->toArray();
            // dd($cat_ids);
            $products->whereIn('cat_id', $cat_ids);
            // return $products;
        }
        if (!empty($_GET['brand'])) {
            $slugs = explode(',', $_GET['brand']);
            $brand_ids = Brand::select('id')->whereIn('slug', $slugs)->pluck('id')->toArray();
            return $brand_ids;
            $products->whereIn('brand_id', $brand_ids);
        }
        if (!empty($_GET['sortBy'])) {
            if ($_GET['sortBy'] == 'product_title') {
                $products = $products->where('status', 'published')->orderBy('title', 'ASC');
            }
            if ($_GET['sortBy'] == 'price') {
                $products = $products->orderBy('price', 'ASC');
            }
        }

        if (!empty($_GET['price'])) {
            $price = explode('-', $_GET['price']);
            $products->whereBetween('price', $price);
        }

        $recent_products = Product::where('status', 'published')->orderBy('id', 'DESC')->limit(3)->get();
        // Sort by number
        if (!empty($_GET['show'])) {
            $products = $products->where('status', 'published')->paginate($_GET['show']);
        } else {
            $products = $products->where('status', 'published')->paginate(9);
        }
        // Sort by name , price, category


        return view('client.pages.product-grids')->with('products', $products)->with('recent_products', $recent_products);
    }
    public function index(Request $request)
    {
        $ok = Product::whereNotNull('offer_price')
        ->where('offer_price', '<>', 0) // Điều kiện này đảm bảo rằng offer_price phải có giá trị khác 0
        ->orderBy('id', 'DESC')
        ->limit(2)
        ->get();

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
    public function productLists(){
        $products=Product::query();

        if(!empty($_GET['category'])){
            $slug=explode(',',$_GET['category']);
            // dd($slug);
            $cat_ids=Category::select('id')->whereIn('slug',$slug)->pluck('id')->toArray();
            // dd($cat_ids);
            $products->whereIn('cat_id',$cat_ids)->paginate;
            // return $products;
        }

        if(!empty($_GET['sortBy'])){
            if($_GET['sortBy']=='product_title'){
                $products=$products->where('status','published')->orderBy('product_title','ASC');
            }
            if($_GET['sortBy']=='price'){
                $products=$products->orderBy('price','ASC');
            }
        }

        if(!empty($_GET['price'])){
            $price=explode('-',$_GET['price']);

            $products->whereBetween('price',$price);
        }

        $recent_products=Product::where('status','published')->orderBy('id','DESC')->limit(3)->get();
        // Sort by number
        if(!empty($_GET['show'])){
            $products=$products->where('status','published')->paginate($_GET['show']);
        }
        else{
            $products=$products->where('status','published')->paginate(6);
        }
        // Sort by name , price, category


        return view('client.pages.product-lists')->with('products',$products)->with('recent_products',$recent_products);
    }
    public function productDetail($slug){
        $product_detail= Product::getProductBySlug($slug);
        // dd($product_detail);
        return view('client.pages.product-detail')->with('product_detail',$product_detail);
    }








}
