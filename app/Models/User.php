<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use \App\Notifications\ResetPasswordNotification as CustomResetPasswordNotification;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Models\Location\Address;

/**
 * Class User
 *
 * @package App\Models
 * @property int $id
 * @property string $email
 * @property string $first_name
 * @property string|null $middle_name
 * @property string $last_name
 * @property string $sex
 * @property string $birthday
 * @property int|null $address_id
 * @property int|null $hospital_id
 * @property string|null $passport
 * @property int|null $is_present
 * @property string|null $about
 * @property string|null $hired_at
 * @property string|null $fired_at
 * @property string|null $degree
 * @property string $password
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Models\Location\Address|null $address
 * @property-read \App\Models\Hospital|null $hospital
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PatientCard[] $patientCards
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Phone[] $phones
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User role($roles)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereAbout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereAddressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereBirthday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereDegree($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereFiredAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereHiredAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereHospitalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereIsPresent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereMiddleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User wherePassport($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereSex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable implements JWTSubject
{
    use Notifiable, HasRoles, CanResetPassword;

    /**
     * @var string
     */
    protected $guard_name = 'api';

    /**
     * @var string
     */
    protected $table = 'users';

    /**
     * @var array
     */
    protected $fillable = [
        # common
        'email', 'password', 'sex', 'phone',
        'first_name', 'middle_name', 'last_name',
        'birthday', 'passport', 'residence',
        # employee
        'hired_at', 'fired_at', 'is_present', 'about',
        # doctor
        'degree',
    ];

    /**
     * @var array
     */
    protected $hidden = [
        'password', 'created_at', 'updated_at', 'deleted_at',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'birthday', 'hired_at', 'fired_at',
        'created_at', 'updated_at', 'deleted_at',
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

    /**
     * Send the password reset notification.
     *
     * @param  string $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomResetPasswordNotification($token));
    }

    /**
     * @return $this
     */
    public function withRoleNames()
    {
        $this->roleNames = $this->getRoleNames();

        return $this;
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
     * Gets all patient's cards of user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function patientCards()
    {
        return $this->hasMany(PatientCard::class);
    }

    /**
     * Gets the hospital of user if user has role employee, doctor, head doctor.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hospital()
    {
        return $this->belongsTo(Hospital::class, 'hospital_id');
    }

    /**
     * Gets the address where user lives.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function address()
    {
        return $this->belongsTo(Address::Class, 'address_id');
    }
}
