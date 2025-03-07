<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call([
            CitiesTableSeeder::class,
            CoursesTableSeeder::class,
            GroupStatusesTableSeeder::class,
            UsersSeeder::class,
        ]);
    }
}
