<?php

namespace Database\Seeders;

use App\Models\Player;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Player::factory(17)->create();

        $soccer_field = DB::table('soccer_fields')->first();
        $game = DB::table('games')->first();
        $players = DB::table('players')->get();

        foreach ($players as $player) {
            DB::table('soccer_field_player')->insert([
                'soccer_field_id' => $soccer_field->id,
                'player_id' => $player->id,
            ]);
        }
    }
}
