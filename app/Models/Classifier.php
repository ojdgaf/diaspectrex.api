<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Classifier
 *
 * @property int $id
 * @property int $patient_type_id
 * @property string $name
 * @property string $display_name
 * @property string|null $description
 * @property string|null $deleted_at
 * @property-read \App\Models\PatientType $patientType
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Prediction[] $predictions
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Classifier manual()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Classifier automated()
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Classifier onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Classifier whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Classifier whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Classifier whereDisplayName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Classifier whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Classifier whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Classifier wherePatientTypeId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Classifier withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Classifier withoutTrashed()
 * @mixin \Eloquent
 */
class Classifier extends Model
{
    use SoftDeletes;

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
        'patient_type_id', 'name', 'display_name', 'description'
    ];

    /**
     * @return bool
     */
    public function isManual()
    {
        return $this->name === 'doctor';
    }

    /**
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopeManual(Builder $query)
    {
        return $query->where('classifiers.name', 'doctor');
    }

    /**
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopeAutomated(Builder $query)
    {
        return $query->where('classifiers.name', '!=', 'doctor');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function patientType()
    {
        return $this->belongsTo(PatientType::class, 'patient_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function predictions()
    {
        return $this->hasMany(Prediction::class);
    }
}
