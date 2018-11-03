<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->string('id');
            $table->string('patient_id');
            $table->double('vat');
            $table->double('taxes');
            $table->double('discount');
            $table->double('total');
            $table->string('payment_method')->default('CASH');
            $table->string('card_cheque_no')->default('NULL');
            $table->string('reciept_no');
            $table->string('status');
            $table->boolean('paid')->default(false);
            $table->boolean('active')->default(true);
            $table->timestamps();

            $table->engine = 'InnoDB';
            $table->primary('id');
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
        Schema::dropIfExists('bills');
    }
}
