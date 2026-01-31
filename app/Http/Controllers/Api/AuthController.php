<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Models\User;
use App\Services\Auth\AuthServiceInterface;
use App\Services\Users\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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

    public function login(AuthRequest $request)
    {
        if (!Auth::attempt($request->validated())) {
            return response()->json(['message' => 'Authentifiation failed'], 401);
        }

        $user = $this->authServiceInterface->generateToken($request->user());

        return response()->json(['user' => $user]);
    }

    public function register(AuthRequest $request)
    {
        $user = $this->userServiceInterface->createUser($request->validated());
        // $token = $this->authServiceInterface->generateToken($user);

        return response()->json(['user' => $user]);
    }

    public function profile(User $user)
    {
        return response()->json(['user' => $user]);
    }

    public function refreshToken(Request $request) {}

    private function addToken(User $user, string $name, array $colunm = ['*'], int $expire_at = 1)
    {
        return $user->createToken($name, $colunm, Carbon::now()->addDay($expire_at));
    }

    private function parseDate(string $date)
    {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }
}
