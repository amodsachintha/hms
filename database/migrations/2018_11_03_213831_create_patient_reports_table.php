<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('patient_id');
            $table->unsignedInteger('lab_report_id');
            $table->string('description')->nullable();
            $table->string('location');
            $table->string('status');
            $table->boolean('active')->default(true);
            $table->timestamps();

            $table->engine = 'InnoDB';
            $table->foreign('lab_report_id')->references('id')->on('lab_reports');
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
        Schema::dropIfExists('patient_reports');
    }
}
