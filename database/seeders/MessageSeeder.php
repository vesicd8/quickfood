<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($i = 0; $i < 50; $i++){
            DB::table("messages")->insert([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'title' => $faker->text(100),
                'message' => $faker->realText(300)
            ]);
        }
    }
}
