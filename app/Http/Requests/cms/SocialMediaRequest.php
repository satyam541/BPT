<?php

namespace App\Http\Requests\cms;

use Illuminate\Foundation\Http\FormRequest;

class SocialMediaRequest extends FormRequest
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
        $social_media = request()->route('id', 0);
        // dd(request()->all(), $social_media);
        return  [
                    'website'       => ['required','unique:social_media,website,'.$social_media],
                    'link'          => ['required'],
                    'image'         => ['nullable']
                ];
    }
}
