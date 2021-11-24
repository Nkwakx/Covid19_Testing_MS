<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FavouriteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('favourites')->insert([
            'nurse_id' => '1',
            'suburb_id' => '126'
        ]);
        DB::table('favourites')->insert([
            'nurse_id' => '1',
            'suburb_id' => '127'
        ]);
        DB::table('favourites')->insert([
            'nurse_id' => '1',
            'suburb_id' => '56'
        ]);
        DB::table('favourites')->insert([
            'nurse_id' => '1',
            'suburb_id' => '57'
        ]);
        DB::table('favourites')->insert([
            'nurse_id' => '16',
            'suburb_id' => '91'
        ]);
    }
}
