<?php

namespace App\Models\Diagnosing;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Card extends Model
{
    protected $table = 'diagnostic_cards';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class, 'diagnostic_group_id');
    }

    public function tests()
    {
        return $this->hasMany(Test::class, 'diagnostic_card_id');
    }
}
