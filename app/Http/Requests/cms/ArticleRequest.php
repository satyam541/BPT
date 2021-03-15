<?php

namespace App\Http\Requests\cms;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
        $article=request()->route('article',0);
        
          $id = 0;
          if(!empty($article)){
              $id = $article->id;
          }
        return [
            'title'                  => 'required|max:100',
            'post_date'              => 'required',
            // 'type'                   => 'required',
            'reference'              => 'required|unique:article,reference,'.$id.',id',
            'image'                  => 'mimes:jpeg,png,jpg,svg|max:500',
            'meta_title'             => 'max:100|required',
            'meta_description'       => 'max:250|required',
        ];
    }
}
