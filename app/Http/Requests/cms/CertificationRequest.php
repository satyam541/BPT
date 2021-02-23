<?php

namespace App\Http\Requests\cms;

use Illuminate\Foundation\Http\FormRequest;

class CertificationRequest extends FormRequest
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
        $certification = request()->route('id',0);
        
          $id = 0;
          if(!empty($certification)){
              $id = $certification;
          }
        return [
            'name'      => 'required',
            'tka_name'  => 'required',
            'slug'      => 'required|unique:certification,slug,'.$id.',id',
        ];
    }
}
