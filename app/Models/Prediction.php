<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Prediction
 *
 * @property int $id
 * @property int $seance_id
 * @property int $classifier_id
 * @property int $diagnostic_group_id
 * @property int|null $test_id
 * @property bool $is_approved
 * @property float|null $raw_value
 * @property string|null $info
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Models\Classifier $classifier
 * @property-read \App\Models\DiagnosticGroup $diagnosticGroup
 * @property-read \App\Models\Seance $seance
 * @property-read \App\Models\Test|null $test
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Prediction onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Prediction whereClassifierId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Prediction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Prediction whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Prediction whereDiagnosticGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Prediction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Prediction whereInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Prediction whereIsApproved($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Prediction whereRawValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Prediction whereSeanceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Prediction whereTestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Prediction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Prediction withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Prediction withoutTrashed()
 * @mixin \Eloquent
 */
class Prediction extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'predictions';

    /**
     * 	The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'seance_id', 'classifier_id', 'diagnostic_group_id',
        'test_id', 'is_approved', 'raw_value', 'info'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_approved' => 'boolean',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function seance()
    {
        return $this->belongsTo(Seance::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function classifier()
    {
        return $this->belongsTo(Classifier::class, 'classifier_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function diagnosticGroup()
    {
        return $this->belongsTo(DiagnosticGroup::class, 'diagnostic_group_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function test()
    {
        return $this->belongsTo(Test::class, 'test_id');
    }

    /**
     * @return bool
     */
    public function successful(): bool
    {
        return ! is_null($this->diagnosticGroup);
    }
}
