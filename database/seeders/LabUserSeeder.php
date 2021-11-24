<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LabUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('lab_users')->insert([
            'lab_user_id' => '17',
            'name' => 'Mandla',
            'surname' => 'Khumalo',
            'email' => 'mandla@gmail.com',
            'phone' => '0912458796',
            'idNo' => '79052520225083',
        ]);
    }
}
