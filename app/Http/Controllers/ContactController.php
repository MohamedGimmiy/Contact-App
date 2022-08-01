<?php

namespace App\Http\Controllers;

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
        $user = auth()->user();
        $companies =$user->companies()->orderBy('name','asc')->pluck('name','id')->prepend('All Companies', ' ');
        // \DB::enableQueryLog();
        $contacts = $user->contacts()->latestFirst()->paginate(10);


        // dd(\DB::getQueryLog());
        return view('contacts.index', compact('contacts', 'companies'));
    }
    public function create()
    {
        # code...
        $contact = new Contact();
        $companies = auth()->user()->companies()->orderBy('name','asc')->pluck('name','id')->prepend('All Companies', ' ');
        return view('contacts.create',compact('companies','contact'));
    }

    // route model binding
    public function show(Contact $contact)
    {
        # code...
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
        $request->user()->contacts()->create($request->all());
        return redirect()->route('contacts.index')->with('message','Contact has been added Successfully!');
    }

    public function edit(Contact $contact)
    {
        # code...
        //$contact = Contact::findOrFail($id);
        $companies = auth()->user()->companies()->orderBy('name','asc')->pluck('name','id')->prepend('All Companies', ' ');
        return view('contacts.edit', compact('companies','contact'));
    }

    public function update(Contact $contact, Request $request)
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
