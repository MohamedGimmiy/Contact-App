<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        # code...
        $contacts = Contact::orderBy('first_name','asc')->paginate(10);
        //$contacts = Contact::orderBy('first_name','asc')->get();
        //$contacts = Contact::all();
        
        return view('contacts.index', compact('contacts'));
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
