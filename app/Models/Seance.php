<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Seance
 *
 * @property int $id
 * @property int $examination_id
 * @property int|null $doctor_id
 * @property string|null $complaints
 * @property string|null $diagnosis
 * @property string|null $notes
 * @property string $started_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $ended_at
 * @property string|null $deleted_at
 * @property-read \App\Models\User|null $doctor
 * @property-read \App\Models\Examination $examination
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Prediction[] $predictions
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Service[] $services
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Seance onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Seance whereComplaints($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Seance whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Seance whereDiagnosis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Seance whereDoctorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Seance whereEndedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Seance whereExaminationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Seance whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Seance whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Seance whereStartedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Seance whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Seance withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Seance withoutTrashed()
 * @mixin \Eloquent
 */
class Seance extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model
     *
     * @var string
     */
    protected $table = 'seances';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'examination_id', 'doctor_id',
        'complaints', 'diagnosis', 'notes',
        'started_at', 'ended_at'
    ];

    /**
     * Gets examination which contains seance
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function examination()
    {
        return $this->belongsTo(Examination::class);
    }

    /**
     * Gets the user which doctor role who perform seance
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function predictions()
    {
        return $this->hasMany(Prediction::class, 'seance_id');
    }

    /**
     * Gets all services used in seance
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function services()
    {
        return $this->belongsToMany(Service::class, 'seance_service');
    }
}
