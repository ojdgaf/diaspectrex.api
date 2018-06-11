<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\PatientType
 *
 * @property int $id
 * @property string $name
 * @property string $display_name
 * @property string|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\PatientType onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PatientType whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PatientType whereDisplayName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PatientType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PatientType whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\PatientType withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\PatientType withoutTrashed()
 * @mixin \Eloquent
 */
class PatientType extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'patient_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'display_name'
    ];
}
