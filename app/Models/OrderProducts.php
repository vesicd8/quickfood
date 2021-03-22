<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProducts extends BaseModel
{
    use HasFactory;
    protected $table = "order_products";

    public function order(){
        return $this->belongsTo(Order::class, "order_id");
    }
}
