<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Location\Address;

/**
 * Class Hospital
 * @package App\Models
 */
class Hospital extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model
     *
     * @var string
     */
    protected $table = 'hospitals';

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = [
        'address_id', 'name', 'description'
    ];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    public $with = ['address'];

    /**
     * Gets address where hospital is located.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    /**
     * Gets all hospital's phones.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function phones()
    {
        return $this->morphMany(Phone::class, 'phoneable');
    }

    /**
     * Gets all employees who work in hospital.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employees()
    {
        return $this->hasMany(User::class);
    }

}
