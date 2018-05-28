<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\User\Get;

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
     * @param  \Illuminate\Http\Request $request
     * @return UserResource
     */
    public function store(Request $request)
    {
        $user = User::create($request->all());

        return UserResource::make($user);
    }

    /**
     * Display the specified resource.
     * @param User $user
     * @return UserResource
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

        return new UserResource($user);
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
