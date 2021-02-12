<?php

namespace App\Http\Requests\cms;

use Illuminate\Foundation\Http\FormRequest;

class AccreditationRequest extends FormRequest
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
        $accreditation=request()->route('accreditation',0);
        $id = 0;
        if(!empty($accreditation)){
        
            $id = $accreditation->id;
            
        }
        return [
            'name'         => 'required|string|max:100|unique:accreditation,name,'.$id.',id',
            'image'        => 'mimes:jpeg,png,jpg,svg|max:500',
        ];
    }
}
