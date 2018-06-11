<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
