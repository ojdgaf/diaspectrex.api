<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Observers\Phone
 *
 * @property int $id
 * @property string $phoneable_type
 * @property int $phoneable_id
 * @property string $phone
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $phoneable
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Phone whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Phone whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Phone whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Phone wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Phone wherePhoneableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Phone wherePhoneableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Phone whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Phone extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'phones';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'phoneable_type', 'phoneable_id', 'number'
    ];

    /**
     * Gets the entity which has a phone
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function phoneable()
    {
        return $this->morphTo();
    }
}
