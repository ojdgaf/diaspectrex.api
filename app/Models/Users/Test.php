<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $table = 'tests';

    protected $guarded = [];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'user_id');
    }
}
