<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Requests\Auth\Login;
use App\Http\Requests\Auth\Register;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\AuthenticationException;

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
     * @return \Illuminate\Http\JsonResponse
     * @throws AuthenticationException
     */
    public function login(Login $request): JsonResponse
    {
        $credentials = $request->only(['email', 'password']);

        if (!$token = auth()->attempt($credentials))
            throw new AuthenticationException();

        return $this->respondWithToken($token);
    }

    /**
     * Create the user and return JWT token.
     *
     * @param Register $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Register $request): JsonResponse
    {
        $user = $this->createUser($request)->withRoleNames();

        return response()->json([
            'success' => true,
            'data'    => $user,
        ]);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function user()
    {
        return response()->json([
            'success' => true,
            'data'    => auth()->user()->withRoleNames(),
        ]);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json([
            'success' => true,
            'message' => 'Logged out successfully.',
        ]);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return response()->json([
            'success' => true,
        ]);
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'success' => true,
            'data'    => [
                'access_token' => $token,
                'token_type'   => 'bearer',
                'expires_in'   => auth()->factory()->getTTL() * 60,
            ],
        ]);
    }

    /**
     * @param Register $request
     * @return User
     */
    protected function createUser(Register $request): User
    {
        $user = new User($request->all());

        $user->password = Hash::make($request->password);

        $user->save();

        $user->syncRoles(static::DEFAULT_ROLES);

        return $user;
    }
}