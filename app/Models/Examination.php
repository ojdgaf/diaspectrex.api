<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Examination
 *
 * @property int $id
 * @property int $patient_card_id
 * @property string|null $name
 * @property string|null $conclusion
 * @property string $started_at
 * @property string|null $ended_at
 * @property string|null $deleted_at
 * @property-read \App\Models\PatientCard $patientCard
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Seance[] $seances
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Examination onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Examination whereConclusion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Examination whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Examination whereEndedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Examination whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Examination whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Examination wherePatientCardId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Examination whereStartedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Examination withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Examination withoutTrashed()
 * @mixin \Eloquent
 */
class Examination extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'examinations';

    /**
     * 	The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'patient_card_id', 'name', 'conclusion'
    ];

    /**
     * The number of models to return for pagination.
     *
     * @var int
     */
    protected $perPage = 25;

    /**
     * Returns the seances which are related to the examination.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function seances()
    {
        return $this->hasMany(Seance::class);
    }

    /**
     * Returns patient's card which contains the examination.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function patientCard()
    {
        return $this->belongsTo(PatientCard::class, 'patient_card_id');
    }
}
