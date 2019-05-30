<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllTaxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_taxes', function (Blueprint $table) {
            $table->increments('id');

            $table->string('tax_id');
            $table->string('tax_ministry');
            $table->string('tax_number');
            $table->string('ust_id');
            $table->integer('tax_class');
            
            $table->integer('profile_id')->unsigned();
            $table->foreign('profile_id')->references('id')->on('user_profiles')->onDelete('cascade');

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
        Schema::dropIfExists('all_taxes');
    }
}
