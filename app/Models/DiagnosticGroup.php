<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiagnosticGroup extends Model
{
    protected $table = 'diagnostic_groups';

    /**
     * Gets all test related to this diagnostic group
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tests()
    {
        return $this->hasMany(Test::class);
    }

    /**
     * Gets all seances when this diagnostic group was detected
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function seances()
    {
        return $this->hasMany(Seance::class);
    }
}
