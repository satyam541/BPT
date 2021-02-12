<?php

namespace App\Http\Requests;

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
        $course=request()->route('courseId',0);
        
          $id = 0;
          if(!empty($course)){
              $id = $course;
          }

        $rules = [
            'courseName' => 'required',
            'courseDisplayName'=>'required',
            'courseLogo' => 'sometimes',
            'courseTagLine' => 'sometimes',
            'courseIntro' => 'sometimes',
            'courseOverview' => 'sometimes',
            'courseContent' => 'sometimes',
            'courseDuration' => 'sometimes',
            'courseDeliveryMethod' => 'sometimes',
            'deliveryMethodList'=>'required',
            'courseMetaTitle' => 'sometimes',
            'courseMetaDesc' => 'sometimes',
            'courseMetaKeyword' => 'sometimes',
            'courseWhatWillYouLearn'=>'sometimes',
            'courseWhoShouldAttend'=>'sometimes',
            'coursePreRequities'=>'sometimes',
      
        ];
        if (request()->checkslug) {
            $rules['slug'] = 'required|unique:course,slug,' . $id . ',courseId';
        }
        return $rules;
    }
}
