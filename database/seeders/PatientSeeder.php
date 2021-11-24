<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('patients')->insert([
            'id' => '1',
            'main_member_id' => '2',
            'name' => 'Daleen',
            'surname' => 'Meintjies',
            'email_address' => 'daleen@gmail.com',
            'phone' => '0832458796',
            'idNo' => '5503180225083',
            'addressLine1' => '19 Admirality Way',
            'suburb_id' => '126',
            'med_aid_YN' => 'Yes',
            'med_aid_plan_id' => '8',
            'med_aid_number' => '285465885',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('patients')->insert([
            'id' => '2',
            'main_member_id' => '2',
            'name' => 'Vince',
            'surname' => 'Meintjies',
            'email_address' => 'charmaine@gmail.com',
            'phone' => '0832458796',
            'idNo' => '5503180225083',
            'addressLine1' => '19 Admirality Way',
            'suburb_id' => '126',
            'med_aid_YN' => 'Yes',
            'med_aid_plan_id' => '8',
            'med_aid_number' => '285465885',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('patients')->insert([
            'id' => '3',
            'main_member_id' => '2',
            'name' => 'Vanessa',
            'surname' => 'Meintjies',
            'email_address' => 'charmaine@gmail.com',
            'phone' => '0832458796',
            'idNo' => '5503180225083',
            'addressLine1' => '19 Admirality Way',
            'suburb_id' => '126',
            'med_aid_YN' => 'Yes',
            'med_aid_plan_id' => '8',
            'med_aid_number' => '285465885',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('patients')->insert([
            'id' => '4',
            'main_member_id' => '2',
            'name' => 'Daniel',
            'surname' => 'Meintjies',
            'email_address' => 'charmaine@gmail.com',
            'phone' => '0832458796',
            'idNo' => '5503180225083',
            'addressLine1' => '19 Admirality Way',
            'suburb_id' => '126',
            'med_aid_YN' => 'Yes',
            'med_aid_plan_id' => '8',
            'med_aid_number' => '285465885',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

    }
}
