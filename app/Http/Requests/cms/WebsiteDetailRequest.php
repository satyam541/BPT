<?php

namespace App\Http\Requests\cms;

use Illuminate\Foundation\Http\FormRequest;

class WebsiteDetailRequest extends FormRequest
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
        $websiteDetail = request()->route('websitedetail', 0);
       
        $id = 0;
        if(!empty($websiteDetail))
        {
            $id=$websiteDetail->id;
        }
        return [
            'country_id'        =>  'required|max:5|unique:website_country,country_id,'.$id,
            'name'              =>  'required',
            'address'           =>  'required|string',
            'contact_number'    =>  'required|string',
            'contact_email'     =>  'required',
            'opening_days'      =>  'nullable|numeric',
            'contact_footer'    =>  'nullable|string',
            'facebook'          =>  'nullable|string',
            'twitter'           =>  'nullable|string',
            'linkedin'          =>  'nullable|string',
            ];
    }
    public function attributes()
    {
        return[
            'country_id'        =>  'country',
        ];
    }
}
