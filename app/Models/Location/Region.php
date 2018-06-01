<?php

namespace App\Models\Location;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Region
 *
 * @package App\Observers\Location
 * @property int $id
 * @property int|null $country_id
 * @property string $name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Location\Address[] $addresses
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Location\City[] $cities
 * @property-read \App\Models\Location\Country|null $country
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Location\Region onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Location\Region whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Location\Region whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Location\Region whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Location\Region whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Location\Region whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Location\Region whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Location\Region withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Location\Region withoutTrashed()
 * @mixin \Eloquent
 */
class Region extends Model
{
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'regions';

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = [
        'country_id', 'name'
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cities()
    {
        return $this->hasMany(City::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
}
