<?php

use Illuminate\Database\Seeder;

class countriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = database_path('factories/coutries.sql');
        DB::unprepared(file_get_contents($path));
        $this->command->info('Country table seeded!');
    }
}
