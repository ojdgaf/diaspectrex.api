<?php

namespace App\Http\Requests\User;

use Illuminate\Validation\Rule;
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
            'email'       => ['required|email', Rule::unique('users')->ignore($this->user)],
            'first_name'  => 'required|string|min:3',
            'middle_name' => 'nullable|string|min:3',
            'last_name'   => 'required|string|min:3',
            'sex'         => 'required|string|in:Male,Female',
            'birthday'    => 'required|integer',

        ];
    }
}
