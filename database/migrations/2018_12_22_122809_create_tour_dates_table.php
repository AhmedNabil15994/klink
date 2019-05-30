<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_dates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tour_id')->unsigned();
            $table->foreign('tour_id')->references('id')->on('tours')->onDelete('cascade');

            $table->date('tour_start_date');
            $table->date('tour_finish_date')->nullable();
            $table->time('tour_start_time');
            $table->time('tour_finish_time');
            $table->date('account_speak_day')->nullable();
            $table->date('cancellation_speak_day')->nullable();
            $table->date('payment_speak_day')->nullable();
            $table->date('test_speak_day')->nullable();
            $table->text('days');//[0,1,2,3]

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
        Schema::dropIfExists('tour_dates');
    }
}
