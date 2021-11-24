<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicalAidSchemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('medical_aid_schemes')->insert([
            'name' => 'BestMed'
        ]);
        DB::table('medical_aid_schemes')->insert([
            'name' => 'Bonitas'
        ]);
        DB::table('medical_aid_schemes')->insert([
            'name' => 'Discovery Health'
        ]);
    }
}
