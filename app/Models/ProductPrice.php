<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPrice extends BaseModel
{
    use HasFactory;
    protected $table = "product_prices";
    protected $fillable = ['unit_price'];

    public function product(){
        return $this->belongsTo(Product::class, "product_id");
    }
}
