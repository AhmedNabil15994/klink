<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripStopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trip_stops', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('trip_id')->unsigned();
            ;
            $table->foreign('trip_id')->references('id')->on('trips')->onDelete('cascade');

            $table->integer('stop_id')->unsigned();
            ;
            $table->foreign('stop_id')->references('id')->on('stops')->onDelete('cascade');

            $table->boolean('is_driver_delivered');
            $table->boolean('is_user_delivered');
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
        Schema::dropIfExists('trip_stops');
    }
}
