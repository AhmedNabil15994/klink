<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpPapersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp_papers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('emp_id')->unique();
            $table->integer('emp_contact');
            $table->integer('tax_deduction');
            $table->integer('sv_id');
            $table->integer('insurance_company');
            $table->integer('private_insurance');
            $table->integer('proof_parent');
            $table->integer('pensions');
            $table->integer('painter');
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
        Schema::dropIfExists('emp_papers');
    }
}
