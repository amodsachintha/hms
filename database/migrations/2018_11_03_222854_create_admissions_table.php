<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admissions', function (Blueprint $table) {
            $table->string('id'); // pk
            $table->string('patient_id'); // fk
            $table->string('doctor_id'); // fk
            $table->string('bill_id'); // fk
            $table->unsignedInteger('bed_id'); // fk
            $table->dateTime('admission_date');
            $table->dateTime('discharge_date')->nullable();
            $table->string('status');
            $table->boolean('active')->default(true);
            $table->timestamps();

            $table->engine = 'InnoDB';
            $table->primary('id');
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->foreign('doctor_id')->references('id')->on('doctors');
            $table->foreign('bill_id')->references('id')->on('bills');
            $table->foreign('bed_id')->references('id')->on('beds');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admissions');
    }
}
