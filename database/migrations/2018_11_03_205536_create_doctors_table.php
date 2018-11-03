<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->string('id'); //DID_0004CX
            $table->string('f_name');
            $table->string('l_name');
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->unsignedInteger('specialization_id');
            $table->date('dob');
            $table->string('address');
            $table->string('mobile');
            $table->string('work')->nullable();
            $table->unsignedInteger('department_id');
            $table->string('qualifications')->nullable();
            $table->string('gender');
            $table->string('nic');
            $table->double('fee')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();

            $table->engine='InnoDB';
            $table->primary('id');

            $table->foreign('specialization_id')->references('id')->on('specializations');
            $table->foreign('department_id')->references('id')->on('departments');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctors');
    }
}
