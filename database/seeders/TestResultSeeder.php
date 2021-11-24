<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('test_results')->insert([
            'id' => '1',
            'request_id' => '16',
            'lab_user_id' => '17',
            'barcode' => 'RST_00001',
            'test_result' => 'Positive',
            'temperature' => '37.5',
            'blood_pressure' => '124/79',
            'oxygen_levels' => '95',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_results')->insert([
            'id' => '2',
            'request_id' => '17',
            'lab_user_id' => '17',
            'barcode' => 'RST_00002',
            'test_result' => 'Positive',
            'temperature' => '38.2',
            'blood_pressure' => '120/80',
            'oxygen_levels' => '97',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_results')->insert([
            'id' => '3',
            'request_id' => '18',
            'lab_user_id' => '17',
            'barcode' => 'RST_00003',
            'test_result' => 'Negative',
            'temperature' => '34.6',
            'blood_pressure' => '124/79',
            'oxygen_levels' => '99',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_results')->insert([
            'id' => '4',
            'request_id' => '19',
            'lab_user_id' => '17',
            'barcode' => 'RST_00004',
            'test_result' => 'Negative',
            'temperature' => '35.8',
            'blood_pressure' => '120/80',
            'oxygen_levels' => '99',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_results')->insert([
            'id' => '5',
            'request_id' => '20',
            'lab_user_id' => '17',
            'barcode' => 'RST_00005',
            'test_result' => 'Positive',
            'temperature' => '37.9',
            'blood_pressure' => '124/79',
            'oxygen_levels' => '90',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_results')->insert([
            'id' => '6',
            'request_id' => '21',
            'lab_user_id' => '17',
            'barcode' => 'RST_00006',
            'test_result' => 'Negative',
            'temperature' => '35.1',
            'blood_pressure' => '120/80',
            'oxygen_levels' => '100',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_results')->insert([
            'id' => '7',
            'request_id' => '22',
            'lab_user_id' => '17',
            'barcode' => 'RST_00007',
            'test_result' => 'Positive',
            'temperature' => '36.9',
            'blood_pressure' => '124/79',
            'oxygen_levels' => '92',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_results')->insert([
            'id' => '8',
            'request_id' => '23',
            'lab_user_id' => '17',
            'barcode' => 'RST_00008',
            'test_result' => 'Positive',
            'temperature' => '37.4',
            'blood_pressure' => '120/80',
            'oxygen_levels' => '91',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_results')->insert([
            'id' => '9',
            'request_id' => '24',
            'lab_user_id' => '17',
            'barcode' => 'RST_00009',
            'test_result' => 'Positive',
            'temperature' => '38.1',
            'blood_pressure' => '124/79',
            'oxygen_levels' => '93',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_results')->insert([
            'id' => '10',
            'request_id' => '25',
            'lab_user_id' => '17',
            'barcode' => 'RST_000010',
            'test_result' => 'Negative',
            'temperature' => '34.5',
            'blood_pressure' => '120/80',
            'oxygen_levels' => '100',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_results')->insert([
            'id' => '11',
            'request_id' => '26',
            'lab_user_id' => '17',
            'barcode' => 'RST_000011',
            'test_result' => 'Positive',
            'temperature' => '37.2',
            'blood_pressure' => '124/79',
            'oxygen_levels' => '91',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_results')->insert([
            'id' => '12',
            'request_id' => '27',
            'lab_user_id' => '17',
            'barcode' => 'RST_000012',
            'test_result' => 'Negative',
            'temperature' => '34.2',
            'blood_pressure' => '120/80',
            'oxygen_levels' => '99',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_results')->insert([
            'id' => '13',
            'request_id' => '28',
            'lab_user_id' => '17',
            'barcode' => 'RST_000013',
            'test_result' => 'Positive',
            'temperature' => '38.2',
            'blood_pressure' => '124/79',
            'oxygen_levels' => '92',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_results')->insert([
            'id' => '14',
            'request_id' => '29',
            'lab_user_id' => '17',
            'barcode' => 'RST_000014',
            'test_result' => 'Positive',
            'temperature' => '37.9',
            'blood_pressure' => '120/80',
            'oxygen_levels' => '93',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('test_results')->insert([
            'id' => '15',
            'request_id' => '30',
            'lab_user_id' => '17',
            'barcode' => 'RST_000015',
            'test_result' => 'Positive',
            'temperature' => '38.5',
            'blood_pressure' => '124/79',
            'oxygen_levels' => '94',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
