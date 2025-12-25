<?php

namespace App\Interfaces;

use App\Models\Contact;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;

interface ContactInterface
{
    /**
     * Create new contact
     * 
     * @param array $data
     * @return JsonResource
     */
    public function createContact(array $data): JsonResource;

    /**
     * List contact
     * 
     * @return ResourceCollection
     */
    public function listContact(): ResourceCollection;

    /**
     * get contact by uuid
     *
     * @param Contact $contact
     * @return JsonResource
     */
    public function getContact(string $uuid): JsonResource;
}
