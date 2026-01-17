<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    function index(): JsonResponse
    {
        $contacts = Contact::all();
        return response()->json($contacts);
    }

    function show(string $id): JsonResponse
    {
        $contact = Contact::where('uuid', '=', $id)->firstOrFail();
        return response()->json(['contact' => $contact]);
    }

    function store(Request $request): JsonResponse
    {
        $contact = Contact::create($request->all());

        return response()->json($contact);
    }
}
