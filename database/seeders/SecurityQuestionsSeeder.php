<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SecurityQuestions;

class SecurityQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SecurityQuestions::create(['question' => 'What was the street name you lived in as a child?']);
        SecurityQuestions::create(['question' => 'What primary school did you attend?']);
        SecurityQuestions::create(['question' => 'In what city or town was your first job?']);
        SecurityQuestions::create(['question' => 'What was the make and model of your first car?']);
        SecurityQuestions::create(['question' => 'What is your oldest cousin\'s first and last name?']);
    }
}
