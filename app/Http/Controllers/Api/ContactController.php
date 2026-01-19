<?php

namespace App\Http\Controllers\Api;

use App\Enum\HttpCode;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Http\Resources\Contact\ContactCollection;
use App\Http\Resources\Contact\ContactResource;
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
        return $this->successResponse('List contact', new ContactCollection($this->contactService->getAllContact()));
    }

    public function show(Contact $contact): JsonResponse
    {
        return $this->successResponse('Contact', new ContactResource(resource: $contact));
    }

    public function store(ContactRequest $request): JsonResponse
    {
        $contact = $this->contactService->createContact($request->validated());
        return $contact['status'] ? $this->successResponse('Contact created', new ContactResource(resource: $contact['data']), HttpCode::Created) : $this->errorResponse($contact['message'], HttpCode::UnprocessableEntity);
    }
}
