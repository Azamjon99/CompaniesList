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
         \App\Models\CompaniesList::factory(50)->create();
         \App\Models\Employee::factory(50)->create();
    }
}
