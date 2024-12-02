<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index() {
        $contacts = Contact::orderBy('id', 'desc')
        ->paginate(10);

        return view('admin.contacts.index', compact('contacts'));
    }

    public function destroy(Contact $contact) {
        $contact->delete();

        return redirect()->route('admin.contact.index')->with('success', 'Contact has been deleted successfully');
    }
}
