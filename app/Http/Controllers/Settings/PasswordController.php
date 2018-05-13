<?php

namespace App\Http\Controllers\Settings;

use App\Http\Requests\Settings\UpdatePassword;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     *
     * @param  UpdatePassword $request
     * @return JsonResponse
     */
    public function update(UpdatePassword $request): JsonResponse
    {
        auth()->user()->update([
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'success' => true,
        ]);
    }
}
