<?php
namespace App\Services;

use App\Models\Phone;
use Illuminate\Support\Facades\DB;

/**
 * Service to create Phone models.
 *
 * Class PhoneService
 * @package App\Services
 */
class PhoneService
{
    public static function storeMany(array $phones, int $phoneableId){
        DB::beginTransaction();

        foreach ($phones as &$phone){
            $phone['phoneable_id'] = $phoneableId;
            $savedPhone = Phone::create($phone);
            if (empty($savedPhone->id)){
                DB::rollBack();
                return false;
            }
        }

        DB::commit();

        return true;
    }
}