<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        # code...
        $contacts = Contact::latestFirst()->paginate(10);
        //$contacts = Contact::orderBy('first_name','asc')->get();
        //$contacts = Contact::all();

        $companies = Company::orderBy('name','asc')->pluck('name','id')->prepend('All Companies', ' ');
        return view('contacts.index', compact('contacts', 'companies'));
    }
    public function create()
    {
        # code...
        $contact = new Contact();
        $companies = Company::orderBy('name','asc')->pluck('name','id')->prepend('All Companies', ' ');
        return view('contacts.create',compact('companies','contact'));
    }
    public function show($id)
    {
        # code...
        $contact = Contact::find($id);
        return view('contacts.show',compact('contact'));
    }

    public function store(Request $request)
    {
        # code...
        // for debugging
        //dd($request->all());
        //$request->only('first_name','last_name');
        $request->validate([
            'first_name'=> 'required',
            'last_name'=> 'required',
            'email'=> 'required|email',
            'phone' => 'required',
            'address'=> 'required',
            'company_id'=> 'required|exists:companies,id'
        ]);
        //dd($request->except('first_name'));
        Contact::create($request->all());
        return redirect()->route('contacts.index')->with('message','Contact has been added Successfully!');
    }

    public function edit($id)
    {
        # code...
        $contact = Contact::findOrFail($id);
        $companies = Company::orderBy('name','asc')->pluck('name','id')->prepend('All Companies', ' ');
        return view('contacts.edit', compact('companies','contact'));
    }
    public function update($id, Request $request)
    {
        # code...
        //dd($request->all());
        $request->validate([
            'first_name'=> 'required',
            'last_name'=> 'required',
            'email'=> 'required|email',
            'phone' => 'required',
            'address'=> 'required',
            'company_id'=> 'required|exists:companies,id'
        ]);
        $contact = Contact::findOrFail($id);
        $contact->update($request->all());

        return redirect()->route('contacts.index')->with('message','Contact has been updated Successfully!');

    }
    public function destroy($id)
    {
        # code...
        $contact = Contact::find($id);
        $contact->delete();

        return back()->with('message','Contact has been deleted Successfully!');
    }
}
