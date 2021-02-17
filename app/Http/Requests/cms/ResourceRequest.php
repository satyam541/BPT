<?php

namespace App\Http\Requests\cms;

use Illuminate\Foundation\Http\FormRequest;

class ResourceRequest extends FormRequest
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
        $resource=request()->route('id',0);
        
          $id = 0;
          if(!empty($resource)){
              $id = $resource;
            
          }
          
        return [
            'name'          =>  'required',
            'reference'     =>  'required|unique:resource,reference,'.$id.',id',
            'content'       =>  'required',
        ];
    }
}
