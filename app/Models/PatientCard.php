<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientCard extends Model
{
    protected $table = 'patient_cards';

    /**
     * Gets patient who is owner of card
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }

    /**
     * Gets all examinations which card contains
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function examinations()
    {
        return $this->hasMany(Examination::class);
    }
}
