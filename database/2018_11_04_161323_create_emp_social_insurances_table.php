<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpSocialInsurancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp_social_insurances', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('emp_id')->unique();
            $table->string('social_law');
            $table->string('health_insurance_company');
            $table->string('parenthood');
            $table->string('kv');
            $table->string('kv2');
            $table->string('rv');
            $table->string('av');
            $table->string('pv');
            $table->string('uv');
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
        Schema::dropIfExists('emp_social_insurances');
    }
}
