<?php

namespace App\Models;

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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function patientType()
    {
        return $this->belongsTo(PatientType::class, 'patient_type_id');
    }
}
