<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends BaseModel
{
    use HasFactory;
    protected $table = "categories";

    public function products(){
        return $this->hasMany(Product::class, "category_id")->orderBy("name");
    }

    public function parent(){
        return $this->belongsTo(Category::class);
    }
}
