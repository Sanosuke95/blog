<?php

namespace App\Interfaces;

use App\Models\Contact;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

interface ContactInterface
{
    /**
     * Create new contact
     * 
     * @param array $data
     * @return Collection
     */
    public function createContact(array $data);

    /**
     * List contact
     * 
     * @return JsonResource
     */
    public function listContact();

    /**
     * get contact by uuid
     *
     * @param Contact $contact
     * @return void
     */
    public function getContact(string $uuid);
}
