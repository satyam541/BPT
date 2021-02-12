<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DelegateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'CFirstName'             => 'required',
            'CMobile'               => 'required||numeric',
            'CEmail'                => 'required|email',
           
        ];
    }

    public function messages()
    {
        return[
            'CFirstName.required'   => 'Please fill first name in Delegate details.',
            'CMobile.required'      => 'Please fill mobile in delegate details.',
            'CEmail.required'       => 'Please fill email in delegate details.',
            'CMobile.required'      => 'Mobile number must be in number',
           
        ];
    }
}
