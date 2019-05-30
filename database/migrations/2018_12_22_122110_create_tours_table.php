<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->increments('id');
            $table->string('notes');
            $table->string('tour_number');
            $table->string('tour_name');
            $table->string('tour_type');
            $table->double('price');
            $table->integer('is_active');
            $table->integer('stops_number')->nullable();

            $table->integer('profile_id_company')->unsigned()->nullable();
            $table->foreign('profile_id_company')->references('id')->on('user_profiles');

            $table->integer('ship_id')->unsigned();
            $table->foreign('ship_id')->references('id')->on('shippings');
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
        Schema::dropIfExists('tours');
    }
}
