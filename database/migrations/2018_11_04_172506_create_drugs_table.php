<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrugsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drugs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('chemical_id');
            $table->unsignedInteger('package_id');
            $table->string('unit_type'); //tablets pills etc.
            $table->integer('qoh'); //quantity on hand
            $table->date('best_before');
            $table->integer('reorder_point');
            $table->double('unit_price');
            $table->boolean('active');
            $table->timestamps();

            $table->engine = 'InnoDB';
            $table->foreign('chemical_id')->references('id')->on('chemicals');
            $table->foreign('package_id')->references('id')->on('packages');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drugs');
    }
}
