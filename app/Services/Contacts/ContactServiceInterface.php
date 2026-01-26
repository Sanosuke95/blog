<?php

namespace App\Services\Contacts;

interface ContactServiceInterface
{
    public function getAllContact();

    public function createContact(array $data);
}
