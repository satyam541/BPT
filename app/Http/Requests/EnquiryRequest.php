<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Rules\DomainMXRecord;

class EnquiryRequest extends FormRequest
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
            'name'          =>  'sometimes|required',
            'fname'         =>  'sometimes|required',
            'lname'         =>  'sometimes|required',
            'phone'         =>  'numeric|sometimes',
            // 'email'         =>  ['required','email',new DomainMXRecord],
            'email'         =>  ['required','email:rfc,dns'],
            'course'        =>  'sometimes|required',
            'delegates'     =>  'sometimes|required',        
            'time'          =>  'sometimes|required'
        ];
 
   

    
    }

    public function messages()
    {
        return [];
    }

    public function attributes()
    {
        return [
            'name' => 'Name',
            'phone'=> 'Phone',
            'fname'=> 'First Name',
            'lname'=> 'Last Name',
            'email'=> 'Email Address',
            'delegates' => 'Number of Delegates',
            'course'=>'Course',
            'time'=> 'Preferred Time'
            
        ];
    }
}
