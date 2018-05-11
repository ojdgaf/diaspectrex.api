<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
