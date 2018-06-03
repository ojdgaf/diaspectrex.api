<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\Management\Role\CreateOrUpdate;

use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Http\Resources\Management\Role as RoleResource;

/**
 * Class RoleController
 * @package App\Http\Controllers\Management
 */
class RoleController extends Controller
{
    /**
     * Roles that will be attached to the user without any role.
     */
    protected const DEFAULT_ROLES = ['patient'];

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return RoleResource::collection(Role::all());
    }

    /**
     * @param CreateOrUpdate $request
     * @return RoleResource
     */
    public function store(CreateOrUpdate $request)
    {
        $role = Role::create($request->only('name', 'display_name', 'description'));

        $role->syncPermissions($request->permission_ids);

        return RoleResource::make($role);
    }

    /**
     * @param Role $role
     * @return RoleResource
     */
    public function show(Role $role)
    {
        return RoleResource::make($role);
    }

    /**
     * @param CreateOrUpdate $request
     * @param Role $role
     * @return RoleResource
     */
    public function update(CreateOrUpdate $request, Role $role)
    {
        $role->update($request->only('name', 'display_name', 'description'));

        $role->syncPermissions($request->permission_ids);

        return RoleResource::make($role);
    }

    /**
     * @param Role $role
     * @throws \Exception
     */
    public function destroy(Role $role)
    {
        $role->delete();

        User::doesntHave('roles')->get()->each(function ($user) {
            $user->syncRoles(static::DEFAULT_ROLES);
        });

        sendResponse([], 'Role has been deleted');
    }
}
