<?php

namespace App\Services\Auth;

use App\Enum\TokenAbility;
use App\Models\User;
use App\Services\Users\UserServiceInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;

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

        $token = $user->createToken('auth_token', [TokenAbility::ACCESS_API->value], Carbon::now()->addDay(1));
        $refresh = $user->createToken('refresh_token', [TokenAbility::REFRESH_API->value], Carbon::now()->addDay(7));

        return [
            'token' => $token->plainTextToken,
            'token_expire_at' => $this->parseDate($token->accessToken->expires_at),
            'refreshToken' => $refresh->plainTextToken,
            'refreshToken_expire_at' => $this->parseDate($refresh->accessToken->expires_at)
        ];
    }

    public function refreshToken(Request $request)
    {
        $currentToken = $request->bearerToken();
        $refresh = PersonalAccessToken::findToken($currentToken);

        $user = $refresh->tokenable;

        return $this->generateToken($user);
    }

    private function parseDate(string $date)
    {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }
}
