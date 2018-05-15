<?php

namespace App\Models\Location;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Street
 * @package App\Models\Location
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
