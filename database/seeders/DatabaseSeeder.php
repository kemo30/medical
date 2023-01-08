<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(1000)->create();
        \App\Models\service::factory(30)->create();
        \App\Models\doctor::factory(200)->create();
        \App\Models\Reservation::factory(1000)->create();
        \App\Models\doctor_rating::factory(500)->create();
        
    }
}
