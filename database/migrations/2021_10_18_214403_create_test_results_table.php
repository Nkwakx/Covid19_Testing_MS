<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_results', function (Blueprint $table) {
            $table->id();
            $table->string('barcode')->nullable();
            $table->string('test_result')->nullable();
            $table->double('temperature');
            $table->string('blood_pressure');
            $table->integer('oxygen_levels');
            $table->unsignedBigInteger('request_id')->nullable();
            $table->unsignedBigInteger('nurse_id')->nullable();
            $table->unsignedBigInteger('lab_user_id')->nullable();
            $table->integer('patient_id')->nullable();
            $table->timestamps();

            $table->foreign('request_id')->references('id')->on('test_requests')->OnDelete('cascade');
            $table->foreign('nurse_id')->references('id')->on('users')->OnDelete('cascade');
            $table->foreign('lab_user_id')->references('id')->on('users')->OnDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('test_results');
    }
}
