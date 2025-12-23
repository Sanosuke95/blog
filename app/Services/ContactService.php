<?php

namespace App\Services;

use App\Interfaces\ContactInterface;
use App\Models\Contact;
use DB;
use Exception;

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
     * @return void
     */
    public function listContact()
    {
        return $this->contact->all();
    }

    /**
     * get contact by uuid
     *
     * @param string $uuid
     * @return void
     */
    public function getContact(string $uuid)
    {
        try {
            $contact = $this->contact->firstWhere('uuid', $uuid);
            return $contact;
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }

    /**
     * Create new contact
     * 
     * @param array $data
     * @return Collection
     */
    public function createContact(array $data)
    {
        DB::beginTransaction();
        try {
            $contact = $this->contact->create($data);
            DB::commit();
            return $contact;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e->getMessage();
        }
    }
}
