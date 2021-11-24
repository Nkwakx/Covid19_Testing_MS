<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('test_requests')->insert([
            'id' => '1',
            'status' => 'Scheduled',
            'requestor_id' => '2',
            'test_Subject_Id' => '2',
            'addressLine1' => '19 Admilarity Way',
            'suburb_id' => '126',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_requests')->insert([
            'id' => '2',
            'status' => 'Scheduled',
            'requestor_id' => '2',
            'test_Subject_Id' => '91',
            'addressLine1' => '19 Admilarity Way',
            'suburb_id' => '126',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_requests')->insert([
            'id' => '3',
            'status' => 'Scheduled',
            'requestor_id' => '2',
            'test_Subject_Id' => '92',
            'addressLine1' => '19 Admilarity Way',
            'suburb_id' => '126',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_requests')->insert([
            'id' => '4',
            'status' => 'Scheduled',
            'requestor_id' => '2',
            'test_Subject_Id' => '93',
            'addressLine1' => '19 Admilarity Way',
            'suburb_id' => '126',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_requests')->insert([
            'id' => '5',
            'status' => 'Scheduled',
            'requestor_id' => '2',
            'test_Subject_Id' => '94',
            'addressLine1' => '19 Admilarity Way',
            'suburb_id' => '126',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_requests')->insert([
            'id' => '6',
            'status' => 'Scheduled',
            'requestor_id' => '4',
            'test_Subject_Id' => '4',
            'addressLine1' => '1 Harbor Cottages',
            'addressLine2' => 'Sayre Crescent',
            'suburb_id' => '56',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_requests')->insert([
            'id' => '7',
            'status' => 'New',
            'requestor_id' => '5',
            'test_Subject_Id' => '5',
            'addressLine1' => '27 Aspen Complex',
            'addressLine2' => 'La Roche Drive',
            'suburb_id' => '57',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_requests')->insert([
            'id' => '8',
            'status' => 'New',
            'requestor_id' => '6',
            'test_Subject_Id' => '6',
            'addressLine1' => '6 Rubin Crescent',
            'suburb_id' => '126',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_requests')->insert([
            'id' => '9',
            'status' => 'New',
            'requestor_id' => '7',
            'test_Subject_Id' => '7',
            'addressLine1' => '28 7th Avenue',
            'suburb_id' => '127',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_requests')->insert([
            'id' => '10',
            'status' => 'New',
            'requestor_id' => '8',
            'test_Subject_Id' => '8',
            'addressLine1' => '37 The Beaches',
            'addressLine2' => 'Beach Road',
            'suburb_id' => '56',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_requests')->insert([
            'id' => '11',
            'status' => 'New',
            'requestor_id' => '9',
            'test_Subject_Id' => '9',
            'addressLine1' => '12 Marshall Road',
            'suburb_id' => '57',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_requests')->insert([
            'id' => '12',
            'status' => 'New',
            'requestor_id' => '10',
            'test_Subject_Id' => '10',
            'addressLine1' => '13 Congo Avenue',
            'suburb_id' => '84',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_requests')->insert([
            'id' => '13',
            'status' => 'New',
            'requestor_id' => '11',
            'test_Subject_Id' => '11',
            'addressLine1' => '29 Peace Street',
            'suburb_id' => '84',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_requests')->insert([
            'id' => '14',
            'status' => 'New',
            'requestor_id' => '12',
            'test_Subject_Id' => '12',
            'addressLine1' => '7 Jacks Road',
            'suburb_id' => '84',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_requests')->insert([
            'id' => '15',
            'status' => 'Scheduled',
            'requestor_id' => '13',
            'test_Subject_Id' => '13',
            'addressLine1' => '45 Columbia Crescent',
            'suburb_id' => '84',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_requests')->insert([
            'id' => '16',
            'status' => 'Cancelled',
            'requestor_id' => '2',
            'test_Subject_Id' => '2',
            'addressLine1' => '19 Admilarity Way',
            'suburb_id' => '126',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_requests')->insert([
            'id' => '17',
            'status' => 'Cancelled',
            'requestor_id' => '2',
            'test_Subject_Id' => '91',
            'addressLine1' => '19 Admilarity Way',
            'suburb_id' => '126',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_requests')->insert([
            'id' => '18',
            'status' => 'Cancelled',
            'requestor_id' => '2',
            'test_Subject_Id' => '92',
            'addressLine1' => '19 Admilarity Way',
            'suburb_id' => '126',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_requests')->insert([
            'id' => '19',
            'status' => 'Cancelled',
            'requestor_id' => '2',
            'test_Subject_Id' => '93',
            'addressLine1' => '19 Admilarity Way',
            'suburb_id' => '126',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_requests')->insert([
            'id' => '20',
            'status' => 'Cancelled',
            'requestor_id' => '2',
            'test_Subject_Id' => '94',
            'addressLine1' => '19 Admilarity Way',
            'suburb_id' => '126',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_requests')->insert([
            'id' => '21',
            'status' => 'Cancelled',
            'requestor_id' => '4',
            'test_Subject_Id' => '4',
            'addressLine1' => '1 Harbor Cottages',
            'addressLine2' => 'Sayre Crescent',
            'suburb_id' => '56',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_requests')->insert([
            'id' => '22',
            'status' => 'Cancelled',
            'requestor_id' => '5',
            'test_Subject_Id' => '5',
            'addressLine1' => '27 Aspen Complex',
            'addressLine2' => 'La Roche Drive',
            'suburb_id' => '57',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_requests')->insert([
            'id' => '23',
            'status' => 'Cancelled',
            'requestor_id' => '6',
            'test_Subject_Id' => '6',
            'addressLine1' => '6 Rubin Crescent',
            'suburb_id' => '126',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_requests')->insert([
            'id' => '24',
            'status' => 'Cancelled',
            'requestor_id' => '7',
            'test_Subject_Id' => '7',
            'addressLine1' => '28 7th Avenue',
            'suburb_id' => '127',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_requests')->insert([
            'id' => '25',
            'status' => 'Cancelled',
            'requestor_id' => '8',
            'test_Subject_Id' => '8',
            'addressLine1' => '37 The Beaches',
            'addressLine2' => 'Beach Road',
            'suburb_id' => '56',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_requests')->insert([
            'id' => '26',
            'status' => 'Cancelled',
            'requestor_id' => '9',
            'test_Subject_Id' => '9',
            'addressLine1' => '12 Marshall Road',
            'suburb_id' => '57',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_requests')->insert([
            'id' => '27',
            'status' => 'Cancelled',
            'requestor_id' => '10',
            'test_Subject_Id' => '10',
            'addressLine1' => '13 Congo Avenue',
            'suburb_id' => '84',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_requests')->insert([
            'id' => '28',
            'status' => 'Cancelled',
            'requestor_id' => '11',
            'test_Subject_Id' => '11',
            'addressLine1' => '29 Peace Street',
            'suburb_id' => '84',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_requests')->insert([
            'id' => '29',
            'status' => 'Cancelled',
            'requestor_id' => '12',
            'test_Subject_Id' => '12',
            'addressLine1' => '7 Jacks Road',
            'suburb_id' => '84',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_requests')->insert([
            'id' => '30',
            'status' => 'Cancelled',
            'requestor_id' => '13',
            'test_Subject_Id' => '13',
            'addressLine1' => '45 Columbia Crescent',
            'suburb_id' => '84',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
