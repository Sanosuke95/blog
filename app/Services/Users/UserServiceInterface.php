<?php

namespace App\Services\Users;

interface UserServiceInterface
{
    public function getAllUser();

    public function createUser(array $data);

    public function getUserByEmail(string $email);
}
