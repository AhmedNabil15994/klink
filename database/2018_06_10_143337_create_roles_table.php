<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('display_name');
            $table->string('description');
            $table->timestamps();
        });

        $data = [
            [
                'name' => 'user',
                'display_name' => 'User / Customer Access',
                'description'=>'users / customers who want to manage their finances',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'salesman',
                'display_name' => 'Salesman',
                'description'=>'An employee who only wants to see how many advertisers and customers he recruited',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'advertiser',
                'display_name' => 'Advertiser',
                'description'=>'A company which is only able to see how many customers it recruited',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'payment_manager',
                'display_name' => 'Payment Manager',
                'description'=>'Managing payments',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'account-manager',
                'display_name' => 'Account Manager',
                'description'=>'Account Manager',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'User-Settings-Manager',
                'display_name' => 'User-Settings-Manager',
                'description'=>'User-Settings-Manager',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ];

        foreach ($data as $key => $value) {
           DB::table('roles')->insert($value);
        };

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
