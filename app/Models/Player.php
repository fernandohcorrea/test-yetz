<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Player extends Model
{
    use HasFactory;

    public function soccer_fields(): BelongsToMany {
        return $this->belongsToMany(SoccerField::class);
    }

    public function games(): BelongsToMany {
        return $this->belongsToMany(Game::class);
    }

    public function raffle_results(): HasMany {
        return $this->hasMany(RaffleResult::class);
    }
}
