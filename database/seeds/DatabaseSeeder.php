<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(continentTableSeeder::class);
        $this->call(countriesTableSeeder::class);
    }
}
