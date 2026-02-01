<?php

namespace App\Services\Users;

use Illuminate\Http\Request;

interface UserServiceInterface
{
    public function getAllUser();

    public function createUser(array $data);

    public function getUserByEmail(string $email);

    public function getUserByToken(Request $request);
}
