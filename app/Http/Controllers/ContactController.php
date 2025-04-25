<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ContactController extends Controller
{
    // Display contact form
    public function create()
    {
        return Inertia::render('Contact/Create');
    }

    // Store contact form data
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'message' => 'required|max:1000',
        ]);

        Contact::create($validated);

        return redirect()->route('contact.create')->with('success', 'Zpráva byla úspěšně odeslána!');
    }
}
