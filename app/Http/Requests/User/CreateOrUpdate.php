<?php

namespace App\Http\Requests\User;

use Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Collection;
use Illuminate\Foundation\Http\FormRequest;
use Spatie\Permission\Models\Role;

/**
 * Class CreateOrUpdate
 * @package App\Http\Requests\User
 * @property null|Collection $rules
 * @property array $roles_ids
 * @property string $password
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
        $this->validateRoles();

        $this->createBasicRules();

        $this->adjustRules();

        return $this->rules->toArray();
    }

    /**
     * Pre-validate new user's roles from input.
     */
    protected function validateRoles()
    {
        $validator = Validator::make($this->all(), [
            'roles_ids'   => 'required|array',
            'roles_ids.*' => 'required|integer|exists:roles,id',
        ]);

        if ($validator->fails())
            sendError('Roles did not pass validation', [], 422);
    }

    /**
     * @param array $roles_ids
     * @return Collection
     */
    protected function getRolesPermissions(array $roles_ids)
    {
        $roles = Role::with('permissions')->whereIn('id', $roles_ids)->get();

        return $roles->pluck('permissions')->flatten()->pluck('name')->unique();
    }

    /**
     * Apply rules for basic attributes which are shared across all users in the system.
     */
    protected function createBasicRules()
    {
        $hundredYearsAgo  = now()->subYears(100)->timestamp;
        $eighteenYearsAgo = now()->subYears(18)->timestamp;

        $this->rules = collect([
            'roles_ids'   => 'required|array',
            'roles_ids.*' => 'required|integer|exists:roles,id',

            'email'       => ['required', 'email', Rule::unique('users')->ignore($this->user)],
            'first_name'  => 'required|string|min:3|max:255',
            'middle_name' => 'nullable|string|min:3|max:255',
            'last_name'   => 'required|string|min:3|max:255',
            'sex'         => 'required|string|in:male,female',
            'birthday'    => "required|integer|between:$hundredYearsAgo,$eighteenYearsAgo",
        ]);

        if ($this->method() === 'POST')
            $this->rules->put('password', 'required|string|min:6');
    }

    /**
     * Apply specific rules based on permissions.
     */
    protected function adjustRules()
    {
        $authenticated = auth()->user();

        $newUserPermissions = $this->getRolesPermissions($this->roles_ids);

        if ($newUserPermissions->contains('be patient'))
            if ($authenticated->can('manage patients'))
                $this->attachRulesForPatient();
            else
                sendError('You cannot manage patients', [], 403);

        if ($newUserPermissions->contains('be employee'))
            if ($authenticated->can('manage employees'))
                $this->attachRulesForEmployee();
            else
                sendError('You cannot manage employees', [], 403);

        if ($newUserPermissions->contains('be doctor'))
            if ($authenticated->can('manage doctors'))
                $this->attachRulesForDoctor();
            else
                sendError('You cannot manage doctors', [], 403);

        if ($newUserPermissions->contains('be head'))
            if ($authenticated->can('manage heads'))
                $this->attachRulesForHead();
            else
                sendError('You cannot manage heads', [], 403);

        if ($newUserPermissions->contains('be support'))
            if ($authenticated->can('manage supports'))
                $this->attachRulesForSupport();
            else
                sendError('You cannot manage supports', [], 403);
    }

    /**
     * Apply rules for patients.
     */
    protected function attachRulesForPatient()
    {
        //
    }

    /**
     * Apply rules for employees.
     */
    protected function attachRulesForEmployee()
    {
        $monthAgo = now()->subMonth()->timestamp;
        $monthAhead = now()->addMonth()->timestamp;

        $this->rules = $this->rules->merge([
            'address_id'  => 'required|integer|exists:addresses,id',
            'hospital_id' => 'required|integer|exists:hospitals,id',
            'passport'    => 'required|string|min:4',
            'is_present'  => 'required|boolean',
            'hired_at'    => "required|integer|between:$monthAgo,$monthAhead",
            'about'       => 'nullable|string',
        ]);
    }

    /**
     * Apply rules for doctors.
     */
    protected function attachRulesForDoctor()
    {
        $this->rules = $this->rules->merge([
            'degree' => 'required|string|min:4',
        ]);
    }

    /**
     * Apply rules for heads.
     */
    protected function attachRulesForHead()
    {
        //
    }

    /**
     * Apply rules for supports.
     */
    protected function attachRulesForSupport()
    {
        //
    }
}
