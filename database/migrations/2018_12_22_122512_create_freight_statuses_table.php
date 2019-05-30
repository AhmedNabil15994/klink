<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFreightStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('freight_statuses', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('general_status_id')->unsigned();
            $table->foreign('general_status_id')->references('id')->on('freight_general_statuses');

            $table->integer('freight_details_id')->unsigned();
            $table->foreign('freight_details_id')->references('id')->on('freights_details')->onDelete('cascade');

            $table->string('incase_of_non_status');

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
        Schema::dropIfExists('freight_statuses');
    }
}
