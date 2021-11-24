<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_logs', function (Blueprint $table) {
            $table->id();
            $table->date('log_date');
            $table->string('log_time');
            $table->string('status');
            $table->unsignedBigInteger('nurse_id')->nullable();
            $table->unsignedBigInteger('request_id')->nullable();
            $table->timestamps();

            //$table->foreign('log_time')->references('id')->on('time_slots')->OnDelete('cascade');
            $table->foreign('nurse_id')->references('id')->on('users')->OnDelete('cascade');
            $table->foreign('request_id')->references('id')->on('test_requests')->OnDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('request_logs');
    }
}
