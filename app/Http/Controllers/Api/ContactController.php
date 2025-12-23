<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Contact\ContactCollection;
use App\Http\Resources\Contact\ContactResource;
use App\Models\Contact;
use App\Services\ContactService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    /**
     * Model contact
     *
     * @var Contact
     */
    protected Contact $contact;

    /**
     * Contact Service
     *
     * @var ContactService
     */
    protected ContactService $contactService;

    public function __construct(Contact $contact, ContactService $contactService)
    {
        $this->contact = $contact;
        $this->contactService = $contactService;
    }

    public function index(): JsonResponse
    {
        return response()->json(new ContactCollection($this->contactService->listContact()), 200);
    }

    public function show(string $uuid): JsonResponse
    {
        $contact = new ContactResource($this->contactService->getContact($uuid));
        return response()->json(['data' => $contact]);
    }

    public function store(Request $request): JsonResponse
    {
        $contact = $this->contactService->createContact($request->all());
        $resource = new ContactResource($contact);
        return response()->json(['data' => $resource]);
    }
}
