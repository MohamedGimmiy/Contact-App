<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Company;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        # code...
        //$contacts = Contact::orderBy('first_name','asc')->get();
        //$contacts = Contact::all();
        $companies = Company::userCompanies();
        // \DB::enableQueryLog();
        $contacts = auth()->user()->contacts()->latestFirst()->paginate(10);


        // dd(\DB::getQueryLog());
        return view('contacts.index', compact('contacts', 'companies'));
    }
    public function create()
    {
        # code...
        $contact = new Contact();
        $companies = Company::userCompanies();
        return view('contacts.create',compact('companies','contact'));
    }


    // route model binding
    public function show(Contact $contact)
    {
        # code...
        return view('contacts.show',compact('contact'));
    }

    public function store(ContactRequest $request)
    {
        # code...
        // for debugging
        //dd($request->all());
        //$request->only('first_name','last_name');
        //dd($request->except('first_name'));
        $request->user()->contacts()->create($request->all());
        return redirect()->route('contacts.index')->with('message','Contact has been added Successfully!');
    }

    public function edit(Contact $contact)
    {
        # code...
        //$contact = Contact::findOrFail($id);
        $companies = Company::userCompanies();
        return view('contacts.edit', compact('companies','contact'));
    }

    public function update(Contact $contact, ContactRequest $request)
    {
        # code...
        //dd($request->all());
        $contact->update($request->all());

        return redirect()->route('contacts.index')->with('message','Contact has been updated Successfully!');

    }
    public function destroy(Contact $contact)
    {
        # code...
        $contact->delete();

        return back()->with('message','Contact has been deleted Successfully!');
    }
}
