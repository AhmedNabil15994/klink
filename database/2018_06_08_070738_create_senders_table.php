<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSendersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('senders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('country');
            $table->integer('postal_code');
            $table->string('town');
            $table->string('street');
            $table->string('home');
            $table->string('gender');
            $table->string('nick_name');
            $table->string('first_name');
            $table->string('company')->nullable();
            $table->string('phone');
            $table->string('email');
            $table->integer('order_id');
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
        Schema::dropIfExists('senders');
    }
}
