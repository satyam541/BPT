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
            'CFirstName'           => 'required',
            'CMobile'              => 'required',
        //  'CTelephone'           => 'numeric|digits_between:11,12',
            'CEmail'               => 'required|email|confirmed',
            'CEmail_confirmation'  => 'required|email'
            
        ];
    }

    public function messages()
    {
        return[
            'CFirstName.required'           => 'Please fill your first name.',
            'CMobile.required'              => 'Please fill your mobile.',
            'CEmail.required'               => 'Please fill your email address.',
            'CEmail.email'                  => 'Please fill a valid email address.',
            'CEmail_confirmation.required'  => 'Please confirm your email address.',
            'CEmail_confirmation.email'     => 'Please fill a valid confirmation email address.',
            'CEmail.confirmed'              => 'Confirmation email does not match the email address.'
    
        ];
    }
}
