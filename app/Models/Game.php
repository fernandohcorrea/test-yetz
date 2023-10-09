<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Game
 *
 * @property int id
 * @property int soccer_field_id
 * @property datetime scheduling_at
 * @property int num_team_players
 * @property timestamp created_at
 * @property timestamp updated_at
 */
class Game extends Model
{
    use HasFactory;

    public function soccer_field(): BelongsTo
    {
        return $this->belongsTo(SoccerField::class);
    }

    public function players(): BelongsToMany {
        return $this->belongsToMany(Player::class);
    }

    public function raffle_results(): HasMany {
        return $this->hasMany(RaffleResult::class);
    }
}
