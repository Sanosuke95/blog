<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Http\Resources\UserResource;
use App\Trait\Uuid;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Sanctum\NewAccessToken;

/**
 * @mixin IdeHelperUser
 */
class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, Uuid, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Undocumented function
     *
     * @param NewAccessToken $data
     * @return array
     */
    public function addToken(NewAccessToken $data): array
    {
        return [
            'token' => $data->plainTextToken,
            'expire_at' => $this->parseDate($data->accessToken->expires_at)
        ];
    }

    /**
     * Parse date
     *
     * @param string $date
     * @return string
     */
    protected function parseDate(string $date): string
    {
        return Carbon::parse($date)->format("Y-m-d H:i:s");
    }

    /**
     * User resource
     *
     * @param User $data
     * @return JsonResource
     */
    public function userFormat(User $data): JsonResource
    {
        return new UserResource($data);
    }
}
