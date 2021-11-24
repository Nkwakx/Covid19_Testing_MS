<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalAidPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_aid_plans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('medical_aid_scheme_id');
            $table->string('name');
            $table->timestamps();

            $table->foreign('medical_aid_scheme_id')->references('id')->on('medical_aid_schemes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medical_aid_plans');
    }
}
