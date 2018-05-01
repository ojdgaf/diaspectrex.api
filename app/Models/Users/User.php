<?php

namespace App\Models\Users;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Nanigans\SingleTableInheritance\SingleTableInheritanceTrait;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable, HasRoles, SingleTableInheritanceTrait;

    protected $table = 'users';

    protected static $singleTableTypeField = 'type';

    protected static $singleTableType = 'user';

    protected static $singleTableSubclasses = [Patient::class, Employee::class];

    protected $guarded = [];

    protected static $persisted = [
        'type', 'email', 'password', 'sex', 'phone',
        'first_name', 'middle_name', 'last_name',
        'birthday', 'passport', 'residence',
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
}
