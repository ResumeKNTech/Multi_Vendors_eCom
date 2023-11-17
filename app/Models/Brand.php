<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $fillable=['logo_images','brand_name','is_featured','status'];
    public function products()
    {
        return $this->hasMany('App\Models\Product', 'brand_id', 'id')->where('status', 'published');
    }
    public static function getProductByBrand($brand_name)
    {
        // dd($slug);
        return Brand::with('products')->where('brand_name', $brand_name)->first();
    }
}
