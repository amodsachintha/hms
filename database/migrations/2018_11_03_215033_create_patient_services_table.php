<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('patient_id');
            $table->unsignedInteger('service_id');
            $table->string('status');
            $table->boolean('active')->default(true);
            $table->timestamps();

            $table->engine = 'InnoDB';
            $table->foreign('service_id')->references('id')->on('services');
            $table->foreign('patient_id')->references('id')->on('patients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient_services');
    }
}
