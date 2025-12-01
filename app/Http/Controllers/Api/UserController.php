<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Login user
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function signin(UserRequest $request): JsonResponse
    {

        if (Auth::attempt($request->validated())) {
            $user = User::where('email', $request['email'])->firstOrFail();
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
    public function signup(UserRequest $request): JsonResponse
    {
        $user = User::create($request->validated());
        $token = $user->createToken('access_token');

        return response()->json(['user' => $user, 'token' => $token]);
    }
}
