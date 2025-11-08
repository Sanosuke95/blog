<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Request;

class UserController extends Controller
{
    /**
     * User creation
     *
     * @param UserRequest $request
     * @return JsonResponse
     */
    public function signup(UserRequest $request): JsonResponse
    {
        try {
            $user = User::create($request->validated());
            $token = $user->createToken('access_token', ['*'], now()->addWeek());
            $parse = Carbon::parse($token->accessToken->expires_at);
            return response()->json(['data' => $user, 'token' => $token->plainTextToken, "expires_at" => $parse->format("Y-m-d H:i:s")]);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    /**
     * User loggin
     *
     * @param UserRequest $request
     * @return JsonResponse
     */
    public function signin(UserRequest $request): JsonResponse
    {
        try {
            $credentials = $request->validated();
            if (Auth::attempt($credentials)) {
                $user = User::where('email', $request['email'])->first();
                $token = $user->createToken('access_token', ['*'], now()->addWeek());
                return response()->json(['data' => $user->userFormat($user), 'token' => $token->plainTextToken, "expires_at" => $user->parseDate($token->accessToken->expires_at)]);
            } else {
                return response()->json(['message' => 'Failed authenticated']);
            }
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    /**
     * Show user session
     *
     * @param String $uuid
     * @return JsonResponse
     */
    public function profile(String $uuid): JsonResponse
    {
        $user = User::where('uuid', $uuid)->first();
        if (is_null($user)) {
            return response()->json(['message' => 'User not found']);
        }
        $userResource = new UserResource($user);

        return response()->json(['user' => $userResource]);
    }

    /**
     * Logout user
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function logout(String $uuid): JsonResponse
    {
        $user = Auth::user();

        if ($user->uuid !== $uuid)
            return response()->json(['messages' => 'User not found or already logged out'], 401);

        $user->tokens()->delete();
        return response()->json(['message' => 'logged out']);
    }
}
