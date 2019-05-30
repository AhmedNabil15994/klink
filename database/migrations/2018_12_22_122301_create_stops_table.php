<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stops', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('stop_description')->nullable();
            $table->string('stop_bar_code')->nullable();
            $table->decimal('weight')->nullable();
            $table->integer('duration')->nullable();
            $table->integer('stops_number')->default(0);
            $table->integer('stop_time')->default(0);
            $table->integer('stop_index')->default(0);

            $table->integer('address_id')->unsigned()->nullable();
            $table->foreign('address_id')->references('id')->on('addresses');

            $table->integer('number_id')->unsigned()->nullable();
            $table->foreign('number_id')->references('id')->on('numbers');

            $table->integer('tour_id')->unsigned()->nullable();
            $table->foreign('tour_id')->references('id')->on('tours');


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
        Schema::dropIfExists('stops');
    }
}
