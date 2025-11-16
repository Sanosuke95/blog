<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    /**
     * Undocumented variable
     */
    protected $userService;


    /**
     * Undocumented function
     */
    public function __construct()
    {
        $this->userService = new UserService();
    }

    /**
     * User creation
     *
     * @param UserRequest $request
     * @return JsonResponse
     */
    public function signup(UserRequest $request): JsonResponse
    {
        $user = $this->userService->createUser($request->validated());
        return response()->json(['data' => $user, 'auth' => $user->addToken($user->createToken('access_token', ['*'], now()->addWeek()))]);
    }

    /**
     * User loggin
     *
     * @param UserRequest $request
     * @return JsonResponse
     */
    public function signin(UserRequest $request): JsonResponse
    {
        if (Auth::attempt($request->validated())) {
            $user = $this->userService->getUser(['key' => 'email', 'value' => $request['email']]);
            return response()->json(['data' => $user->userFormat($user), 'auth' => $user->addToken($user->createToken('access_token', ['*'], now()->addWeek()))]);
        } else {
            return response()->json(['message' => 'Failed authenticated']);
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
        $user = $this->userService->getUser(['key' => 'uuid', 'value' => $uuid]);
        return response()->json(['user' => $user->userFormat($user)]);
    }

    /**
     * Logout user
     *
     * @param String $uuid
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
