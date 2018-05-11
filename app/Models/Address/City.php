<?php

namespace App\Models\Address;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id');
    }

    public function streets()
    {
        return $this->hasMany(Street::class);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
}
