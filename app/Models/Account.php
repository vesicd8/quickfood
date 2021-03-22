<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends BaseModel
{
    use HasFactory;
    protected $table = "users";

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function status(){
        return $this->belongsTo(AccountStatus::class, 'status_id');
    }

    public function reviews(){
        return $this->belongsToMany(Product::class, "product_reviews", "user_id", "product_id")->withPivot(['stars', 'comment', 'id']);
    }

    public function orders(){
        return $this->hasMany(Order::class, 'user_id');
    }
    public function getReview($productId){
        return $this->with([
            'reviews' => function ($q) use ($productId){
                $q->wherePivot('user_id', $this->id)->wherePivot('product_id', $productId);
            }
        ])->first();
    }

}
