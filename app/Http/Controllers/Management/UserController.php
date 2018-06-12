<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

use App\Http\Requests\User\Get;
use App\Http\Requests\User\CreateOrUpdate;

use App\Models\User;
use App\Http\Resources\User as UserResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Get $request
     * @return AnonymousResourceCollection
     */
    public function index(Get $request)
    {
        $users = User::query();

        if ($request->has('role'))
            $users->role($request->role);

        return UserResource::collection($users->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateOrUpdate $request
     * @return UserResource
     */
    public function store(CreateOrUpdate $request)
    {
        $user = new User($request->validated());

        $user->password = Hash::make($request->password);

        $user->save();

        $user->syncRoles($request->role_ids);

        return UserResource::make($user);
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return UserResource
     */
    public function show(User $user)
    {
        return UserResource::make($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CreateOrUpdate $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(CreateOrUpdate $request, User $user)
    {
        $user->update($request->validated());

        $user->syncRoles($request->role_ids);

        return UserResource::make($user);
    }

    /**
     * @param User $user
     * @return UserResource
     */
    public function changePresentStatus(User $user)
    {
        $user->update([
            'is_present' => ! $user->is_present,
        ]);

        // TODO migrate?

        return UserResource::make($user);
    }

    /**
     * @param User $user
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        // TODO migrate related patients and all responsibilities to another user

        $user->delete();

        sendResponse([], $user->last_name . ' has been deleted');
    }

}
