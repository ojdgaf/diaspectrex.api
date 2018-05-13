<?php

namespace App\Http\Requests\Management\Role;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class SyncWithUser
 * @package App\Http\Requests\Management\Role
 * @property array $roles
 */
class SyncWithUser extends FormRequest
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
            'roles'   => 'required|array',
            'roles.*' => 'required|string|exists:roles,name',
        ];
    }
}
