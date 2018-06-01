<?php

namespace App\Models\Location;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Country
 *
 * @package App\Observers\Location
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Location\Address[] $addresses
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Location\City[] $cities
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Location\Region[] $regions
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Location\Country onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Location\Country whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Location\Country whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Location\Country whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Location\Country whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Location\Country whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Location\Country withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Location\Country withoutTrashed()
 * @mixin \Eloquent
 */
class Country extends Model
{
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'countries';

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * The number of models to return for pagination
     *
     * @var int
     */
    protected $perPage = 50;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function regions()
    {
        return $this->hasMany(Region::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function cities()
    {
        return $this->hasManyThrough(City::class, Region::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
}
