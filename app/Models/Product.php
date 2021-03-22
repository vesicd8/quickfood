<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends BaseModel
{
    use HasFactory;
    protected $table = "products";
    protected $fillable = ['product_id'];
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function orders(){
        return $this->belongsToMany(Order::class, 'order_products', 'product_id', 'order_id');
    }

    public function label(){
        return $this->belongsTo(Label::class);
    }

    public function pictures(){
        return $this->hasMany(ProductPictures::class);
    }

    public function ingredients(){
        return $this->belongsToMany(Ingredient::class, "product_ingredients", "product_id", "ingredient_id");
    }

    public function prices(){
        return $this->hasMany(ProductPrice::class);
    }

    public function unit(){
        return $this->belongsTo(Unit::class, "unit_id");
    }

    public function price(){
        return $this->prices()->orderByDesc('id')->first();
    }

    public function oldPrice(){
        return $this->prices()->where('current', 0)->orderByDesc('id')->first();
    }

    public function reviews(){
        return $this->belongsToMany(Account::class, "product_reviews", "product_id", "user_id")->withPivot(['stars', 'comment', 'id', 'date']);
    }
}
