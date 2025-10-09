<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
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
            $msg = "User create";

            return $this->renderResponse(['token' => $token->plainTextToken], $msg);
        } catch (Exception $e) {
            return $this->renderResponse([], 'error in authentication : ' . $e->getMessage(), 401);
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
                $msg = "User logged";

                return $this->renderResponse(['token' => $token->plainTextToken, 'user' => new UserResource($user)], $msg);
            } else {
                return $this->renderResponse([], 'authentication error ', 401);
            }
        } catch (Exception $e) {
            return $this->renderResponse([], 'error in authentication : ' . $e->getMessage(), 401);
        }
    }

    /**
     * User profile
     */
    public function profile(Request $request): JsonResponse
    {
        try {
            $user = new UserResource($request->user());
            return $this->renderResponse(['user' => $user], 'User profile');
        } catch (Exception $e) {
            return $this->renderResponse([], 'authentication error ', 401);
        }
    }

    /**
     * User logout
     */
    public function logout(Request $request): JsonResponse
    {
        $request->user()->tokens()->delete();
        return response()->json(['msg' => 'User logout']);
    }
}
