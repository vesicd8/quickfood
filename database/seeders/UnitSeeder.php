<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $units = ['mg', 'g', 'kg', 'ml', 'l'];

        foreach ($units as $unit){
            DB::table('units')->insert([
               'unit' => $unit
            ]);
        }
    }
}
