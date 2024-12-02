<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{

    public function index() {
        return view('front.pages.contact');
    }


    public function store(StoreContactRequest $request) {

        Contact::create($request->validated());

        return redirect()->back()->with('success', 'Your Message has been sent successfully');
    }
}
