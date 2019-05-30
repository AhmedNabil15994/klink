<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shippings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('pay_load_max');
            $table->double('palletspaces');
            $table->double('length');
            $table->double('width');
            $table->double('height');
            $table->string('img');
            $table->boolean('is_active');
            $table->double('discount')->default(0);
            $table->integer('min_packets')->nullable();
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
        Schema::dropIfExists('shippings');
    }
}
