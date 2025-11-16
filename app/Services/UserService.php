<?php

namespace App\Services;

use App\Models\User;
use DB;
use Exception;

class UserService
{

    /**
     * Create user
     *
     * @param array $data
     * @return User
     */
    public function createUser(array $data)
    {
        DB::beginTransaction();

        try {
            $user = User::create($data);
            DB::commit();

            return $user;
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }

        return $user;
    }

    public function getUser(array $data)
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
