<?php

namespace App\Http\Requests\cms;

use Illuminate\Foundation\Http\FormRequest;

class OnlineCourseRequest extends FormRequest
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
            'online_course_name'  =>  'required',
            'course_id'           =>  'required',
            'reference'           =>  'required|unique:course,reference,'.$id.',id',
            'duration'            =>  'required',
        ];
    }
    public function attributes()
    {
        return[
            'online_course_name' => 'name',
            'course_id'          => 'course',
        ];
    }
}
