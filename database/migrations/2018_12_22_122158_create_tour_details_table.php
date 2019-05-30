<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_details', function (Blueprint $table) {
            $table->increments('id');
            $table->time('min_day_hour');
            $table->time('max_day_hour');
            $table->string('additional_days', 20)->nullable();
            $table->decimal('additional_price')->nullable();
            $table->decimal('tour_total_weight');
            $table->decimal('tour_total_distance');
            $table->decimal('tour_total_time');
            $table->integer('tour_total_packets_number');
            $table->decimal('tour_average_stop_time');
            $table->integer('number_of_stops');
            $table->boolean('terms_accepted');
            $table->integer('tour_id')->unsigned();
            $table->foreign('tour_id')->references('id')->on('tours')->onDelete('cascade');

            $table->integer('order_person_id')->unsigned()->nullable();
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
        Schema::dropIfExists('tour_details');
    }
}
