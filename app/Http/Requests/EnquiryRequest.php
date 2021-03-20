<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Rules\DomainMXRecord;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

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
       
        if(request()->page== 'onsite')
        {
          
                return [
                    'name'          =>  'sometimes|required',
                    'fname'         =>  'sometimes|required',
                    'lname'         =>  'sometimes|required',
                    'phone'         =>  'required|min:4',
                    'email'         =>  ['required','email',new DomainMXRecord],
                    // 'email'         =>  ['required','email:rfc'],
                    'course'        =>  'sometimes|required',
                    'delegates'     =>  'sometimes|required',        
                    'time'          =>  'sometimes|required',
                    'company'       =>  'sometimes|required', 
                ];
      }
      else 
      {
     
            return [
                'name'          =>  'sometimes|required',
                'fname'         =>  'sometimes|required',
                'lname'         =>  'sometimes|required',
                'phone'         =>  'required|min:4',
                'email'         =>  ['required','email',new DomainMXRecord],
                // 'email'         =>  ['required','email:rfc'],
                'course'        =>  'sometimes|required',
                'delegates'     =>  'sometimes|required',        
                'time'          =>  'sometimes|required',
                
            ];
    }
   

    
    }

    public function messages()
    {
        return [
           
            'phone.min' =>':attribute is required',
            'company.required'   =>':attribute is required',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Name',
            'phone'=> 'Phone',
            'fname'=> 'First Name',
            'lname'=> 'Last Name',
            'email'=> 'Email',
            'delegates' => 'Number of Delegates',
            'course'=>'Course',
            'time'=> 'Preferred Time',
            'company'=> 'Company',
            
        ];
    }
}
