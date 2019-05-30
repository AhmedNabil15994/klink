<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->double('weight');
            $table->integer('items');
            $table->double('length');
            $table->double('width');
            $table->double('height');
            $table->double('distance');
            $table->string('duration');
            $table->double('cost');
            $table->double('paid');
            $table->double('min');
            $table->string('source');
            $table->string('destination');
            $table->string('description')->nullable();
            $table->string('bill_to')->nullable();
            $table->integer('person')->nullable();
            $table->integer('time')->nullable();
            $table->integer('ship_id');
            $table->boolean('is_active');
            $table->string('payment_type')->nullable();
            $table->integer('delievered')->default(0);
            $table->integer('test');
			$table->integer('confirmed')->default(0);
            $table->string('code')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
