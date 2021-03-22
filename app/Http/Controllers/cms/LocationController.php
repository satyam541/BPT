<?php

namespace App\Http\Controllers\cms;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;
use App\Models\Country;
use App\Http\Requests\cms\LocationRequest;
use App\Models\Location;
use App\Models\Region;

class LocationController extends Controller
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

    public function locationTier(Request $request)
    {
        $this->authorize('view', new Location());
        $data      = Location::orderBy('display_order')->get()->groupBy('tier');
       
        // $checked=null;
        // if(isset($request->popular)){
        //     $locations = Location::whereHas('popular')->get();
        //     $checked='checked';
        // }
        return view('cms.location.locationTier',compact('data'));
    }
    public function popular(Request $request){
        $location=Location::find($request->locationId);
        if($request->checked=='checked'){
            $location->popular->delete();    
            return 'removed';
        }
        $location->popular->save();
        return 'added';
    }
    public function list(Request $request)
    {
        $this->authorize('view', new Location());
        $locations       = Location::where('country_id',country()->country_code)->get();
        return view('cms.location.locationList',compact('locations'));
    }

    // public function filterList(Request $request)
    // {
    //     $this->authorize('view', new Location());
    //     $data['locations']       =  Location::where('country_id',$request['country'])->paginate(10);
    //     if($request->country==null){
    //         $data['locations'] = Location::paginate(10);
    //     }
    //     $data['selectedCountry'] = $request['country'];
    //     $list['countries']       = Country::orderBy('name','asc')->pluck('name','country_code')->unique()->filter()->toArray();
    //     $data['list']            = $list;
    //     return view('cms.location.locations',$data);
    // }

    
    // public function demo(){

    //     $courses=Location::all();
    //     foreach($courses as $course){
    //         $course->reference=substr($course->reference, strpos($course->reference, '/'));
    //         $course->save();
    //     }
    //     dd('done');
    // }
    public function create()
    {
        $this->authorize('create', new Location());
           
        $data['locations']      = Location::pluck('name','id')->toArray();
        $data['location']       = new Location();
        $data['popular']        = false;
        $data['submitRoute']    = "insertLocation";
        $data['tier']=['1'=>'1','2'=>'2','3'=>'3'];
        $data['countries']      = Country::pluck('name','country_code')->toArray();
        $data['regions']        = Region::pluck('name','id');
        return view('cms.location.locationForm',$data);
    }

    public function edit(Location $location)
    {
        $this->authorize('update', $location);
        $data['locations']      = Location::pluck('name','id')->toArray();
        $data['submitRoute']    = array('updateLocation',$location->id);
        $data['location']       = $location;
        $data['popular']        = $location->popular();
        $data['tier']           = ['1'=>'1','2'=>'2','3'=>'3'];
        $data['countries']      = Country::pluck('name','country_code')->toArray();
        $data['regions']        = Region::pluck('name','id');
        return view("cms.location.locationForm",$data);
    }

    public function insert(LocationRequest $request)
    {
        $this->authorize('create', new Location());
        
        $inputs                       = $request->except("_token");
        $location                     = array();
        $location['name']             = $inputs['name'];
        $location['country_id']       = $inputs['country_id'];
        $location['region_id']        = $inputs['region_id'];
        $location['address']          = $inputs['address'];
        $location['phone']            = $inputs['phone'];
        $location['email']            = $inputs['email'];
        $location['tier']             = $inputs['tier'];
        $location['intro']            = $inputs['intro'];
        $location['meta_title']       = $inputs['meta_title'];
        $location['meta_description'] = $inputs['meta_description'];
        $location['meta_keywords']    = $inputs['meta_keywords'];
        $location['inherit_schedule'] = $inputs['inherit_schedule'];
        $location['description']      = $inputs['description'];
        $location['fetch_schedule']   = isset($inputs['fetch_schedule']);
        $location['longitude']        = $inputs['longitude'];
        $location['latitude']         = $inputs['latitude'];
        $location['reference']        = encodeUrlSlug($inputs['reference']);

        if($request->file('image')){
            $imageName = 'ImageUrl'.Carbon::now()->timestamp.'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(
                base_path() . '/public/images/', $imageName);
            $input['image']     = $imageName;
            $location['image']  = $imageName;
        }
        if($inputs['removeimagetxt']!=null)
        {
            $location['image'] = null;
        }
        $data=Location::updateOrCreate(['id' =>$inputs['id']],$location);
        
        if(isset($inputs['is_popular']))
        {
            $data->popular->save();
        }
        else
        {
            $data->popular->delete();
        }
        return redirect()->route('locationList')->with('success','Operation done!');
    }

    public function delete(Location $location)
    {
        $this->authorize('delete', $location);
        $location->delete();
    }

    /**
     * @return all regions for country
     */
    public function getRegion(Request $request)
    {
        $data = Region::pluck('name')->toArray();
        return response()->json($data);
    }

        
   public function locationtrashList()
   {
        $this->authorize('view', new Location());
        $data['trashedLocations'] = Location::onlyTrashed()->get();

        return view('cms.trashed.locationTrashedList',$data);
       
   }

   public function restoreLocation($id)
   {
        $this->authorize('restore', new Location());
        Location::onlyTrashed()->find($id)->restore();
 
        return back()->with('success','Successfully Restored');

   }

   public function forceDeleteLocation($id)
   {
        $this->authorize('forceDelete',new Location);
        Location::onlyTrashed()->find($id)->forceDelete();
 
        return back()->with('success','Permanently Deleted');
   }

   public function sortTier(Request $request)
   {
    $inputs     =   $request->input();
    $location   =   $inputs['sort']['location'];
    $tier       =   $inputs['sort']['tier'];
    
    unset($inputs['sort']['location']);
    unset($inputs['sort']['tier']);
    $sort       =   $inputs['sort'];
    $location = Location::find($location);
    $location->tier = $tier;
    $location->save();
    foreach($sort as $index=>$location)
    {
        $location = Location::find($location);
        $location->display_order = $index+1;
        $location->save();
    }
    return "success";
   }
}