<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderSendReceivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_send_receives', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id');
            $table->integer('sender_id');
            $table->integer('receiver_id');
            $table->integer('other_billing_id');
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
        Schema::dropIfExists('order_send_receives');
    }
}
