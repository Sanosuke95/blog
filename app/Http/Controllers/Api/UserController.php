<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    /**
     * User register
     */
    public function register(Request $request): JsonResponse
    {
        try {
            $credentials = $request->all();
            $user = User::create([
                'email' => $credentials['email'],
                'password' => $credentials['password'],
                'name' => $credentials['name'] ?? "",
                'active' => $credentials['active']
            ]);

            $token = $user->createToken('access_token');

            return response()->json(['token' => $token]);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    /**
     * User login
     */
    public function login(Request $request): JsonResponse
    {
        try {
            $credentials = $request->all();

            if (Auth::attempt($credentials)) {
                $user = User::where('email', $credentials['email'])->firstOrFail();
                $token = $user->createToken('access_token');

                return response()->json(['token' => $token, 'user' => $user]);
            } else {
                return response()->json(['msg' => 'login password error']);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
