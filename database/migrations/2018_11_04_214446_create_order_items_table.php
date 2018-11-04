<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_id');
            $table->unsignedInteger('drug_id');
            $table->integer('quantity');
            $table->double('unit_price');
            $table->double('sub_total');
            $table->timestamps();

            $table->engine = 'InnoDB';
            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('drug_id')->references('id')->on('drugs');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
}
