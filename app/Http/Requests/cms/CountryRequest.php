<?php

namespace App\Http\Requests\cms;

use Illuminate\Foundation\Http\FormRequest;

class CountryRequest extends FormRequest
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
        $country=request()->route('country_code',0);

          $id = 0;
          if(!empty($country)){
              $id = $country->country_id;
          }

        return [
            'name'                  => 'required|string|max:100',
            'country_code'          => 'required|string|max:3|unique:country,country_code,'.$id.',country_id',
            'description'           => 'required|string',
            'iso3'                  => 'nullable|string|max:3',
            'currency'              => 'nullable|string|max:3',
            'currency_symbol'       => 'nullable|max:50',
            'currency_symbol_html'  => 'nullable|max:50',
            'exchange_rate'         => 'nullable|numeric',
            'sales_ratio'           => 'nullable|numeric',
            'vat_amount'            => 'nullable|numeric',
            'vat_amount_elearning'  => 'nullable|numeric',
        ];
    }
}
