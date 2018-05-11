<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classifier extends Model
{
    protected $table = 'classifiers';

    /**
     * Gets all seances where this classifier was used
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function seances()
    {
        return $this->hasMany(Seance::class);
    }
}
