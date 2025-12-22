<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Contact\ContactCollection;
use App\Http\Resources\Contact\ContactResource;
use App\Interface\ControllerInterface;
use App\Models\Contact;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ContactController extends Controller implements ControllerInterface
{

    protected Contact $contact;

    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    public function index(): JsonResponse
    {
        return response()->json(['contact' => new ContactCollection($this->contact->all())]);
    }

    public function show(): JsonResponse
    {
        return response()->json([]);
    }

    public function store(Request $request): JsonResponse
    {
        $create = $this->contact->create($request->all());
        $resource = new ContactResource($create);
        return response()->json(['data' => $resource]);
    }
}
