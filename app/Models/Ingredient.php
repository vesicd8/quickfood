<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends BaseModel
{
    use HasFactory;
    protected $table = "ingredients";

    public function products(){
        return $this->belongsToMany(Product::class, "product_ingredients", "ingredient_id", "product_id");
    }
}
