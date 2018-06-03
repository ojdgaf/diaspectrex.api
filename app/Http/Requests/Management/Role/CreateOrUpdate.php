<?php

namespace App\Http\Requests\Management\Role;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CreateOrUpdate
 * @package App\Http\Requests\Management\Role
 * @property string name
 * @property string display_name
 * @property string description
 * @property array permission_ids
 */
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
            'name'         => 'required|string|min:3',
            'display_name' => 'required|string|min:3',
            'description'  => 'nullable|string',

            'permission_ids'   => 'required|array|min:1',
            'permission_ids.*' => 'required|integer|exists:permissions,id',
        ];
    }
}
