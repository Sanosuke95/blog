<?php

namespace App\Services\Users;

use App\Models\User;
use DB;
use Exception;

class UserService implements UserServiceInterface
{

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getAllUser()
    {
        $this->user->orderBy('created_at', 'DESC')->paginate(10);
    }

    public function getUserByEmail(string $email): array
    {
        try {
            $user = $this->user->where('email', operator: $email)->firstOrFail();
            return $user;
        } catch (Exception $e) {
            return ['status' => false, 'message' => 'Error in get : ' . $e->getMessage()];
        }
    }

    public function createUser(array $data)
    {
        DB::beginTransaction();
        try {
            $user = User::create($data);
            DB::commit();
            return $user;
        } catch (Exception $e) {
            DB::rollBack();
            return ['status' => false, 'message' => 'Error in creation : ' . $e->getMessage()];
        }
    }
}
