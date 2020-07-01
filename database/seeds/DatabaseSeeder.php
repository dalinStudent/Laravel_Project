<?php

use Illuminate\Database\Seeder;
use Faker\Factory as faker;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('positions')->insert([
            'name'=>'normal',   
        ]);
    }
}
 