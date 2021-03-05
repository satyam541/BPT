<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\CategoryContent;

class CategoryContentRule implements Rule
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
        $category_id       = request()->category_id;
        
        $categoryContents  = CategoryContent::withTrashed()->where('category_id',$category_id)->get();
        $categoryContent  =  request()->route('categoryDetail');
        
        // Update case
        if(!empty($categoryContent) && $categoryContent[$attribute] == $value)
        {
            return true;
        }

        // Insert case
        foreach($categoryContents as $categoryContent)
        {
        
            if($categoryContent[$attribute] == $value)
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
