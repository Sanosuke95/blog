<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Login user
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function signin(Request $request): JsonResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            $user = User::where('email', $credentials['email'])->firstOrFail();
            $token = $user->createToken('access_token');

            return response()->json(['data' => $user, 'token' => $token]);
        }

        return response()->json(['message' => 'echec authenticated']);
    }

    /**
     * Register user
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function signup(Request $request): JsonResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'name' => ['min:3']
        ]);

        $user = User::create($credentials);
        $token = $user->createToken('access_token');

        return response()->json(['user' => $user, 'token' => $token]);
    }
}
