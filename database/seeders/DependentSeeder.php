<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DependentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dependents')->insert([
            'id' => '91',
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
        DB::table('dependents')->insert([
            'id' => '92',
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
        DB::table('dependents')->insert([
            'id' => '93',
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
        DB::table('dependents')->insert([
            'id' => '94',
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

        DB::table('dependents')->insert([
            'id' => '95',
            'main_member_id' => '3',
            'name' => 'Lesedi',
            'surname' => 'Moloi',
            'email_address' => 'lesedi@gmail.com',
            'phone' => '0772458796',
            'idNo' => '5503180225083',
            'addressLine1' => '19 Admirality Way',
            'suburb_id' => '126',
            'med_aid_YN' => 'Yes',
            'med_aid_plan_id' => '8',
            'med_aid_number' => '285465885',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('dependents')->insert([
            'id' => '96',
            'main_member_id' => '3',
            'name' => 'Thabo',
            'surname' => 'Moloi',
            'email_address' => 'jacob@gmail.com',
            'phone' => '0822458796',
            'idNo' => '8012010225083',
            'addressLine1' => '24 7th Avenue',
            'suburb_id' => '127',
            'med_aid_YN' => 'No',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
