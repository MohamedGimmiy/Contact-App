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
        $contacts = Contact::orderBy('first_name','asc')->where(function ($query){
            if($company_id = request('company_id')){
                $query->where('company_id', $company_id);
            }
        })->
        paginate(10);
        //$contacts = Contact::orderBy('first_name','asc')->get();
        //$contacts = Contact::all();
        
        $companies = Company::orderBy('name','asc')->pluck('name','id')->prepend('All Companies', ' ');
        return view('contacts.index', compact('contacts', 'companies'));
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
