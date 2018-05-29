<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Requests\Auth\Login;
use App\Http\Requests\Auth\Register;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Auth\AuthenticationException;
use App\Http\Resources\User as UserResource;

/**
 * Class AuthController
 * @package App\Http\Controllers\Auth
 */
class AuthController extends Controller
{
    /**
     * Roles that will be attached to every new user by default.
     */
    protected const DEFAULT_ROLES = ['patient'];

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @param Login $request
     * @throws AuthenticationException
     */
    public function login(Login $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (!$token = auth()->attempt($credentials))
            throw new AuthenticationException();

        sendResponse([
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => auth()->factory()->getTTL() * 60,
        ]);
    }

    /**
     * Create the user and return JWT token.
     *
     * @param Register $request
     * @return UserResource
     */
    public function register(Register $request)
    {
        return new UserResource($this->createUser($request));
    }

    /**
     * Get the authenticated User.
     *
     * @return UserResource
     */
    public function user()
    {
        return new UserResource(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     */
    public function logout()
    {
        auth()->logout();

        sendResponse([], 'Logged out successfully');
    }

    /**
     * Refresh a token.
     *
     */
    public function refresh()
    {
        sendResponse([]);
    }

    /**
     * @param Register $request
     * @return User
     */
    protected function createUser(Register $request): User
    {
        $user = new User($request->validated());

        $user->password = Hash::make($request->password);

        $user->save();

        $user->syncRoles(static::DEFAULT_ROLES);

        return $user;
    }
}