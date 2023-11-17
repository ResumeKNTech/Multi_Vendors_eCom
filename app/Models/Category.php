<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['category_name', 'slug', 'description'];

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class, 'category_id');
    }

    public static function getAllCategoriesWithSubCategories()
    {
        return Category::with('subCategories')->orderBy('id', 'DESC')->paginate(10);
    }
    public function userRelationships()
    {
        return $this->hasMany(UserRelationship::class, 'category_id');
    }

    public static function countActiveCategories()
    {
        return Category::count();
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }

    public function subProducts()
    {
        return $this->hasMany(Product::class, 'child_cat_id');
    }

    public static function getCategoryBySlug($slug)
    {
        return Category::with('products')->where('slug', $slug)->first();
    }

    public static function getSubCategoryBySlug($slug)
    {
        return SubCategory::with('products')->where('slug', $slug)->first();
    }
}
