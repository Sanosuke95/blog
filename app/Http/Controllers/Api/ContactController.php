<?php

namespace App\Http\Controllers\Api;

use App\Enums\HttpCode;
use App\Http\Controllers\Controller;
use App\Http\Resources\Contact\ContactCollection;
use App\Http\Resources\Contact\ContactResource;
use App\Models\Contact;
use App\Services\ContactService;
use App\Services\ResponseService;
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

    /**
     * Response Service
     *
     * @var ResponseService
     */
    protected ResponseService $responseService;


    public function __construct(Contact $contact, ContactService $contactService, ResponseService $responseService)
    {
        $this->contact = $contact;
        $this->contactService = $contactService;
        $this->responseService = $responseService;
    }

    /**
     * get all
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return $this->responseService->render($this->contactService->listContact(), 'List contact');
    }

    /**
     * get single
     *
     * @param string $uuid
     * @return JsonResponse
     */
    public function show(string $uuid): JsonResponse
    {
        return $this->responseService->render($this->contactService->getContact($uuid), 'contact');
    }

    /**
     * create resource
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        return $this->responseService->render($this->contactService->createContact($request->all()), 'contact created');
    }
}
