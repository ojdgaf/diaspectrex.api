<?php

namespace App\Http\Requests\Location\Address;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrUpdate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'country_id'  => 'required|integer|min:1|exists:countries,id',
            'region_id'   => 'required|integer|min:1|exists:regions,id',
            'city_id'     => 'required|integer|min:1|exists:cities,id',
            'street_id'   => 'required|integer|min:1|exists:streets,id',
            'building'    => 'required|integer|between:1,1000',
            'flat'        => 'nullable|integer|between:1,1000',
            'postal_code' => 'nullable|string|min:3',
        ];
    }
}
