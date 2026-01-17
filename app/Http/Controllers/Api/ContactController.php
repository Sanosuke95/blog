<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Services\Contacts\ContactServiceInterface;
use Illuminate\Http\JsonResponse;

class ContactController extends Controller
{
    protected $contactService;
    public function __construct(ContactServiceInterface $contactService)
    {
        $this->contactService = $contactService;
    }

    public function index(): JsonResponse
    {
        return response()->json($this->contactService->getAllContact());
    }

    public function show(Contact $contact): JsonResponse
    {
        return response()->json(['contact' => $contact]);
    }

    public function store(ContactRequest $request): JsonResponse
    {
        return response()->json($this->contactService->createContact($request->validated()));
    }
}
