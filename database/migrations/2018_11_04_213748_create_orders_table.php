<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->string('id');
            $table->unsignedInteger('user_id');
            $table->dateTime('date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('reciept_no');
            $table->string('payment_method')->default('CASH');
            $table->double('taxes')->default(0);
            $table->double('total');
            $table->timestamps();

            $table->engine = 'InnoDB';
            $table->primary('id');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
