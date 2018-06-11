<?php

namespace App\Models;

use App\Scopes\ActivePatientCardScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\PatientCard
 *
 * @property int $id
 * @property string|null $code
 * @property int $patient_id
 * @property int $patient_type_id
 * @property string|null $allergies
 * @property string|null $diseases
 * @property bool $is_active
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Examination[] $examinations
 * @property-read \App\Models\User $patient
 * @property-read \App\Models\PatientType $patientType
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\PatientCard onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PatientCard whereAllergies($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PatientCard whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PatientCard whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PatientCard whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PatientCard whereDiseases($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PatientCard whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PatientCard whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PatientCard wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PatientCard wherePatientTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PatientCard whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\PatientCard withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\PatientCard withoutTrashed()
 * @mixin \Eloquent
 */
class PatientCard extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'patient_cards';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'patient_id', 'patient_type_id',
        'allergies', 'diseases', 'is_active'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * The number of models to return for pagination.
     *
     * @var int
     */
    protected $perPage = 50;

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new ActivePatientCardScope);
    }

    /**
     * Return the patient(user) who is owner of card.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function patientType()
    {
        return $this->belongsTo(PatientType::class, 'patient_type_id');
    }

    /**
     * Return the examinations which is contained in the card
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function examinations()
    {
        return $this->hasMany(Examination::class, 'patient_card_id');
    }
}
