<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Classifier
 * @package App\Models
 */
class Classifier extends Model
{
    /**
     * The table associated with the model
     *
     * @var string
     */
    protected $table = 'classifiers';

    /**
     *The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description'
    ];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [
        'seances'
    ];

    /**
     * Gets all seances where this classifier was used
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function seances()
    {
        return $this->hasMany(Seance::class);
    }
}
