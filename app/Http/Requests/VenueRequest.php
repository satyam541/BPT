<?php

namespace App\Http\Requests;

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
            "venueName"         => "required",
            "address"           => "required",
            "latitude"          => "required",
            "longitude"         => "required",
            "phone"             => "required",
            "email"             => "required|string|max:255|regex:/^[a-zA-Z0-9.]+@[a-zA-Z]+[.]{1}[a-z]+$/",
            "venueDescription"  => "required",
        ];
    }
}
