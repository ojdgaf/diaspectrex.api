<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\Management\Role\AttachToUser;
use App\Http\Requests\Management\Role\SyncWithUser;
use App\Http\Requests\Management\Role\RemoveFromUser;

use App\Models\User;
use App\Http\Resources\Management\Role as RoleResource;

/**
 * Class UserRoleController
 * @package App\Http\Controllers\Management
 */
class UserRoleController extends Controller
{
    /**
     * @param User $user
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function get(User $user)
    {
        return RoleResource::collection($user->roles);
    }

    /**
     * @param AttachToUser $request
     * @param User $user
     */
    public function assign(AttachToUser $request, User $user)
    {
        $user->assignRole($request->roleName);

        sendResponse($user->getRoleNames());
    }

    /**
     * @param SyncWithUser $request
     * @param User $user
     */
    public function sync(SyncWithUser $request, User $user)
    {
        $user->syncRoles($request->roleNames);

        sendResponse($user->getRoleNames());
    }

    /**
     * @param RemoveFromUser $request
     * @param User $user
     */
    public function remove(RemoveFromUser $request, User $user)
    {
        $user->removeRole($request->roleName);

        sendResponse($user->getRoleNames());
    }
}
