<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Định nghĩa các trường có thể được mass assignment
    protected $fillable = [
        'product_name',
        'product_title',
        'slug',
        'product_description',
        'short_description',
        'images',
        'images_gallery',
        'product_tags',
        'price',
        'offer_price',
        'sales_begin',
        'sales_end',
        'stock',
        'stock_status',
        'status',
        'publish',
        'category_id',
        'sub_category_id',
        'brand_id',
        'user_id',
    ];

    // Mối quan hệ với Category
    public function cat_info()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    // Mối quan hệ với SubCategory
    public function sub_cat_info()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id', 'id');
    }

    // Lấy tất cả sản phẩm
    public static function getAllProduct()
    {
        return self::with(['cat_info', 'sub_cat_info'])->orderBy('id', 'desc')->paginate(10);
    }

    // Sản phẩm liên quan
    public function rel_prods()
    {
        return $this->hasMany(self::class, 'category_id', 'category_id')->where('status', 'active')->orderBy('id', 'DESC')->limit(8);
    }

    // Đánh giá sản phẩm
    public function getReview()
    {
        return $this->hasMany(ProductReview::class, 'product_id', 'id')->with('user_info')->where('status', 'active')->orderBy('id', 'DESC');
    }

    // Lấy sản phẩm theo slug
    public static function getProductBySlug($slug)
    {
        return self::with(['cat_info', 'rel_prods', 'getReview'])->where('slug', $slug)->first();
    }

    // Đếm số lượng sản phẩm đang hoạt động
    public static function countActiveProduct()
    {
        return self::where('status', 'active')->count();
    }

    // Mối quan hệ với Cart
    public function carts()
    {
        return $this->hasMany(Cart::class)->whereNotNull('order_id');
    }

    // Mối quan hệ với Wishlist
    public function wishlists()
    {
        return $this->hasMany(Wishlist::class)->whereNotNull('cart_id');
    }

    // Mối quan hệ với Brand
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }
}
