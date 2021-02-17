<?php

namespace App\Http\Requests\cms;

use Illuminate\Foundation\Http\FormRequest;

class RedirectRequest extends FormRequest
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
        $url=request()->route('url',0);
        
          $id = 0;
          if(!empty($url)){
              $id = $url->id;
          }
            return [
                'source_url'       => 'required|unique:url_redirect,source_url,'.$id.'id',
                'target_url'       => 'required'
            ];
 
    }
}
