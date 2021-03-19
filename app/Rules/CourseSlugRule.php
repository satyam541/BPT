<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Course;
class CourseSlugRule implements Rule
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
        $reference=encodeurlSlug(request()->category_slug).'/'.encodeUrlSlug(request()->topic_slug).'/'.encodeUrlSlug(request()->course_slug);
        $course=Course::where('reference',$reference)->first();
        if(request()->id && $course!=null){
            return true;
        }
        if($course==null){
            return true;
        }
        else{
            false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Course Slug Already Taken';
    }
}
