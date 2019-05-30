<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingSpecsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_specs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('min_load_time');
            $table->integer('max_load_time');
            $table->double('cost_per_unit');
            $table->integer('min_person');
            $table->integer('max_person');
            $table->double('cost_per_person');
            $table->integer('ship_id');
            $table->integer('is_active')->default(1);
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
        Schema::dropIfExists('shipping_specs');
    }
}
