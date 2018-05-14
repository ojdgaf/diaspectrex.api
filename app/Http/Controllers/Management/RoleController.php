<?php

namespace App\Http\Controllers\Management;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\Management\Role\CreateOrUpdate;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Resources\Management\Role as RoleResource;
use App\Http\Resources\Management\Roles as RolesResource;

/**
 * Class RoleController
 * @package App\Http\Controllers\Management
 */
class RoleController extends Controller
{
    /**
     * @return RolesResource
     */
    public function index()
    {
        return new RolesResource(Role::all());
    }

    /**
     * @param CreateOrUpdate $request
     * @return RoleResource
     */
    public function store(CreateOrUpdate $request)
    {
        $role = Role::create($request->all());

        return new RoleResource($role);
    }

    /**
     * @param Role $role
     * @return RoleResource
     */
    public function show(Role $role)
    {
        return new RoleResource($role);
    }

    /**
     * @param CreateOrUpdate $request
     * @param Role $role
     * @return RoleResource
     */
    public function update(CreateOrUpdate $request, Role $role)
    {
        $role->update($request->all());

        return new RoleResource($role);
    }

    /**
     * @param Role $role
     * @throws \Exception
     */
    public function destroy(Role $role)
    {
        $role->delete();

        sendResponse([]);
    }
}
