<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRelationship extends Model
{
    use HasFactory;
     // Đảm bảo model này tương ứng với bảng 'user_relationships'
     protected $table = 'user_relationships';

     // Định nghĩa mối quan hệ với Category
     public function category()
     {
         return $this->belongsTo(Category::class, 'category_id');
     }
}
