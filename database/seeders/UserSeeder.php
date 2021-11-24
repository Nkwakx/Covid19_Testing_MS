<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //User::factory()->times(10)->create();

         DB::table('users')->insert([
            'id' => '1',
            'email' => 'maria@gmail.com',
            'password' => bcrypt('12345678'),
            'name' => 'Maria',
            'surname' => 'Madi',
            'status' => 'Active',
            'user_type' => 'M',

        ]);
         DB::table('users')->insert([
            'id' => '2',
            'email' => 'charmaine@gmail.com',
            'password' => bcrypt('12345678'),
            'name' => 'Charmaine',
            'surname' => 'Meintjies',
            'status' => 'Active',
            'user_type' => 'P',
        ]);
         DB::table('users')->insert([
            'id' => '3',
            'email' => 'jacob@gmail.com',
            'password' => bcrypt('12345678'),
            'name' => 'Jacob',
            'surname' => 'Moloi',
            'status' => 'Active',
            'user_type' => 'P',
        ]);
         DB::table('users')->insert([
            'id' => '4',
            'email' => 'davide@gmail.com',
            'password' => bcrypt('12345678'),
            'name' => 'David',
            'surname' => 'Greeff',
            'status' => 'Active',
            'user_type' => 'P',
        ]);
         DB::table('users')->insert([
            'id' => '5',
            'email' => 'kopano@gmail.com',
            'password' => bcrypt('12345678'),
            'name' => 'Kopano',
            'surname' => 'Sithole',
            'status' => 'Active',
            'user_type' => 'P',
        ]);
         DB::table('users')->insert([
            'id' => '6',
            'email' => 'karien@gmail.com',
            'password' => bcrypt('12345678'),
            'name' => 'Karien',
            'surname' => 'Momberg',
            'status' => 'Active',
            'user_type' => 'P',
        ]);
        DB::table('users')->insert([
            'id' => '7',
            'email' => 'felicityONP400@gmail.com',
            'name' => 'Felicity',
            'surname' => 'Daniels',
            'password' => bcrypt('12345678'),
            'status' => 'Active',
            'user_type' => 'P',
        ]);
         DB::table('users')->insert([
            'id' => '8',
            'email' => 'errol@gmail.com',
            'password' => bcrypt('12345678'),
            'name' => 'Errol ',
            'surname' => 'Pieterse',
            'status' => 'Active',
            'user_type' => 'P',
        ]);
         DB::table('users')->insert([
            'id' => '9',
            'email' => 'alyce@gmail.com',
            'password' => bcrypt('12345678'),
            'name' => 'Alyce',
            'surname' => 'Morapedi',
            'status' => 'Active',
            'user_type' => 'P',
        ]);
         DB::table('users')->insert([
            'id' => '10',
            'email' => 'asha@gmail.com',
            'password' => bcrypt('12345678'),
            'name' => 'Asha',
            'surname' => 'Sharma',
            'status' => 'Active',
            'user_type' => 'P',
        ]);
         DB::table('users')->insert([
            'id' => '11',
            'email' => 'carlos@gmail.com',
            'password' => bcrypt('12345678'),
            'name' => 'Carlos',
            'surname' => 'Perestrelo',
            'status' => 'Active',
            'user_type' => 'P',
        ]);
         DB::table('users')->insert([
            'id' => '12',
            'email' => 'kabelo@gmail.com',
            'password' => bcrypt('12345678'),
            'name' => 'Kabelo',
            'surname' => 'Padi',
            'status' => 'Active',
            'user_type' => 'P',
        ]);
         DB::table('users')->insert([
            'id' => '13',
            'email' => 'pulane@gmail.com',
            'password' => bcrypt('12345678'),
            'name' => 'Pulane',
            'surname' => 'Masemola',
            'status' => 'Active',
            'user_type' => 'P',
        ]);
         DB::table('users')->insert([
            'id' => '14',
            'email' => 'dorothy@gmail.com',
            'password' => bcrypt('12345678'),
            'name' => 'Dorothy',
            'surname' => 'Daniels',
            'status' => 'Active',
            'user_type' => 'N',
        ]);
         DB::table('users')->insert([
            'id' => '15',
            'email' => 'lindile@gmail.com',
            'password' => bcrypt('12345678'),
            'name' => 'Lindile',
            'surname' => 'Hadebe',
            'status' => 'Active',
            'user_type' => 'N',
        ]);
         DB::table('users')->insert([
            'id' => '16',
            'email' => 'marcel@gmail.com',
            'password' => bcrypt('12345678'),
            'name' => 'Marcel',
            'surname' => 'Van Niekerk',
            'status' => 'Active',
            'user_type' => 'N',
        ]);
         DB::table('users')->insert([
            'id' => '17',
            'email' => 'mandla@gmail.com',
            'password' => bcrypt('12345678'),
            'name' => 'Mandla',
            'surname' => 'Khumalo',
            'status' => 'Active',
            'user_type' => 'L',
        ]);
    }
}
