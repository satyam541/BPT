<?php

namespace App\Http\Requests\cms;

use Illuminate\Foundation\Http\FormRequest;

class VenueRequest extends FormRequest
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
        $venue=request()->route('venue',0);
        
          $id = 0;
          if(!empty($venue)){
              $id = $venue;
          }

        return [
            'name'                  => 'required|string|max:100',
            'image'                 => 'image|mimes:jpeg,png,jpg,svg|max:500',
            'location_id'           => 'required',
            'reference'             => 'required|unique:venue,reference,' . $id . ',id',
            'phone'                 => 'required',
            'email'                 => 'required|string|max:255|regex:/^[a-zA-Z0-9.]+@[a-zA-Z]+[.]{1}[a-z]+$/',
        ];
    }
    public function attributes()
    {
        return[
            'location_id'       =>   'location',
        ];
    }
}
