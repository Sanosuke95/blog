<?php

namespace App\Http\Controllers\Api;

use App\Enum\HttpCode;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Http\Resources\User\TokenResource;
use App\Http\Resources\User\UserResource;
use App\Services\Auth\AuthServiceInterface;
use App\Services\Users\UserServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $userServiceInterface;

    protected $authServiceInterface;

    public function __construct(UserServiceInterface $userServiceInterface, AuthServiceInterface $authServiceInterface)
    {
        $this->userServiceInterface = $userServiceInterface;
        $this->authServiceInterface = $authServiceInterface;
    }

    public function login(AuthRequest $request): JsonResponse
    {
        if (!Auth::attempt($request->validated())) {
            return $this->errorResponse('Authentifiation failed', HttpCode::Unauthenticated);
        }

        $token = $this->authServiceInterface->generateToken($request->user());

        return $this->successResponse('User logged in', $token);
    }

    public function register(AuthRequest $request): JsonResponse
    {
        $user = $this->userServiceInterface->createUser($request->validated());
        $token = $this->authServiceInterface->generateToken($this->userServiceInterface->getUserByEmail($user['email']));

        return $this->successResponse('User created', $token);
    }

    public function profile(Request $request): JsonResponse
    {
        $user = $this->userServiceInterface->getUserByToken($request);
        return $this->successResponse('User profile', new UserResource($user));
    }

    public function refreshToken(Request $request)
    {
        $token = $this->authServiceInterface->refreshToken($request);

        return $this->successResponse('Token refresh', $token);
    }

    public function logout(Request $request): JsonResponse
    {
        $user = $this->userServiceInterface->getUserByToken($request);
        $user->tokens()->delete();

        return $this->successResponse('User logout');
    }
}
