<?php

namespace App\Models\Diagnosing;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $table = 'tests';

    protected $guarded = [];

    public function card()
    {
        return $this->belongsTo(Card::class, 'diagnostic_card_id');
    }
}
