<?php

namespace App\Yetz\Repositories;

use App\Exceptions\CustomHttpException;
use App\Models\Game;
use App\Models\Raffle;
use App\Models\RaffleResult;
use App\Models\Team;
use App\Yetz\Repositories\Base\BaseRepository;

/**
 * Raffle Repository
 */
class RaffleRepository extends BaseRepository
{
    /**
     * Create raffle
     *
     * @param integer $game_id
     * @return array
     */
    public function create(int $game_id) : array
    {
        $game = $this->getGame($game_id);
        $max_team_players = $game->num_team_players * 2;

        $raffles_ids = Raffle::select('raffles.id')
            ->join('raffle_results', 'raffles.id', '=', 'raffle_results.raffle_id')
            ->where('raffle_results.game_id', $game_id)
            ->where('raffles.deleted_at', null)
            ->groupBy('raffles.id')
            ->get();

        foreach($raffles_ids as $raffle_delete) {
            $raffle_delete->delete();
        }

        list($team1, $team2) = $this->getTeams();

        $players_goalkeepers = $game->players()
            ->where('flg_goalkeeper', true)
            ->orderBy('level', 'desc')
            ->limit(2)
            ->get();

        if($players_goalkeepers->count() < 2) {
            throw new CustomHttpException('Not enough goalkeepers!', 400);
        }
        $players_goalkeepers_count = $players_goalkeepers->count();

        $goalkeeper_team1 =$players_goalkeepers->shift()->toArray();
        $goalkeeper_team2 =$players_goalkeepers->shift()->toArray();
        $team1['players'][] = $goalkeeper_team1;
        $team2['players'][] = $goalkeeper_team2;

        $players_front = $game->players()
            ->where('flg_goalkeeper', false)
            ->orderBy('level', 'desc')
            ->get();

        $players_front = $players_front->keyBy('id');

        if(($players_front->count() + $players_goalkeepers_count) < $max_team_players ) {
            throw new CustomHttpException('Not enough players!', 400);
        }

        do {
            $team1['players'][] = $players_front->shift()->toArray();
            $team2['players'][] = $players_front->shift()->toArray();
        } while ( (count($team1['players']) + count($team2['players']) ) < $max_team_players );

        $raffle = new Raffle();
        $raffle->save();

        $this->saveRaffleResults($team1, $raffle, $game);
        $this->saveRaffleResults($team2, $raffle, $game);

        return [
            'raffle_id' => $raffle->id,
            'team1' => $team1,
            'team2' => $team2
        ];
    }

    /**
     * Get game
     *
     * @param integer $game_id
     * @return Game
     */
    private function getGame(int $game_id): Game
    {
        $game = Game::find($game_id);
        if (!$game) {
            throw new CustomHttpException('Game not found!', 404);
        }
        return $game;
    }

    /**
     * Get Teams
     *
     * @return array
     */
    private function getTeams(): array
    {
        $teams_collection = Team::select()->limit(2)->get();
        $teams = $teams_collection->shuffle()->toArray();
        if($teams_collection->count() < 2) {
            throw new CustomHttpException('Not enough teams!', 400);
        }
        return $teams;
    }

    /**
     * Save Raffle Results
     *
     * @param array $team
     * @param Raffle $raffle
     * @param Game $game
     * @return void
     */
    private function saveRaffleResults(array $team, Raffle $raffle, Game $game): void
    {
        $team_players = $team['players'];
        foreach($team_players as $player) {
            $raffle_result = new RaffleResult();
            $raffle_result->game_id = $game->id;
            $raffle_result->raffle_id = $raffle->id;
            $raffle_result->team_id = $team['id'];
            $raffle_result->player_id = $player['id'];
            $raffle_result->save();
        }
    }
}
