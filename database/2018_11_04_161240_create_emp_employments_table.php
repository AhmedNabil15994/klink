<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpEmploymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp_employments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('emp_id')->unique();
            $table->string('job_title');
            $table->string('entry_date');
            $table->string('first_entry_date');
            $table->string('work_time');
            $table->string('degree');
            $table->string('vocational');
            $table->string('start_training');
            $table->string('end_training');
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
        Schema::dropIfExists('emp_employments');
    }
}
