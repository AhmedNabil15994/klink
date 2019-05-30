<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStopsFreightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stops_freights', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('number_of_packets');
            $table->string('notes');

            $table->integer('freight_id')->unsigned();
            $table->foreign('freight_id')->references('id')->on('freights');
            $table->integer('stop_id')->unsigned();
            $table->foreign('stop_id')->references('id')->on('stops')->onDelete('cascade');
            $table->integer('order_person_id')->unsigned();
            $table->foreign('order_person_id')->references('id')->on('order_persons');

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
        Schema::dropIfExists('stops_freights');
    }
}
