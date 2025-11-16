<?php

namespace App\Services;

use App\Enum\HttpCode;
use App\Models\User;
use App\Response\ApiResponse;
use DB;
use Exception;
use Illuminate\Http\JsonResponse;

class UserService
{

    /**
     * Create user
     *
     * @param array $data
     * @return User
     */
    public function createUser(array $data): User|JsonResponse
    {
        DB::beginTransaction();

        try {
            $user = User::create($data);
            DB::commit();

            return $user;
        } catch (Exception $e) {
            return ApiResponse::send([], $e->getMessage(), HttpCode::UNAUTHORIZED);
        }

        return $user;
    }


    public function getUser(array $data): User|JsonResponse
    {
        try {
            $user = User::where($data['key'], $data['value'])->first();
            if (is_null($user)) {
                return response()->json(['message' => 'User not found']);
            }
            return $user;
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }
}
