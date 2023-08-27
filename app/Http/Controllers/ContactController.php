<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Mail\Contact as MailContact;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function create()
    {
        return view('static.contact');
    }

    public function store(StoreContactRequest $request)
    {
        $contact = Contact::create([
            'email' => $request->email,
            'subject' => $request->subject,
            'content' => $request->content
        ]);

        $contact->save();
        Mail::to('dev@test.com')->send(new MailContact($contact));
        return redirect()->route('contact.create')->with('success', 'Message send');
    }
}
