<?php

namespace App\Http\Requests\cms;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        if(FormRequest::route()->uri == 'cms/user/insert')
        {
            return [
                'name'                     => 'required|string|max:255',
                'email'                    => 'required|string|email|max:255|unique:user',
                'password'                 => 'required',
                'password_confirmation'    => 'required|same:password'
            ];
        }
        else
        {
            return[
                'name'                     => 'required|string|max:255',
                'email'                    => 'required|string|email|max:255',
            ];
        }
    }
}
