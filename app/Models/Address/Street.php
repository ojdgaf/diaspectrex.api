<?php

namespace App\Models\Address;

use Illuminate\Database\Eloquent\Model;

class Street extends Model
{
    protected $table = 'streets';

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
}
