<?php

namespace App\Http\Requests\cms;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleRequest extends FormRequest
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
            //
        'course_id'      => 'required',
        'location'       => 'required',
        'duration'       => 'required',
        'event_time'     => 'required',
        'event_price'    => 'required'
        ];
    }
    
    public function attributes()
    {
        return [
            'course_id'     => 'course',
            'location'      => "Location",
            'event_time'    => 'Event Time',
            'event_price'   => "Event Price"
        ];
    }
}
