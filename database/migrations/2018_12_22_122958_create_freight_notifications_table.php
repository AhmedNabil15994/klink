<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFreightNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('freight_notifications', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('freight_id')->unsigned();
            $table->foreign('freight_id')->references('id')->on('freights')->onDelete('cascade');

            $table->string('notification_name');
            $table->string('notification_shortcut');
            $table->string('notification_description');

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
        Schema::dropIfExists('freight_notifications');
    }
}
