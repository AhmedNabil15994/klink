<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpTaxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp_taxes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('emp_id')->unique();
            $table->string('id_number')->unique();
            $table->string('pensions_no')->unique();
            $table->string('office_no');
            $table->string('bracket_factor');
            $table->string('child_allow');
            $table->string('denomination');
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
        Schema::dropIfExists('emp_taxes');
    }
}
