<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Seance
 *
 * @property int $id
 * @property int $examination_id
 * @property int|null $doctor_id
 * @property int|null $test_id
 * @property int|null $classifier_id
 * @property int|null $diagnostic_group_id
 * @property int|null $is_approved
 * @property string|null $complains
 * @property string|null $diagnosis
 * @property string|null $notes
 * @property string $started_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $ended_at
 * @property string|null $deleted_at
 * @property-read \App\Models\Classifier|null $classifier
 * @property-read \App\Models\DiagnosticGroup|null $diagnosticGroup
 * @property-read \App\Models\User|null $doctor
 * @property-read \App\Models\Examination $examination
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Service[] $services
 * @property-read \App\Models\Test|null $test
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Seance whereClassifierId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Seance whereComplains($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Seance whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Seance whereDiagnosis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Seance whereDiagnosticGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Seance whereDoctorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Seance whereEndedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Seance whereExaminationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Seance whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Seance whereIsApproved($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Seance whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Seance whereStartedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Seance whereTestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Seance whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Seance extends Model
{
    protected $table = 'seances';

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
     * Gets the test which is related to seance. Can be empty
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function test()
    {
        return $this->belongsTo(Test::class, 'test_id');
    }

    /**
     * Get the classifier used during seance. Can be empty
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function classifier()
    {
        return $this->belongsTo(Classifier::class, 'classifier_id');
    }

    /**
     * Gets the diagnostic group detected during seance. Can be empty
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function diagnosticGroup()
    {
        return $this->belongsTo(DiagnosticGroup::class, 'diagnostic_group_id');
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
