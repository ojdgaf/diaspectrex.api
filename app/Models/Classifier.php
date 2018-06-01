<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Classifier
 *
 * @package App\Observers
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Seance[] $seances
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Classifier whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Classifier whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Classifier whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Classifier whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Classifier whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Classifier whereUpdatedAt($value)
 * @mixin \Eloquent
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
