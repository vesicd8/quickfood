<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        DB::table("users")->insert([
            'first_name' => "Dusan",
            'last_name' => "Vesic",
            'email' => "dusan.vesic10@gmail.com",
            'username' => "vesicd8",
            'password' => md5("admin"),
            'role_id' => 3,
            'status_id' => 1
        ]);

        for($i = 0; $i < 30; $i++){
            DB::table("users")->insert([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->email,
                'username' => $faker->userName,
                'password' => md5($faker->password),
                'role_id' => 1,
                'status_id' => rand(1, 3)
            ]);
        }
    }
}
