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
        $category=request()->route('category',0);
        
          $id = 0;
          if(!empty($category)){
              $id = $category->id;
          }
          
        return [
            'name'          => 'required|string|max:100',
            'reference'     => 'required|unique:category,reference,'.$id.',id',
            'image'         => 'image|mimes:jpeg,png,jpg,svg|max:500',
            'icon'          => 'mimes:jpeg,png,jpg,svg|max:500',
        ];
    }
}
