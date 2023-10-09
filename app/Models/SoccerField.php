<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * SoccerField
 *
 * Table soccer_fields
 *
 * @property int id
 * @property string name
 * @property datetime created_at
 * @property datetime updated_at
 */
class SoccerField extends Model
{
    use HasFactory;

    public function players(): BelongsToMany {
        return $this->belongsToMany(Player::class);
    }

    public function games(): HasMany {
        return $this->hasMany(Game::class);
    }
}
