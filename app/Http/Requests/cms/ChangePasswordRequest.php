<?php

namespace App\Http\Requests\cms;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'currentPassword'          => 'required',
            'newPassword'              => 'required|min:6',
            'confirmPassword'          => 'required|required_with:newPassword|same:newPassword'
        ];
    }
}
