<?php

namespace App\Http\Requests\cms;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\CourseContentRule;

class CourseContentRequest extends FormRequest
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
            'course_id'         => 'required',
            'country_id'        => ['required',new CourseContentRule],
            'heading'           => 'nullable',
            // 'description'       => 'required',
            'overview'          => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'course_id'     => 'Course',
            'country_id'    => 'Country',
            'description'   => 'Description'
        ];
    }
}
