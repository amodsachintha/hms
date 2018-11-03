<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('eid');
            $table->string('f_name');
            $table->string('l_name');
            $table->string('email')->unique();
            $table->string('mobile');
            $table->string('gender');
            $table->string('image');
            $table->string('address');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedInteger('role_id')->default(1);
            $table->boolean('active')->default(false);
            $table->unsignedInteger('department_id');
            $table->rememberToken();
            $table->timestamps();

            $table->index('eid');
            $table->engine = "InnoDB";

        });

        Schema::table('users', function ($table) {
            $table->foreign('role_id')->references('id')->on('roles');
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
        Schema::dropIfExists('users');
    }
}
