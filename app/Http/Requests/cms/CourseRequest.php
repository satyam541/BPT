<?php

namespace App\Http\Requests\cms;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\CourseSlugRule;
class CourseRequest extends FormRequest
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
            'topic_id'              => 'required',
            'category_slug'           => 'required',
            'topic_slug'           => 'required',
            'course_slug'           => ['required',new CourseSlugRule],
            'tag_line'              => 'required',
            'tka_name'              => 'required',
            'duration'              => 'required',
            // 'duration_global'       => 'nullable',
            // 'accreditation_id'      => 'nullable',
            'logo'                  => 'mimes:jpeg,png,jpg,svg|max:500',
        ];
    }
    public function attributes()
    {
        return[
            'topic_id'          =>  'Topic',
        ];
    }
}
