<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('manufacturer_id');
            $table->string('upc');
            $table->string('package_type');
            $table->integer('package_quantity')->default(1);
            $table->string('brand_name');
            $table->double('discount')->default(0);
            $table->double('price');
            $table->timestamps();

            $table->engine='InnoDB';
            $table->foreign('manufacturer_id')->references('id')->on('manufacturers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packages');
    }
}
