<?php

namespace App\Http\Controllers\Api;

use App\Enum\HttpCode;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Response\ApiResponse;
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
        return ApiResponse::send(['data' => $user, 'auth' => $user->addToken($user->createToken('access_token', ['*'], now()->addWeek()))], 'User created');
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
            return ApiResponse::send(['user' => $user->userFormat($user), 'auth' => $user->addToken($user->createToken('access_token', ['*'], now()->addWeek()))], 'User logged in.', HttpCode::SUCCESS);
        } else {
            return ApiResponse::send([], 'Failed authenticated', HttpCode::UNAUTHORIZED);
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
        return ApiResponse::send(['user' => $user->userFormat($user)], 'User profile');
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
            return ApiResponse::send([], 'User not found or already logged out', HttpCode::UNAUTHORIZED);

        $user->tokens()->delete();
        return ApiResponse::send([], 'logged out');
    }
}
