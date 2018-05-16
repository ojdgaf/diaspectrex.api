<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Examination whereConclusion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Examination whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Examination whereEndedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Examination whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Examination whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Examination wherePatientCardId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Examination whereStartedAt($value)
 * @mixin \Eloquent
 */
class Examination extends Model
{
    protected $table = 'examinations';

    /**
     * Gets all seances related to this examination
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function seances()
    {
        return $this->hasMany(Seance::class);
    }

    /**
     * Gets patient's card which contains this examination
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function patientCard()
    {
        return $this->belongsTo(PatientCard::class, 'patient_card_id');
    }
}
