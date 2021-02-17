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
        return [
            'online_course_name'  =>  'required',
            'course_id'           =>  'required',
            'reference'           =>  'required',
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
