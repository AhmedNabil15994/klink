<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adresses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('street');
            $table->string('home', 20);
            $table->string('addition', 50);
            $table->string('postal_code', 10);
            $table->string('city', 30);
            $table->string('region', 30);
            $table->string('lat_lng', 75);
            $table->string('country_code', 3);
            // $table->foreign('country_id')->references('countries')->on('code');
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
        Schema::dropIfExists('adresses');
    }
}
