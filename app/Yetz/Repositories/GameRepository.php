<?php

namespace App\Yetz\Repositories;

use App\Exceptions\CustomHttpException;
use App\Models\Game;
use App\Yetz\Repositories\Base\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Support\Facades\Log;

/**
 * Class Game Repository
 */
class GameRepository extends BaseRepository
{
    /**
     * Find all games
     *
     * @return Collection
     */
    public function all(): ?Collection {
        return Game::all();
    }

    /**
     * Create game
     *
     * @param array $data
     * @return Game|null
     */
    public function create(array $data): ?Game {
        $game = new Game();
        $game->soccer_field_id = $data['soccer_field_id'];
        $game->scheduling_at = $data['scheduling_at'];
        $game->num_team_players = $data['num_team_players'];
        $game->save();
        return $game;
    }

    /**
     * Confirm Players
     *
     * @param integer $game_id
     * @param array $data Players ids
     * @return boolean
     */
    public function confirmPlayers(int $game_id, array $data): bool
    {
        $result = false;
        $game = Game::find($game_id);

        if (!$game) {
            throw new CustomHttpException('Game not found!', 404);
        }

        if (count($data['players_ids']) == 0) {
            throw new CustomHttpException('Invalid players data', 400);
        }

        foreach ($data['players_ids'] as $player_id) {
            try {
                $game->players()->attach($player_id);
                $result = true;
            } catch (UniqueConstraintViolationException $e) {
                Log::warning($e->getMessage());
            } catch (\Exception $e) {
                Log::error($e->getMessage());
                throw new CustomHttpException('Invalid players data', 400, $e);
            }
        }

        return $result;
    }
}
