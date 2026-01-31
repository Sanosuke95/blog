<?php

namespace App\Services\Auth;

use App\Models\User;
use App\Services\Users\UserServiceInterface;
use Carbon\Carbon;

class AuthService implements AuthServiceInterface
{

    protected $userServiceInterface;

    public function __construct(UserServiceInterface $userServiceInterface)
    {
        $this->userServiceInterface = $userServiceInterface;
    }

    public function generateToken(User $user)
    {
        $user->tokens()->delete();

        $token = $user->createToken('auth_token', ['*'], Carbon::now()->addDay(1));
        $refresh = $user->createToken('auth_token', ['*'], Carbon::now()->addDay(7));

        return [
            'token' => $token->plainTextToken,
            'token_expire_at' => $this->parseDate($token->accessToken->expires_at),
            'refreshToken' => $refresh->plainTextToken,
            'refreshToken_expire_at' => $this->parseDate($refresh->accessToken->expires_at)
        ];
    }

    public function refreshToken(User $user)
    {
        throw new \Exception('Not implemented');
    }

    private function parseDate(string $date)
    {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }
}
