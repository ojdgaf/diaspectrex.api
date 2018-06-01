<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Location\Address;

/**
 * Class Hospital
 *
 * @package App\Observers
 * @property int $id
 * @property int|null $address_id
 * @property string $name
 * @property string|null $description
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Models\Location\Address|null $address
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $employees
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Phone[] $phones
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Hospital onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Hospital whereAddressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Hospital whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Hospital whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Hospital whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Hospital whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Hospital whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Hospital whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Hospital withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Hospital withoutTrashed()
 * @mixin \Eloquent
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
