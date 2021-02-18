<?php

namespace App\Http\Requests\cms;

use Illuminate\Foundation\Http\FormRequest;

class TopicRequest extends FormRequest
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
        $topic=request()->route('topic',0);
        
          $id = 0;
          if(!empty($topic)){
              $id = $topic->id;
          }
        
        return [
            'name'                  => 'required|string|max:100',
            'category_id'           => 'required',
            'reference'             => 'required|unique:topic,reference,'.$id.',id',
            'image'                 => 'mimes:jpeg,png,jpg,svg|max:500',
        ];
    }
    public function attributes()
    {
        return[
            'category_id' => 'Category',
        ];
    }
}
