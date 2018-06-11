<?php

namespace App\Http\Requests\PatientCard;

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
            'code'            => 'required|string|min:1|max:255|bail',
            'patient_id'      => 'required|integer|min:1|exists:users,id|bail',
            'patient_type_id' => 'required|integer|exists:patient_types,id',
            'allergies'       => 'nullable|string|bail',
            'diseases'        => 'nullable|string|bail',
        ];
    }
}
