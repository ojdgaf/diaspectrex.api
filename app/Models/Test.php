<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Test
 *
 * @property int $id
 * @property int $diagnostic_group_id
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
    protected $table = 'tests';

    /**
     * Gets the diagnostic group which the test related to
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function diagnosticGroup(){
        return $this->belongsTo(DiagnosticGroup::class, 'diagnostic_group_id');
    }
}
