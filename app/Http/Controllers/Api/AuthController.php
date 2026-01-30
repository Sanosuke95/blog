<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {

        if (Auth::attempt($request->all())) {
            $user = User::where("email", $request["email"])->firstOrFail();
            $token = $user->createToken('auth_token');

            return response()->json(['user' => $user, 'token' => $token]);
        }
    }

    public function register(Request $request)
    {
        $user = User::create($request->all());
        $token = $user->createToken('auth_token');

        return response()->json(['user' => $user, 'token' => $token]);
    }

    public function profile(User $user)
    {
        return response()->json(['user' => $user]);
    }
}
