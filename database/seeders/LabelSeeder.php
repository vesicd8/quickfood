<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $labels = ['Nema', 'Akcija', 'Popularno'];

        foreach ($labels as $label){
            DB::table('labels')->insert([
                'label' => $label
            ]);
        }
    }
}
