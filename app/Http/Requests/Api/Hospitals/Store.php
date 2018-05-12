<?php

namespace App\Http\Requests\Api\Hospitals;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
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
            'address_id' => 'nullable|integer',
            'name' => 'required|string|min:2|max:255',
            'description' => 'nullable|string'
        ];
    }
}
