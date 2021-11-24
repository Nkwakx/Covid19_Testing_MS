<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_requests', function (Blueprint $table) {
            $table->id();
            $table->string('addressLine1')->nullable();
            $table->string('addressLine2')->nullable();
            $table->unsignedBigInteger('suburb_id')->nullable();
            $table->integer('number_of_patient');
            $table->unsignedBigInteger('requestor_id');
            $table->integer('test_Subject_Id');
            $table->string('status')->default('New');
            $table->timestamps();

            $table->foreign('suburb_id')->references('id')->on('suburbs')->onDelete('cascade');
            $table->foreign('requestor_id')->references('id')->on('users')->onDelete('cascade');
            //$table->foreign('test_Subject_Id')->references('id')->on('dependents')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('test_requests');
    }
}
