<?php
namespace App\Http\Requests;

/**
 * Class Rules
 * @package App\Http\Requests
 */
class Rules
{

    public static function getAddressRules()
    {
        return [
            'address'             => 'nullable',
            'address.country_id'  => 'required_with:address|integer|min:1|exists:countries,id|bail',
            'address.region_id'   => 'required_with:address|integer|min:1|exists:regions,id|bail',
            'address.city_id'     => 'required_with:address|integer|min:1|exists:cities,id|bail',
            'address.street_id'   => 'required_with:address|integer|min:1|exists:streets,id|bail',
            'address.building'    => 'required_with:address|integer|between:1,1000|bail',
            'address.flat'        => 'nullable|integer|between:1,1000|bail',
            'address.postal_code' => 'nullable|string|min:3|bail'
        ];
    }

    public static function getPhonesRules()
    {
        return [
            'phones'                  => 'nullable',
            'phones.*.number'         => 'required_with:phones|numeric|regex:/^[0-9]{10,20}$/|bail'
        ];
    }

}