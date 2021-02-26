<?php

namespace App\Http\Controllers\cms;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Models\Country;
use App\Models\Popular;

class PopularController extends Controller
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

    public function list(Request $request)
    {
        // Popular::$module()->module;
        $data['popularItems'] = [];
        if($request->session()->has('selectedcountry')){

        $selectedCountry=array_keys(session()->all()['selectedcountry']);  
        $selectedCountry=strtoupper($selectedCountry[0]);
        $data['popularItems'] = Popular::where('country_id',$selectedCountry)->get()->groupBy("module_type");
    }

        return view('cms.popular.list',$data);
    }

    public function sort(Request $request)
    {
        $module = $request->get('module');
        $items = $request->get('id');
        $popularItems = Popular::where('module_type',$module)->get();
        foreach($popularItems as $item)
        {
            $item->display_order = array_search($item->id, $items)+1;
            $item->save();
        }
        return "done";
    }


    public function delete(Popular $popular)
    {
        $popular->delete();
    }
}