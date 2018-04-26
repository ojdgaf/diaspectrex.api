<?php

namespace App\Models\Users;

use App\Models\Diagnosing\Card;

class Patient extends User
{
    protected $guarded = [];

    protected static $singleTableType = 'patient';

    protected static $persisted = [];

    public function diagnosticCard()
    {
        return $this->hasOne(Card::class, 'user_id');
    }
}