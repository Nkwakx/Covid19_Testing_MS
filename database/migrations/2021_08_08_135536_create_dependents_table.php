<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDependentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dependents', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->string('idNo')->nullable();
            $table->string('phone')->nullable();
            $table->string('gender')->nullable();
            $table->string('email_address')->nullable();
            $table->string('addressLine1')->nullable();
            $table->string('addressLine2')->nullable();
            $table->unsignedBigInteger('suburb_id')->nullable();
            $table->string('same_address')->nullable();
            $table->string('med_aid_number')->nullable();
            $table->string('med_aid_YN')->nullable();
            $table->unsignedBigInteger('med_aid_plan_id')->nullable();
            $table->unsignedBigInteger('main_member_id')->nullable();
            $table->timestamps();

            $table->foreign('med_aid_plan_id')->references('id')->on('medical_aid_plans');
            $table->foreign('suburb_id')->references('id')->on('suburbs');
            $table->foreign('main_member_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dependents');
    }
}
