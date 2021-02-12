<?php

namespace App\Http\Requests\cms;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name'          => 'required|string|max:100',
            'reference'     => 'required',
            // 'color_code'    => 'required',
            'image'         => 'image|mimes:jpeg,png,jpg,svg|max:500',
            'icon'          => 'mimes:jpeg,png,jpg,svg|max:500',
        ];
    }
}
