<?php

namespace App\Http\Controllers\cms;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Country;
use App\Http\Requests\cms\CountryRequest;

class CountryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
		// $this->middleware('access:role,insert')->only('insertRole');
    }
    public function selectedCountry(Request $request)
    {
        $country = Country::find($request->country_id);
        
        Country::setActiveCountry($country);
        return 'done';
    }

    public function list(Request $request)
    {
        
        $this->authorize('view', new Country());
        $countries= Country::all();
        
        return view('cms.country.countryList',compact('countries'));
    }
    public function active(Request $request){
        $country=Country::find($request->country_id);
        if($request->checked=='checked'){
            $country->active=0;
            $country->save();    
            return 'removed';
        }
        $country->active=1;
            $country->save(); 
        return 'added';
    }
    public function create()
    {
        
        $this->authorize('create', new Country());
        $data['country'] = new Country();
        $data['submitRoute'] = "insertCountry";
        return view('cms.country.countryForm',$data);
    }

    public function insert(CountryRequest $request)
    {
        $this->authorize('create', new Country());
        $inputs = $request->except("_token");
        $country = Country::firstOrNew(['name' => $inputs['name']]);
        //$country = Country::updateOrCreate( ['name' => $inputs['name']], $inputs );
        $country->name                  = $inputs['name'];
        $country->country_code          = $inputs['country_code'];
        $country->description           = $inputs['description'];
        $country->iso3                  = $inputs['iso3'];
        $country->currency              = $inputs['currency'];
        $country->currency_symbol       = $inputs['currency_symbol'];
        $country->currency_symbol_html  = $inputs['currency_symbol_html'];
        $country->currency_title        = $inputs['currency_title'];
        $country->allow_po              = isset($inputs['allow_po']);
        $country->charge_vat            = isset($inputs['charge_vat']);
        $country->sales_tax_label       = $inputs['sales_tax_label'];
        $country->exchange_rate         = $inputs['exchange_rate'];
        $country->sales_ratio           = $inputs['sales_ratio'];
        $country->active                = isset($inputs['active']);
        $country->vat_percentage        = $inputs['vat_percentage'];
        $country->vat_amount_elearning  = $inputs['vat_amount_elearning'];
        if(empty($country->created_at))
        {
            if($request->hasFile('image')){
                $imageName = "flag-".$country->country_code.'.'.$request->file('image')->getClientOriginalExtension();
                $request->file('image')->move(public_path($country->image_path), $imageName);
                $country->image = $imageName;
            }
           
            $country->save(); 
            \Session::flash('success', 'Country created!'); 
        }
        else{// updation not allowed inside insert function
            \Session::flash('failure', 'Duplicate Country found!'); 
        }
        

        return redirect()->back();
    }

    public function edit(Country $country_code)
    {
        $country = $country_code;
        $this->authorize('update',$country);
        $data['submitRoute'] = array('updateCountry',$country->id);
        $data['country'] = $country;
        
        return view("cms.country.countryForm",$data);
    }

    public function update(Country $country_code,CountryRequest $request)
    {
        $country = $country_code;
        $this->authorize('update', $country);
        $inputs = $request->all();
        $country->name                  = $inputs['name'];
        $country->country_code          = $inputs['country_code'];
        $country->description           = $inputs['description'];
        $country->iso3                  = $inputs['iso3'];
        $country->currency              = $inputs['currency'];
        $country->currency_symbol       = $inputs['currency_symbol'];
        $country->currency_symbol_html  = $inputs['currency_symbol_html'];
        $country->currency_title        = $inputs['currency_title'];
        $country->allow_po              = isset($inputs['allow_po']);
        $country->charge_vat            = isset($inputs['charge_vat']);
        $country->sales_tax_label       = $inputs['sales_tax_label'];
        $country->exchange_rate         = $inputs['exchange_rate'];
        $country->sales_ratio           = $inputs['sales_ratio'];
        $country->active                = isset($inputs['active']);
        $country->vat_percentage        = $inputs['vat_percentage'];
        $country->vat_amount_elearning  = $inputs['vat_amount_elearning'];
        
        if($request->hasFile('image')){
            $imageName = "flag-".$country->country_code.'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path($country->image_path), $imageName);
            $country->image = $imageName;
        }
        if($inputs['removeimagetxt']!=null)
        {
            $country->image = null;
        }
        
        $country->save();
        if(!empty($country->name))
        \Session::flash('success', 'Country updated!'); 
        return redirect()->route('countryList');
    }

    public function delete(Country $country_code)
    {
        $country = $country_code;
        $this->authorize('delete',$country);
        $country->delete();
    }

    public function getLocations(Request $request)
    {
        $id = $request->get('country');
        return Country::find($id)->locations()->withoutGlobalScope('order')->orderBy('name')->get()->toJson();
    }

    public function countrytrashList()
    {
        $this->authorize('view', new Country());
        $data['trashedCountries'] = Country::onlyTrashed()->get();
 
        return  view('cms.trashed.countryTrashedList',$data);
       
    }

    public function restoreCountry($country_code)
    {
        $this->authorize('restore', new Country());
        
        Country::onlyTrashed()->where('country_code', $country_code)->restore();
        return back()->with('success','Successfully Restored');

    }
    public function forceDeleteCountry($country_code)
    {
        $this->authorize('forceDelete', new Country());
        Country::onlyTrashed()->where('country_code', $country_code)->forceDelete();

 
        return back()->with('success','permanently deleted');


    }
    
}