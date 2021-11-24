<?php

namespace Database\Seeders;

use App\Models\SuperAdmin;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call(SecurityQuestionsSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(SuburbSeeder::class);
        $this->call(MedicalAidSchemeSeeder::class);
        $this->call(MedicalAidPlanSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(RoleUserSeeder::class);
        $this->call(LabUserSeeder::class);
        $this->call(NurseSeeder::class);
        $this->call(MainMemberSeeder::class);
        $this->call(DependentSeeder::class);
        $this->call(SuperAdminSeeder::class);
        $this->call(TestRequestSeeder::class);
        $this->call(RequestLogSeeder::class);
        $this->call(TestResultSeeder::class);
    }
}
