<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->string('id'); //HID_P0CEDHJ4A
            $table->string('f_name');
            $table->string('l_name');
            $table->string('gender');
            $table->date('dob');
            $table->string('address');
            $table->string('nic');
            $table->string('mobile1');
            $table->string('mobile2');
            $table->boolean('active')->default(true);
            $table->timestamps();

            $table->primary('id');
            $table->engine = "InnoDB";
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
