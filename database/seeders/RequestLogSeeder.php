<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RequestLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('request_logs')->insert([
            'id' => '1',
            'request_id' => '16',
            'log_date' => '01 February 2021',
            'log_time' => '10:00 - 12:00',
            'nurse_id' => '14',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('request_logs')->insert([
            'id' => '2',
            'request_id' => '17',
            'log_date' => '01 February 2021',
            'log_time' => '10:00 - 12:00',
            'nurse_id' => '14',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('request_logs')->insert([
            'id' => '3',
            'request_id' => '18',
            'log_date' => '01 February 2021',
            'log_time' => '10:00 - 12:00',
            'nurse_id' => '14',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('request_logs')->insert([
            'id' => '4',
            'request_id' => '19',
            'log_date' => '01 February 2021',
            'log_time' => '10:00 - 12:00',
            'nurse_id' => '14',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('request_logs')->insert([
            'id' => '5',
            'request_id' => '20',
            'log_date' => '01 February 2021',
            'log_time' => '10:00 - 12:00',
            'nurse_id' => '14',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('request_logs')->insert([
            'id' => '6',
            'request_id' => '21',
            'log_date' => '13 February 2021',
            'log_time' => '12:00 - 14:00',
            'nurse_id' => '16',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('request_logs')->insert([
            'id' => '7',
            'request_id' => '22',
            'log_date' => '13 February 2021',
            'log_time' => '10:00 - 12:00',
            'nurse_id' => '14',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('request_logs')->insert([
            'id' => '8',
            'request_id' => '23',
            'log_date' => '13 February 2021',
            'log_time' => '10:00 - 12:00',
            'nurse_id' => '14',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('request_logs')->insert([
            'id' => '9',
            'request_id' => '24',
            'log_date' => '13 February 2021',
            'log_time' => '10:00 - 12:00',
            'nurse_id' => '14',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('request_logs')->insert([
            'id' => '10',
            'request_id' => '25',
            'log_date' => '13 February 2021',
            'log_time' => '12:00 - 14:00',
            'nurse_id' => '16',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('request_logs')->insert([
            'id' => '11',
            'request_id' => '26',
            'log_date' => '13 February 2021',
            'log_time' => '12:00 - 14:00',
            'nurse_id' => '16',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('request_logs')->insert([
            'id' => '12',
            'request_id' => '27',
            'log_date' => '13 February 2021',
            'log_time' => '12:00 - 14:00',
            'nurse_id' => '16',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('request_logs')->insert([
            'id' => '13',
            'request_id' => '28',
            'log_date' => '13 February 2021',
            'log_time' => '12:00 - 14:00',
            'nurse_id' => '16',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('request_logs')->insert([
            'id' => '14',
            'request_id' => '29',
            'log_date' => '28 February 2021',
            'log_time' => '14:00 - 16:00',
            'nurse_id' => '14',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('request_logs')->insert([
            'id' => '15',
            'request_id' => '30',
            'log_date' => '28 February 2021',
            'log_time' => '14:00 - 16:00',
            'nurse_id' => '14',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('request_logs')->insert([
            'id' => '16',
            'request_id' => '1',
            'log_date' => '14 November 2021',
            'log_time' => '10:00 - 12:00',
            'nurse_id' => '14',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('request_logs')->insert([
            'id' => '17',
            'request_id' => '2',
            'log_date' => '14 November 2021',
            'log_time' => '10:00 - 12:00',
            'nurse_id' => '14',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('request_logs')->insert([
            'id' => '18',
            'request_id' => '3',
            'log_date' => '14 November 2021',
            'log_time' => '10:00 - 12:00',
            'nurse_id' => '14',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('request_logs')->insert([
            'id' => '19',
            'request_id' => '4',
            'log_date' => '14 November 2021',
            'log_time' => '10:00 - 12:00',
            'nurse_id' => '14',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('request_logs')->insert([
            'id' => '20',
            'request_id' => '5',
            'log_date' => '14 November 2021',
            'log_time' => '10:00 - 12:00',
            'nurse_id' => '14',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('request_logs')->insert([
            'id' => '21',
            'request_id' => '6',
            'log_date' => '14 November 2021',
            'log_time' => '14:00 - 16:00',
            'nurse_id' => '14',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('request_logs')->insert([
            'id' => '22',
            'request_id' => '15',
            'log_date' => '14 November 2021',
            'log_time' => '08:00 - 10:00',
            'nurse_id' => '15',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
