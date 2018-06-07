<?php
namespace App\Services;

use App\Models\Phone;
use Illuminate\Database\Eloquent\Model;

/**
 * Service to create Phone models.
 *
 * Class PhoneService
 * @package App\Services
 */
class PhoneService
{
    public static function storeMany(array $phones, Model $phoneable)
    {
        $phones = self::createPhonesCollection($phones);

        return $phoneable->phones()->saveMany($phones);
    }

    public static function createPhonesCollection(array $phones)
    {
        return collect($phones)->map(function ($phone){
            return new Phone($phone);
        });
    }
}