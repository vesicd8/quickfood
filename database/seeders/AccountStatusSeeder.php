<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $status = ['active', 'inactive', 'banned'];

    public function run()
    {
        foreach ($this->status as $status){
            DB::table("account_status")->insert([
                'status' => $status
            ]);
        }
    }
}
