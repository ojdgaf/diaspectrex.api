<?php

namespace App\Models\Diagnosing;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'diagnostic_groups';

    protected $guarded = [];

    public function cards()
    {
        return $this->hasMany(Card::class, 'diagnostic_group_id');
    }
}
