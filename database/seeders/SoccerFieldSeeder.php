<?php

namespace Database\Seeders;

use App\Models\SoccerField;
use Illuminate\Database\Seeder;

class SoccerFieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SoccerField::factory(1)->create();
    }
}
