<?php

namespace App\Models\Location;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class City
 *
 * @package App\Models\Location
 * @property int $id
 * @property int|null $region_id
 * @property string $name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Location\Address[] $addresses
 * @property-read \App\Models\Location\Country $country
 * @property-read \App\Models\Location\Region|null $region
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Location\Street[] $streets
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Location\City onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Location\City whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Location\City whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Location\City whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Location\City whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Location\City whereRegionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Location\City whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Location\City withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Location\City withoutTrashed()
 * @mixin \Eloquent
 */
class City extends Model
{
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'cities';

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = [
        'country_id', 'region_id', 'name',
    ];

    /**
     * The number of models to return for pagination
     *
     * @var int
     */
    protected $perPage = 50;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function streets()
    {
        return $this->hasMany(Street::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
}
