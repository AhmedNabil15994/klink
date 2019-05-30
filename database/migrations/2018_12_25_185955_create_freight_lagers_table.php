<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFreightLagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('freight_lagers', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('lager_id')->unsigned();
            $table->foreign('lager_id')->references('id')->on('lagers')->onDelete('cascade');

            $table->integer('stop_freight_id')->unsigned();
            $table->foreign('stop_freight_id')->references('id')->on('stops_freights')->onDelete('cascade');

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
        Schema::dropIfExists('freight_lagers');
    }
}
