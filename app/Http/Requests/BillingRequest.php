<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\PseudoTypes\True_;

class BillingRequest extends FormRequest
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
           return[
            'firstname'     => 'required',
            'address1'      => 'required',
            'city'          => 'required',
            'country'       => 'required',
            'paymentmethod' => 'required',
            'postcode'      => 'required',
            'cardtype'      => 'required_if:paymentmethod,card',
            'purchase'      => 'required_if:paymentmethod,purchase order',
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
            'lastname'  => 'Last Name',
            'address1'  => 'Address Line 1',
            'address2'  => 'Address Line 2',
            'city'      => 'City/Town',
        ];
    }
}
