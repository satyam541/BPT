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
        if(FormRequest::route()->uri == 'cms/schedule/update/{scheduleid}')
        {
            return [
                'fk_venueId'    =>  'required',
                'responseDate'  =>  'required',
                'eventPrice'    =>  'required',
                'duration'      =>  'required'
            ];
        }
        else{
            return [
                'courseList'    =>  'required',
                'venueList'     =>  'required',
                'responseDate'  =>  'required',
                'eventPrice'    =>  'required',
                'eventTime'     =>  'required'
            ];
        }
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
