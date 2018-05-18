<?php

namespace App\Http\Requests\Seance;

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
            'examination_id'      => 'required|integer|min:1|exists:examinations,id|bail',
            'doctor_id'           => 'required|integer|min:1|exists:users,id|bail',
            'test_id'             => 'nullable|integer|min:1|exists:tests,id|bail',
            'classifier_id'       => 'nullable|integer|min:1|exists:classifiers,id|bail',
            'diagnostic_group_id' => 'nullable|integer|min:1|exists:diagnostic_groups,id|bail',
            'is_approved'         => 'nullable|boolean|bail',
            'complains'           => 'nullable|string|bail',
            'diagnosis'           => 'nullable|string|min:2|max:255|bail',
            'notes'               => 'nullable|string|bail'
        ];
    }
}
