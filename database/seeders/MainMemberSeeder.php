<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MainMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('main_members')->insert([
            'id' => '1',
            'main_member_id' => '2',
            'name' => 'Charmaine',
            'surname' => 'Meintjies',
            'email' => 'charmaine@gmail.com',
            'phone' => '0832458796',
            'idNo' => '5503180225083',
            'addressLine1' => '19 Admirality Way',
            'suburb_id' => '126',
            'med_aid_YN' => 'Yes',
            'med_aid_plan_id' => '8',
            'med_aid_number' => '285465885'
        ]);
         DB::table('main_members')->insert([
            'id' => '2',
            'main_member_id' => '3',
            'name' => 'Jacob',
            'surname' => 'Moloi',
            'email' => 'jacob@gmail.com',
            'phone' => '0822458796',
            'idNo' => '8012010225083',
            'addressLine1' => '24 7th Avenue',
            'suburb_id' => '127',
            'med_aid_YN' => 'No',
        ]);
         DB::table('main_members')->insert([
            'id' => '3',
            'main_member_id' => '4',
            'name' => 'David',
            'surname' => 'Greeff',
            'email' => 'davide@gmail.com',
            'phone' => '0712458796',
            'idNo' => '8002200225083',
            'addressLine1' => '1 Harbor Cottages',
            'addressLine2' => 'Sayre Crescent',
            'suburb_id' => '56',
            'med_aid_YN' => 'No',
        ]);
         DB::table('main_members')->insert([
            'id' => '4',
            'main_member_id' => '5',
            'name' => 'Kopano',
            'surname' => 'Sithole',
            'email' => 'kopano@gmail.com',
            'phone' => '0722458796',
            'idNo' => '7606030225083',
            'addressLine1' => '27 Aspen Complex',
            'addressLine2' => 'La Roche Drive',
            'suburb_id' => '57',
            'med_aid_YN' => 'No',
        ]);
         DB::table('main_members')->insert([
            'id' => '5',
            'main_member_id' => '6',
            'name' => 'Karien',
            'surname' => 'Momberg',
            'email' => 'karien@gmail.com',
            'phone' => '0732458796',
            'idNo' => '8509020225083',
            'addressLine1' => '6 Rubin Crescent',
            'suburb_id' => '126',
            'med_aid_YN' => 'No',
        ]);
        DB::table('main_members')->insert([
            'id' => '6',
            'main_member_id' => '7',
            'name' => 'Felicity',
            'surname' => 'Daniels',
            'email' => 'felicityONP400@gmail.com',
            'phone' => '0732458796',
            'idNo' => '7512020225083',
            'addressLine1' => '28 7th Avenue',
            'suburb_id' => '127',
            'med_aid_YN' => 'No',
        ]);
         DB::table('main_members')->insert([
            'id' => '7',
            'main_member_id' => '8',
            'name' => 'Errol ',
            'surname' => 'Pieterse',
            'email' => 'errol@gmail.com',
            'phone' => '0612458796',
            'idNo' => '6008090225083',
            'addressLine1' => '37 The Beaches',
            'addressLine2' => 'Beach Road',
            'suburb_id' => '56',
            'med_aid_YN' => 'No',
        ]);
         DB::table('main_members')->insert([
            'id' => '8',
            'main_member_id' => '9',
            'name' => 'Alyce',
            'surname' => 'Morapedi',
            'email' => 'alyce@gmail.com',
            'phone' => '0632458796',
            'idNo' => '6412120225083',
            'addressLine1' => '12 Marshall Road',
            'suburb_id' => '57',
            'med_aid_YN' => 'Yes',
            'med_aid_plan_id' => '17',
            'med_aid_number' => '395465885'
        ]);
         DB::table('main_members')->insert([
            'id' => '9',
            'main_member_id' => '10',
            'name' => 'Asha',
            'surname' => 'Sharma',
            'email' => 'asha@gmail.com',
            'phone' => '0812458796',
            'idNo' => '8302090225083',
            'addressLine1' => '13 Congo Avenue',
            'suburb_id' => '84',
            'med_aid_YN' => 'Yes',
            'med_aid_plan_id' => '44',
            'med_aid_number' => '175465885'
        ]);
         DB::table('main_members')->insert([
            'id' => '10',
            'main_member_id' => '11',
            'name' => 'Carlos',
            'surname' => 'Perestrelo',
            'email' => 'carlos@gmail.com',
            'phone' => '0842458796',
            'idNo' => '5008100225083',
            'addressLine1' => '29 Peace Street',
            'suburb_id' => '84',
            'med_aid_YN' => 'No',
        ]);
         DB::table('main_members')->insert([
            'id' => '11',
            'main_member_id' => '12',
            'name' => 'Kabelo',
            'surname' => 'Padi',
            'email' => 'kabelo@gmail.com',
            'phone' => '0742458796',
            'idNo' => '7112150225083',
            'addressLine1' => '7 Jacks Road',
            'suburb_id' => '84',
            'med_aid_YN' => 'No',
        ]);
         DB::table('main_members')->insert([
            'id' => '12',
            'main_member_id' => '13',
            'name' => 'Pulane',
            'surname' => 'Masemola',
            'email' => 'pulane@gmail.com',
            'phone' => '0642458796',
            'idNo' => '9110120225083',
            'addressLine1' => '45 Columbia Crescent',
            'suburb_id' => '84',
            'med_aid_YN' => 'Yes',
            'med_aid_plan_id' => '1',
            'med_aid_number' => '465465885'
        ]);
    }
}
