<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');

            $table->string('street');
            $table->string('city');
            $table->string('home');
            $table->string('postal_code');
            $table->string('additional');
            $table->string('region');

            $table->integer('country_id')->unsigned();
            //$table->foreign('country_id')->references('id')->on('countries');
            $table->string('lat_lng')->unique();


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
        Schema::dropIfExists('addresses');
    }
}
