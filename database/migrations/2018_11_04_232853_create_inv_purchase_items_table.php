<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvPurchaseItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_purchase_items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('item_id');
            $table->unsignedInteger('purchase_id');
            $table->double('quantity');
            $table->double('unit_price');
            $table->double('price');
            $table->timestamps();

            $table->engine = 'InnoDB';
            $table->foreign('item_id')->references('id')->on('items');
            $table->foreign('purchase_id')->references('id')->on('inv_purchases');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inv_purchase_items');
    }
}
