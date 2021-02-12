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
        return [
            'name'                  => ['required', 'string', 'max:100'],
            'image'                 => ['image','mimes:jpeg,png,jpg,svg','max:500'],
            'location_id'          => ['required'],
        ];
    }
}
