<?php

namespace App\Yetz\Repositories;

use App\Models\SoccerField;
use App\Yetz\Repositories\Base\BaseRepository;
use Illuminate\Database\Eloquent\Collection;


/**
 * Class Soccer Field Repository
 */
class SoccerFieldRepository extends BaseRepository
{
    /**
     * Find all soccer fields
     *
     * @return Collection
     */
    public function all(): ?Collection {
        return SoccerField::all();
    }
}
