<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'phone'         => 'required|numeric',
            // 'CTelephone'    => 'numeric|digits_between:11,12',
            'email'         => 'required|email|confirmed'
            
        ];
    }

    public function messages()
    {
        return [
            'email.required' => ':attribute is required',
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
