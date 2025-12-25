<?php

namespace App\Services;

use App\Http\Resources\Contact\ContactCollection;
use App\Http\Resources\Contact\ContactResource;
use App\Interfaces\ContactInterface;
use App\Models\Contact;
use DB;
use Exception;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ContactService implements ContactInterface
{
    /**
     * Model contact
     *
     * @var Contact
     */
    protected Contact $contact;

    /**
     * Create a new class instance.
     */
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    /**
     * List all contact
     *
     * @return ResourceCollection
     */
    public function listContact(): ResourceCollection
    {
        return new ContactCollection($this->contact->all());
    }

    /**
     * get contact by uuid
     *
     * @param string $uuid
     * @return JsonResource
     */
    public function getContact(string $uuid): JsonResource
    {
        try {
            $contact = $this->contact->firstWhere('uuid', $uuid);
            return $this->contactResponse($contact);
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }

    /**
     * Create new contact
     * 
     * @param array $data
     * @return JsonResource
     */
    public function createContact(array $data): JsonResource
    {
        DB::beginTransaction();
        try {
            $contact = $this->contact->create($data);
            DB::commit();
            return $this->contactResponse($contact);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e->getMessage();
        }
    }

    /**
     * Return response
     *
     * @param Contact $contact
     * @return JsonResource
     */
    protected function contactResponse(Contact $contact): JsonResource
    {
        return new ContactResource($contact);
    }
}
