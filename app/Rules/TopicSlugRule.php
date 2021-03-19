<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Topic;
class TopicSlugRule implements Rule
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
        $reference=encodeurlSlug(request()->category_slug).'/'.encodeUrlSlug(request()->topic_slug);
        $topic=Topic::where('reference',$reference)->first();
        if(request()->id && $topic!=null){
            return true;
        }
        if($topic==null){
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
        return 'Slug Already Taken';
    }
}
