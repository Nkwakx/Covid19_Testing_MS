<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Role::factory()->times(10)->create();

         DB::table('roles')->insert([
             'name' => 'Manager'
         ]);

         DB::table('roles')->insert([
             'name' => 'Patient'
         ]);

         DB::table('roles')->insert([
             'name' => 'Nurse'
         ]);
         DB::table('roles')->insert([
             'name' => 'Lab User'
         ]);
         DB::table('roles')->insert([
             'name' => 'Admin'
         ]);
    }
}
