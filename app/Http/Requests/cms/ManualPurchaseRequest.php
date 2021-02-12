<?php

namespace App\Http\Requests\cms;

use Illuminate\Foundation\Http\FormRequest;

class ManualPurchaseRequest extends FormRequest
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
            'name'          => ['required', 'string', 'max:100'],
            'lastname'      => ['required', 'string', 'max:100'], 
            'email'         => ['required', 'string', 'email', 'max:255'],
            'Address1'      => ['required', 'string', 'max:255'],
            'Town'          => ['required', 'string', 'max:100'],
            'state'         => ['required', 'string', 'max:100'],
            'PostCode'      => ['required'],
            'courseId'      => ['required'],
            'country'       => ['required'],
            'location'      => ['required'],
            'price'         => ['required', 'numeric'],
            
        ];
    }
}
