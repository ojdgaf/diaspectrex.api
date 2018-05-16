<?php

namespace App\Models\Location;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\User;
use App\Models\Hospital;

/**
 * Class Address
 *
 * @package App\Models\Location
 * @property int $id
 * @property int|null $country_id
 * @property int|null $region_id
 * @property int|null $city_id
 * @property int $street_id
 * @property string $building
 * @property int|null $flat
 * @property string|null $postal_code
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Models\Location\City|null $city
 * @property-read \App\Models\Location\Country|null $country
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Hospital[] $hospitals
 * @property-read \App\Models\Location\Region|null $region
 * @property-read \App\Models\Location\Street $street
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Location\Address onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Location\Address whereBuilding($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Location\Address whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Location\Address whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Location\Address whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Location\Address whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Location\Address whereFlat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Location\Address whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Location\Address wherePostalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Location\Address whereRegionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Location\Address whereStreetId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Location\Address whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Location\Address withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Location\Address withoutTrashed()
 * @mixin \Eloquent
 */
class Address extends Model
{
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'addresses';

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = [
        'country_id', 'region_id', 'city_id', 'street_id',
        'building', 'flat', 'postal_code',
    ];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    public $with = [
        'country', 'region', 'city', 'street'
    ];

    /**
     * The number of models to return for pagination
     *
     * @var int
     */
    protected $perPage = 50;

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
