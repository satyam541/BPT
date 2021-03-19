<?php

namespace App\Http\Requests\cms;

use Illuminate\Foundation\Http\FormRequest;

class LocationRequest extends FormRequest
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
        $location=request()->route('location',0);
        
          $id = 0;
          if(!empty($location)){
              $id = $location;
          }

        return [
            'name'                  => 'required|string|max:100',
            'country_id'            => 'required',
            'tier'                  => 'required',
            'reference'             => 'required|unique:location,reference,' . $id . ',id',
            'phone'                 => 'required',
            // 'email'                 => 'required|string|max:255|regex:/^[a-zA-Z0-9.]+@[a-zA-Z]+[.]{1}[a-z]+$/',
        ];
    }
    public function attributes()
    {
        return[
            'country_id'       =>   'country',
        ];
    }
}
