<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExamRequest extends FormRequest
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
            'examCourse'           => 'required',
            'Date'            => 'required',
            'FirstName'                => 'required',
            'LastName'            => 'required',
            'Title'            => 'required',
            'Address1'            => 'required',
            'Town'            => 'required',
            'Postcode'            => 'required',
            'Telephone'           => 'numeric|digits_between:11,12'
        ];
    }

    public function attributes()
    {
     return[
        'examCourse'  => 'Exam',
        'Title'  => 'Job Title',
        'FirstName'  => 'First Name',
        'LastName'  => 'Last Name',
        'Telephone'  => 'Contact Number',
     ];   
    }
    
}
