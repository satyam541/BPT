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
        $selectedCountry=country()->country_code;
        $popularItems = Popular::query();
        if($selectedCountry!='ALL'){
            $popularItems=$popularItems->where('country_id',$selectedCountry);
        }
        $data['popularItems'] = $popularItems->get()->groupBy("module_type");

        $data['module']   = ['article','category','course','location','topic'];
        $data['list']     = ['abc','def','ghi'];
        return view('cms.popular.list',$data);
    }

    public function sort(Request $request)
    {
        $module = $request->get('module');
        $items  = $request->get('id');
        $popularItems = Popular::where('module_type',$module)->get();
        foreach($popularItems as $item)
        {
            $item->display_order = array_search($item->id, $items)+1;
            $item->save();
        }
        return "done";
    }

    public function insert($module, $name)
    {
        dd($module, $name);
    }

    public function delete(Popular $popular)
    {
        $popular->delete();
    }
}