<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $soccerField = DB::table('soccer_fields')->first();
        return [
            'scheduling_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'soccer_field_id' => $soccerField->id,
            'num_team_players' => 5,
        ];
    }
}
