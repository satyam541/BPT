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
                'fk_venueId'     =>  'required',
                'response_date'  =>  'required',
                'event_price'    =>  'required',
                'duration'       =>  'required'
            ];
        }
        else{
            return [
                'course_id'      =>  'required',
                'country_id'     =>  'required',
                'response_date'  =>  'required',
                'event_price'    =>  'required',
                'event_time'     =>  'required',
                'location'       =>   'required'   
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
