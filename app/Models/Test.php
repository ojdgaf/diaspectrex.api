<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

/**
 * App\Models\Test
 *
 * @property int $id
 * @property string|null $file_path
 * @property float $d2
 * @property float $d3
 * @property float $d4
 * @property float $d5
 * @property float $d6
 * @property float $d8
 * @property float $d11
 * @property float $d15
 * @property float $d20
 * @property float $d26
 * @property float $d36
 * @property float $d40
 * @property float $d65
 * @property float $d85
 * @property float $d120
 * @property float $d150
 * @property float $d210
 * @property float $d290
 * @property float $d300
 * @property float $d520
 * @property float $d700
 * @property float $d950
 * @property float $d1300
 * @property float $d1700
 * @property float $d2300
 * @property float $d3100
 * @property float $d4200
 * @property float $d5600
 * @property float $d7600
 * @property float $d10200
 * @property float $d13800
 * @property float $d18500
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Prediction[] $predictions
 * @property string|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Test onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Test whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Test whereD10200($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Test whereD11($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Test whereD120($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Test whereD1300($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Test whereD13800($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Test whereD15($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Test whereD150($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Test whereD1700($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Test whereD18500($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Test whereD2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Test whereD20($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Test whereD210($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Test whereD2300($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Test whereD26($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Test whereD290($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Test whereD3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Test whereD300($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Test whereD3100($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Test whereD36($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Test whereD4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Test whereD40($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Test whereD4200($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Test whereD5($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Test whereD520($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Test whereD5600($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Test whereD6($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Test whereD65($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Test whereD700($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Test whereD7600($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Test whereD8($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Test whereD85($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Test whereD950($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Test whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Test whereFilePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Test whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Test whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Test withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Test withoutTrashed()
 * @mixin \Eloquent
 */
class Test extends Model
{
    use SoftDeletes;

    /**
     * @var array
     */
    public const DATA_LABELS = [
        'd2', 'd3', 'd4', 'd5', 'd6', 'd8', 'd11', 'd15', 'd20', 'd26',
        'd36', 'd40', 'd65', 'd85', 'd120', 'd150', 'd210', 'd290', 'd300',
        'd520', 'd700', 'd950', 'd1300', 'd1700', 'd2300', 'd3100', 'd4200',
        'd5600', 'd7600', 'd10200', 'd13800', 'd18500',
    ];

    /**
     * @var string
     */
    protected $table = 'tests';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'file_path',
    ];

    /**
     * Test constructor.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->fillable = array_merge($this->fillable, static::DATA_LABELS);

        parent::__construct($attributes);
    }

    /**
     * @return bool
     */
    public function hasApprovedPrediction()
    {
        return $this->predictions()->approved()->exists();
    }

    /**
     * Get values that describe condensate of exhaled air humidity.
     *
     * @return Collection
     */
    public function data(): Collection
    {
        return collect($this->getAttributes())->except([
            'id', 'diagnostic_group_id', 'file_path',
            'created_at', 'updated_at', 'deleted_at',
        ]);
    }

    public function predictions()
    {
        return $this->hasMany(Prediction::class);
    }
}
