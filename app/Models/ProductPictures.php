<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPictures extends BaseModel
{
    use HasFactory;
    protected $table = "product_pictures";
    protected $fillable = ['src', 'alt' ];

    public function products(){
        return $this->belongsTo(Product::class, "product_id");
    }
}
