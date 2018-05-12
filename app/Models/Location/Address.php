<?php

namespace App\Models\Location;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\User;
use App\Models\Hospital;

/**
 * Class Address
 * @package App\Models\Location
 */
class Address extends Model
{
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'addresses';

    /**
     * @var array
     */
    protected $fillable = [
        'country_id', 'region_id', 'city_id', 'street_id',
        'building', 'flat', 'postal_code',
    ];

    /**
     * Gets the country pointed in address.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * Gets the region pointed in address.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    /**
     * Gets the city pointed in address.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    /**
     * Gets the street pointed in address.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function street()
    {
        return $this->belongsTo(Street::class);
    }

    /**
     * Gets all users who live by this address.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * Gets all hospitals located by this address.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hospitals()
    {
        return $this->hasMany(Hospital::class);
    }
}
