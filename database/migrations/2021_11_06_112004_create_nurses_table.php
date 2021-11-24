<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nurses', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('name');
            $table->string('surname')->nullable();
            $table->string('idNo')->nullable();
            $table->string('gender')->nullable();
            $table->string('phone')->nullable();
            $table->string('addressLine1')->nullable();
            $table->string('addressLine2')->nullable();
            $table->unsignedBigInteger('suburb_id')->nullable();
            $table->unsignedBigInteger('nurse_id')->nullable();
            $table->timestamps();

            $table->foreign('suburb_id')->references('id')->on('suburbs');
            $table->foreign('nurse_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nurses');
    }
}
