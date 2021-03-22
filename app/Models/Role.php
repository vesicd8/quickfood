<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends BaseModel
{
    use HasFactory;
    protected $table = "roles";

    public function users(){
        return $this->hasMany(Account::class, "role_id");
    }

}
