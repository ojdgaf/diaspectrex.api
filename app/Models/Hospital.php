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
     * @var string
     */
    protected $table = 'hospitals';

    /**
     * @var array
     */
    protected $fillable = [
        'address_id', 'name', 'description'
    ];

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

    public function headDoctors(){
        $this->employees()->roles('head doctor')->get();
    }

    public function doctors(){
        $this->employees()->roles('doctor')->get();
    }
}
