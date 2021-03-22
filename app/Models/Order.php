<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends BaseModel
{
    use HasFactory;
    protected $table = "orders";

    public function status(){
        return $this->belongsTo(OrderStatus::class, "status_id");
    }

    public function products(){
        return $this->belongsToMany(Product::class, 'order_products', 'order_id', 'product_id')->withPivot(['quantity']);
    }

    public function user(){
        return $this->belongsTo(Account::class);
    }

}
