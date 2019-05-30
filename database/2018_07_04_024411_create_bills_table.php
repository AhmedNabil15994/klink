<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('number');
            $table->string('order_num');
            $table->string('customerName');
            $table->decimal('order_cost');
            $table->decimal('tax');
            $table->decimal('fees')->default(0);
            $table->decimal('sub_total')->default(0);
            $table->decimal('discount')->default(0);
            $table->decimal('total')->default(0);
            $table->text('note');
            $table->date('invionce_date');
            $table->string('payment_type');
            $table->timestamps();
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
