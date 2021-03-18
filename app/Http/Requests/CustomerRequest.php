<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\DomainMXRecord;

class CustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return True;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        
        return [
            'firstname'     => 'required',
            'lastname'      => 'required',
            'phone'         => 'required|min:4',
            // 'CTelephone'    => 'numeric|digits_between:11,12',
            'email'         => ['required','email','confirmed',new DomainMXRecord]
            
        ];
    }

    public function messages()
    {
        return [
            'email.required' => ':attribute is required',
            'phone.min' =>':attribute is required'
        ];
    }
    
    public function attributes()
    {
        return [
            'firstname' => 'First Name',
            'lastname' => 'Last Name',
            'phone' => 'Phone Number',
            'company' => 'Company name',
            'email' => 'email address',
        ];
    }
    
}
