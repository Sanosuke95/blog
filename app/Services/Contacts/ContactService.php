<?php

namespace App\Services\Contacts;

use App\Models\Contact;
use App\Services\Contacts\ContactServiceInterface;
use DB;
use Exception;

class ContactService implements ContactServiceInterface
{
    protected $contact;

    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    public function getAllContact()
    {
        return $this->contact->all();
    }

    public function createContact(array $data)
    {
        DB::beginTransaction();
        try {
            $contact = Contact::create(attributes: $data);
            DB::commit();

            return $contact;
        } catch (Exception $e) {
            DB::rollBack();
            return "Error in creation : " . $e->getMessage();
        }
    }
}
