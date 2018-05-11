<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';

    /**
     * Gets all seances where service was used
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function seances()
    {
        return $this->belongsToMany(Seance::class, 'seance_service');
    }
}
