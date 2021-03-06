<?php

namespace App\Http\Requests\cms;
use App\Rules\TopicContentRule;

use Illuminate\Foundation\Http\FormRequest;

class TopicContentRequest extends FormRequest
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
            'topic_id'         => 'required',
            'country_id'       => ['required',new TopicContentRule],
            // 'heading'       => 'nullable',
            // 'details'       => 'required',
            'overview'         => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'topic_id'      => 'Topic',
            'country_id'    => 'Country',
            // 'details'       => 'Details'
        ];
    }
}
