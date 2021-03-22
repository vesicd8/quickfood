<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountStatus extends BaseModel
{
    use HasFactory;
    protected $table = "account_status";

    public function users(){
        return $this->hasMany(Account::class, "status_id");
    }
}
