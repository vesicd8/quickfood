<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends BaseModel
{
    use HasFactory;
    protected $table = "units";

    public function products(){
        return $this->hasMany(Product::class);
    }

}
