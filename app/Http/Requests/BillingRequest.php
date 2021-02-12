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
            'PaymentMethod'        => 'required',
            'BFirstName'           => 'required',
            'BAddress1'            => 'required',
            'BTown'                => 'required',
            'BPostCode'            => 'required',
            'BProvince'            => 'required',
            'CardDetails'          => 'required_if:PaymentMethod,Credit/Debit Card',
            'PurchaseDetails'      => 'required_if:PaymentMethod,Purchase Order',
           ];  
    }
    public function messages()
    {
        return[
            'BFirstName.required'   => 'Please fill First Name in billing details.',
            'BAddress1.required'    => 'Please fill Address in billing details.',
            'BTown.required'        => 'Please fill Town in billing details.',
            'BPostCode.required'    => 'Please fill Post Code in billing details.',
            'BProvince.required'    => 'Please fill Province in billing details',
            'PurchaseDetails'       => 'Please fill Purchase Order Detail in billing details'
        ];
    }
}
