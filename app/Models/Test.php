<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

/**
 * App\Observers\Test
 *
 * @property int $id
 * @property int $diagnostic_group_id
 * @property string $file_path
 * @property float $D2
 * @property float $D3
 * @property float $D4
 * @property float $D5
 * @property float $D6
 * @property float $D8
 * @property float $D11
 * @property float $D15
 * @property float $D20
 * @property float $D26
 * @property float $D36
 * @property float $D40
 * @property float $D65
 * @property float $D85
 * @property float $D120
 * @property float $D150
 * @property float $D210
 * @property float $D290
 * @property float $D300
 * @property float $D520
 * @property float $D700
 * @property float $D950
 * @property float $D1300
 * @property float $D1700
 * @property float $D2300
 * @property float $D3100
 * @property float $D4200
 * @property float $D5600
 * @property float $D7600
 * @property float $D10200
 * @property float $D13800
 * @property float $D18500
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Models\DiagnosticGroup $diagnosticGroup
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
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Test whereDiagnosticGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Test whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Test whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Test extends Model
{
    use SoftDeletes;

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
        'd2', 'd3', 'd4', 'd5', 'd6', 'd8', 'd11', 'd15', 'd20', 'd26', 'd36',
        'd40', 'd65', 'd85', 'd120', 'd150', 'd210', 'd290', 'd300', 'd520',
        'd700', 'd950', 'd1300', 'd1700', 'd2300', 'd3100', 'd4200', 'd5600',
        'd7600', 'd10200', 'd13800', 'd18500',
    ];

    /**
     * Get values that describe condensate of exhaled air humidity.
     *
     * @return Collection
     */
    public function getDValues(): Collection
    {
        return collect($this->getAttributes())->except([
            'id', 'diagnostic_group_id', 'file_path',
            'created_at', 'updated_at', 'deleted_at',
        ]);
    }

    /**
     * @return string
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function file()
    {
        return Storage::get('tests/' . $this->file_path);
    }
}
