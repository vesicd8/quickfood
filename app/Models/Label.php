<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Label extends BaseModel
{
    use HasFactory;
    protected $table = 'labels';

    public function products(){
        return $this->hasMany(Product::class, 'label_id');
    }
}
