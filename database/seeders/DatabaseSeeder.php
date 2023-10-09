<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            SoccerFieldSeeder::class,
            GameSeeder::class,
            PlayerSeeder::class,
            TeamSeeder::class,
        ]);
    }
}
