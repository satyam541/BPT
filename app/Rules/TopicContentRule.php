<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

use App\Models\TopicContent;

class TopicContentRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        
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
        $topic_id       = request()->topic_id;
        
        $topicContents  = TopicContent::withTrashed()->where('topic_id',$topic_id)->get();
        $topicContent   =  request()->route('topicDetail');
        
        // Update case
        if(!empty($topicContent) && $topicContent[$attribute] == $value)
        {
            return true;
        }

        // Insert case
        foreach($topicContents as $topicContent)
        {
        
            if($topicContent[$attribute] == $value)
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
