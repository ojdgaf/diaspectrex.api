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
        $role = Role::create($request->validated());

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
        $role->update($request->validated());

        return RoleResource::make($role);
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
