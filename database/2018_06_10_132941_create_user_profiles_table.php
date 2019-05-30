<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('birth_place')->nullable();
            $table->string('license_no')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('home')->nullable();
            $table->string('country')->nullable();
            $table->string('company')->nullable();
            $table->string('home_phone')->nullable();
            $table->string('district')->nullable();
            $table->string('postal_code')->nullable();
            $table->text('about')->nullable();
            $table->text('info')->nullable();
            $table->text('address2')->nullable();
            $table->string('tax_no')->nullable();
            $table->string('secure_no')->nullable();
            $table->string('image')->nullable();
            $table->integer('is_admin')->default(0);
            $table->integer('see_test')->default(0);
            $table->integer('user_status_id')->nullable();
            $table->string('status')->nullable();
            $table->string('pin')->nullable();
            $table->date('expire_date')->nullable();
            $table->integer('user_id');
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
        Schema::dropIfExists('user_profiles');
    }
}
