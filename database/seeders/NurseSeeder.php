<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NurseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nurses')->insert([
            'id' => '1',
            'nurse_id' => '14',
            'name' => 'Dorothy',
            'surname' => 'Daniels',
            'email' => 'dorothy@gmail.com',
            'phone' => '0512458796',
            'idNo' => '7503180225083',
            'suburb_id' => '126',
        ]);
         DB::table('nurses')->insert([
            'id' => '2',
            'nurse_id' => '15',
            'name' => 'Lindile',
            'surname' => 'Hadebe',
            'email' => 'lindile@gmail.com',
            'phone' => '0522458796',
            'idNo' => '7603180225083',
            'suburb_id' => '73',
        ]);
         DB::table('nurses')->insert([
            'id' => '3',
            'nurse_id' => '16',
            'name' => 'Marcel',
            'surname' => 'Van Niekerk',
            'email' => 'marcel@gmail.com',
            'phone' => '0532458796',
            'idNo' => '7703180225083',
            'suburb_id' => '43',
        ]);
    }
}
