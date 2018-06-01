<?php

namespace App\Models\Location;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Street
 *
 * @package App\Observers\Location
 * @property int $id
 * @property int|null $city_id
 * @property string $name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Location\Address[] $addresses
 * @property-read \App\Models\Location\City|null $city
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Location\Street onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Location\Street whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Location\Street whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Location\Street whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Location\Street whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Location\Street whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Location\Street whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Location\Street withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Location\Street withoutTrashed()
 * @mixin \Eloquent
 */
class Street extends Model
{
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'streets';

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = ['city_id', 'name'];

    /**
     * The number of models to return for pagination
     *
     * @var int
     */
    protected $perPage = 50;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
}
