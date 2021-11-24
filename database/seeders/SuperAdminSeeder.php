<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('super_admins')->insert([
            'id' => '1',
            'super_admin_id' => '1',
            'email' => 'maria@gmail.com',
            'name' => 'Maria',
            'surname' => 'Madi',
        ]);
    }
}
