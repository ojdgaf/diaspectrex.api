<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $table = 'tests';

    /**
     * Gets the diagnostic group which the test related to
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function diagnosticGroup(){
        return $this->belongsTo(DiagnosticGroup::class, 'diagnostic_group_id');
    }
}
