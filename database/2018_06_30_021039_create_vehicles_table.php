<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ship_name');
            $table->double('weight');
            $table->date('first_reg');
            $table->string('driver');
            $table->string('phone');
            $table->string('country');
            $table->string('city');
            $table->string('address');
            $table->string('postal_code');
            $table->string('img')->nullable();
            $table->string('email')->nullable();
            $table->string('model')->nullable();
            $table->string('number')->nullable();
            $table->integer('ship_id');
            $table->integer('user_id');
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('vehicles');
    }
}
