<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //dd($this->route('contact'));
        //dd($this->method());
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name'=> 'required',
            'last_name'=> 'required',
            'email'=> 'required|email',
            'phone' => 'required',
            'address'=> 'required',
            'company_id'=> 'required|exists:companies,id'
        ];
    }

    // customizing error messages attributes
    public function attributes()
    {
        return [
            'company_id' => 'company'
        ];
    }
    // customizing error messages
    public function messages()
    {
        return [
            'email.email' => 'The email that you entered is not valid',
            '*.required' => 'The :attribute cannot be empty'
        ];
    }
}
