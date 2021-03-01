<?php

namespace App\Http\Requests\cms;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
        $role=request()->route('role',0);
        
          $id = 0;
          if(!empty($role)){
              $id = $role->id;
          }
        return [
            'name' => 'required|string|max:255|unique:role,name,'.$id.',id',
        ];
    }
}
