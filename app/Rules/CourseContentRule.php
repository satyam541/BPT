<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\CourseContent;

class CourseContentRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $course_id       = request()->course_id;
        
        $courseContents  = CourseContent::withTrashed()->where('course_id',$course_id)->get();
        $courseContent  =  request()->route('courseDetail');
        
        // Update case
        if(!empty($courseContent) && $courseContent[$attribute] == $value)
        {
            return true;
        }

        // Insert case
        foreach($courseContents as $courseContent)
        {
        
            if($courseContent[$attribute] == $value)
            {
                return false;
            }
            
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The Content for this country has been already added';
    }
}
