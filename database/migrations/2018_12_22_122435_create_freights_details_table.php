<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFreightsDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('freights_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('freight_id')->unsigned();
            $table->foreign('freight_id')->references('id')->on('freights')->onDelete('cascade');

            $table->integer('freight_cat_id')->unsigned()->nullable();
            $table->foreign('freight_cat_id')->references('id')->on('freight_cats')->onDelete('set null');

            $table->decimal('width');
            $table->decimal('length');
            $table->decimal('height');
            $table->decimal('weight');
            $table->double('price')->nullable();
            $table->string('type');
            $table->integer('pick_period')->nullable();
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
        Schema::dropIfExists('freights_details');
    }
}
