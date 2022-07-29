<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        # code...
        return view('contacts.index');
    }
    public function create()
    {
        # code...
        return view('contacts.create');
    }
    public function show($id)
    {
        # code...
        $contact = Contact::find($id);
        return view('contacts.show',compact('contact'));
    }
}
