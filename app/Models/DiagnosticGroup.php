<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\DiagnosticGroup
 *
 * @property int $id
 * @property int $patient_type_id
 * @property string $name
 * @property string $display_name
 * @property string|null $description
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Prediction[] $predictions
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\DiagnosticGroup onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DiagnosticGroup whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DiagnosticGroup whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DiagnosticGroup whereDisplayName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DiagnosticGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DiagnosticGroup whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DiagnosticGroup wherePatientTypeId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\DiagnosticGroup withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\DiagnosticGroup withoutTrashed()
 * @mixin \Eloquent
 */
class DiagnosticGroup extends Model
{
    use SoftDeletes;

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
        'name', 'display_name',
        'patient_type', 'description'
    ];

    /**
     * Returns patient type which diagnostic group related to.
     *
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
