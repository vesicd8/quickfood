<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends BaseModel
{
    use HasFactory;
    protected $table = "reviews";

    public function users(){
        return $this->belongsTo(Account::class, 'user_id');
    }

}
