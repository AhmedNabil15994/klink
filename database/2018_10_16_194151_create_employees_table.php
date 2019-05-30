<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('name');
            $table->string('title');
            $table->date('birth_date');
            $table->string('nationality');
            $table->string('birth_place');
            $table->string('status');
            $table->string('email')->unique();
            $table->string('mobile_number')->unique();
            $table->string('card_number')->unique();
            $table->string('passport_number')->unique();
            $table->string('residency_no')->nullable();
            $table->string('residency_date')->nullable();
            $table->string('residency_type')->nullable();
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
        Schema::dropIfExists('employees');
    }
}
