<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DiagnosticGroup
 * @package App\Models
 */
class DiagnosticGroup extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'diagnostic_groups';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'display_name', 'patient_type',
        'description'
    ];

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
