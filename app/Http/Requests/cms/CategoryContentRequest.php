<?php

namespace App\Http\Requests\cms;

use Illuminate\Foundation\Http\FormRequest;

class CategoryContentRequest extends FormRequest
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
            'category_id'      => ['required'],
            'country_id'       => ['required'],
            'heading'          => ['nullable'],
            'overview'         => ['required'],
            // 'description'   => ['required'],
        ];
    }
    
    public function messages()
    {
        return [];
    }

    public function attributes()
    {
        return [
            'category_id' => 'category',
            'country_id'  => 'Country',
            'description' => 'Description'
        ];
    }
}
