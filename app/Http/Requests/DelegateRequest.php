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
            'firstname'     => 'required',
            'lastname'     => 'required',
            'phone'     => 'required|numeric',
            'telephone'     => 'sometimes|numeric',
            'email'     => 'required|email',
            'postcode'  => 'sometimes'
        ];
    }

    public function messages()
    {
        return [];
    }

    public function attributes()
    {
        return [
            'firstname' => 'First Name',
            'lastname' => 'Last Name',
            'phone' => 'Phone Number',
            'email' => 'email address',
            'postcode' => 'Postal Code'
        ];
    }
}
