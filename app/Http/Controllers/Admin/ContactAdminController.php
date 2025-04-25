<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Inertia\Inertia;

class ContactAdminController extends Controller
{
    public function index()
    {
        $contacts = Contact::latest()->get();

        return Inertia::render('Admin/Contacts/Index', [
            'contacts' => $contacts,
        ]);
    }
}
