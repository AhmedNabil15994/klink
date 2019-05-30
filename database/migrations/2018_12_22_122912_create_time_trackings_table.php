<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimeTrackingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time_trackings', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('is_done_day_id')->unsigned();
            $table->foreign('is_done_day_id')->references('id')->on('is_done_days')->onDelete('cascade');

            $table->string('type');

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
        Schema::dropIfExists('time_trackings');
    }
}
