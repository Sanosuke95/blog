<?php

namespace App\Services\Auth;

use App\Models\User;
use Illuminate\Http\Request;

interface AuthServiceInterface
{
    public function generateToken(User $user);
    public function refreshToken(Request $request);
}
