<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_offers', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('company_profile_id')->unsigned();
            $table->foreign('company_profile_id')->references('id')->on('user_profiles')->onDelete('cascade');

            $table->integer('driver_profile_id')->unsigned();
            $table->foreign('driver_profile_id')->references('id')->on('user_profiles');

            $table->integer('vehicle_id')->unsigned();
            $table->foreign('vehicle_id')->references('id')->on('vehicles');

            $table->integer('tour_id')->unsigned();
            $table->foreign('tour_id')->references('id')->on('tours')->onDelete('cascade');

            $table->integer('bill_id')->unsigned()->nullable();
            $table->foreign('bill_id')->references('id')->on('bills');

            $table->integer('customer_accepted');
            $table->double('company_offer');
            $table->double('standard_tour_price');


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
        Schema::dropIfExists('tour_offers');
    }
}
