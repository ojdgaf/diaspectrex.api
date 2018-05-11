<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
