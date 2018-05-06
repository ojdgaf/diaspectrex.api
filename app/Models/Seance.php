<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seance extends Model
{
    protected $table = 'seances';

    public function examination()
    {
        return $this->belongsTo(Examination::class);
    }


}
