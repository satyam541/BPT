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
        return [
            'name'                  => 'required|string|max:100',
            'tag_line'              => 'required',
            'tka_name'              => 'required',
            'reference'             => 'required',
            'accreditation_id'      => 'nullable',
            'topic_id'              => 'required',
            'duration'              => 'required',
            'duration_global'       => 'nullable',
            'logo'                  => 'mimes:jpeg,png,jpg,svg|max:500',
        ];
    }
}
