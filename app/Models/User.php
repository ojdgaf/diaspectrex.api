<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Address\Address;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable, HasRoles;

    protected $table = 'users';

    protected $fillable = [
        # common
        'type', 'email', 'password', 'sex', 'phone',
        'first_name', 'middle_name', 'last_name',
        'birthday', 'passport', 'residence',
        # employee
        'hired_at', 'fired_at', 'is_present', 'about',
        # doctor
        'degree',
    ];

    protected $hidden = ['password'];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * Gets all phones of user
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function phones()
    {
        return $this->morphMany(Phone::class, 'phoneable');
    }

    /**
     * Gets all patient's cards of user
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function patientCards()
    {
        return $this->hasMany(PatientCard::class);
    }

    /**
     * Gets the hospital of user if user has role employee, doctor, head doctor
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hospital()
    {
        return $this->belongsTo(Hospital::class, 'hospital_id');
    }

    /**
     * Gets the address where user lives.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function address()
    {
        return $this->belongsTo(Address::Class, 'address_id');
    }
}
