<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->increments('country_id');
            $table->char('code', 2)->comment('Two-letter country code (ISO 3166-1 alpha-2)');
            $table->string('name', 64)->comment('English country name');
            $table->string('full_name', 128)->comment('Full English country name');
            $table->char('iso3', 3)->comment('Three-letter country code (ISO 3166-1 alpha-3)');
            $table->unsignedSmallInteger('number')->comment('Three-digit country number (ISO 3166-1 numeric)');
            $table->char('continent_code', 2);
            $table->integer('display_order')->default('900');

            

            
            // $table->timestamps();
        });
        \Artisan::call('db:seed');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
    }
}
