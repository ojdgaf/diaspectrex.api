<?php

namespace App\Models\Users;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;

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

    public function diagnosticCard()
    {
        return $this->hasOne(Card::class, 'user_id');
    }
}
