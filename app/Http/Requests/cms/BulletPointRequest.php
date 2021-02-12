<?php

namespace App\Http\Requests\cms;

use Illuminate\Foundation\Http\FormRequest;

class BulletPointRequest extends FormRequest
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
            'bullet_point_text' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'bullet_point_text' => 'Bullet Point'
        ];
    }
}
