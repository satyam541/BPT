<?php

namespace App\Http\Controllers\cms;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Models\Country;
use App\Models\Course;
use App\Models\Location;
use App\Models\Popular;
use App\Models\Topic;

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

        $data['module']   = ['course'=>'course','article'=>'article','category'=>'category','location'=>'location','topic'=>'topic'];
    
        return view('cms.popular.list',$data);
    }

    public function getModuleData(Request $request)
    {
        
        $module = $request->module;

        switch ($module) {
            case 'course':
                $data = Course::doesntHave('popular')->pluck('name', 'id');
                break;
            case 'article':
                $data = Article::doesntHave('popular')->pluck('title', 'id');
                break;
            case 'topic':
                $data = Topic::doesntHave('popular')->pluck('name', 'id');
                break;
            case 'category':
                $data = Category::doesntHave('popular')->pluck('name', 'id');
                break;
            case 'location':
                $data = Location::doesntHave('popular')->pluck('name', 'id');
                break;
        }
        return $data;
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

    public function insert(Request $request)
    {
        $display_order = Popular::where('module_type', $request->module_type)->max('display_order');
        $popular = new Popular();
        $popular->module_type   = $request->module_type;
        $popular->module_id     = $request->module_id;
        $popular->display_order = $display_order+1;
        $popular->country_id    = country()->country_code;
        $popular->save();
        
        return "done";
    }

    public function delete(Popular $popular)
    {
        $popular->delete();
    }
}