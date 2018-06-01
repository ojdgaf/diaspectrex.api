<?php

namespace App\Http\Requests\Phone;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

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
            'phones.*.phoneable_type' => 'required|string|in:Hospital,User|bail',
            'phones.*.phoneable_id'   => 'required|integer|min:1|bail',
            'phones.*.number'         => 'required|numeric|regex:/^[0-9]{10,20}$/|unique:phones,number|bail'
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => $validator->errors()->first()
        ]));
    }
}
