<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\Users\Index;

use App\Models\User;
use App\Http\Resources\User as UserResource;
use App\Http\Resources\Users as UsersResource;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Index $request
     * @return UsersResource
     */
    public function index(Index $request)
    {
        $users = User::query();

        if ($request->has('role'))
            $users->role($request->role);

        return new UsersResource($users->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
