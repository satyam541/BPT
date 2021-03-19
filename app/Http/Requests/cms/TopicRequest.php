<?php

namespace App\Http\Requests\cms;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\TopicSlugRule;
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
        
        
        return [
            'name'                  => 'required|string|max:100',
            'category_id'           => 'required',
            'category_slug'           => 'required',
            'topic_slug'           => ['required',new TopicSlugRule],
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
