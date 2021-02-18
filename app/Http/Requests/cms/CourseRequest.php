<?php

namespace App\Http\Requests\cms;

use Illuminate\Foundation\Http\FormRequest;

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
        $course=request()->route('course',0);
        
          $id = 0;
          if(!empty($course)){
              $id = $course->id;
          }
          
        return [
            'name'                  => 'required|string|max:100',
            'topic_id'              => 'required',
            'reference'             => 'required|unique:course,reference,'.$id.',id',
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
