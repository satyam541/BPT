<?php

namespace App\Http\Controllers\cms;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;
use App\Models\Country;
use App\Http\Requests\cms\VenueRequest;
use App\Models\Location;
use App\Models\Venue;

class VenueController extends Controller
{
    private $Image_prefix;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
        $this->Image_prefix = "venueImage";
		// $this->middleware('access:role,insert')->only('insertRole');
    }

    public function list()
    {
        // $this->authorize('view', new Venue());

        
        $venues         =    Venue::all();

        return view('cms.venue.venueList',compact('venues'));
    }

    public function create()
    {
        // $this->authorize('create', Venue::class);
        $data['venue'] = new Venue();
        $data['submitRoute'] = "insertVenue";
        $data['locations'] = Location::withoutGlobalScope('venues')->get()->pluck('name','id')->toArray();
        return view('cms.venue.venueForm',$data);
    }

    public function insert(VenueRequest $request)
    {
        // $this->authorize('create', Venue::class);
        $inputs = $request->except("_token");
        $venue = new Venue();
        $venue->name                = $inputs["name"];
        $venue->location_id         = $inputs['location_id'];
        $venue->address             = $inputs['address'];
        $venue->phone               = $inputs['phone'];
        $venue->email               = $inputs['email'];
        $venue->longitude           = $inputs['longitude'];
        $venue->latitude            = $inputs['latitude'];
        $venue->introduction        = $inputs['introduction'];
        $venue->description         = $inputs['description'];
        $venue->meta_title          = $inputs['meta_title'];
        $venue->meta_description    = $inputs['meta_description'];
        
        if($request->hasFile('image')){
            $imageName = $this->Image_prefix.Carbon::now()->timestamp.'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path($venue->image_path), $imageName);
            $venue->image = $imageName;
        }

        $venue->save();
        if(!empty($venue->id))
        \Session::flash('success', 'Venue created!');

        return redirect()->back();
    }

    public function edit(Venue $venue)
    {
        // $this->authorize('update',$venue);
        $data['venue'] = $venue;
        $data['submitRoute'] = array('updateVenue',$venue->id);
        $data['locations'] = Location::withoutGlobalScope("venues")->get()->pluck('name','id')->toArray();
        return view("cms.venue.venueForm",$data);
    }

    public function update(Venue $venue,VenueRequest $request)
    {
        // $this->authorize('update', $venue);
        $inputs = $request->except("_token");
        $venue->name                = $inputs["name"];
        $venue->location_id         = $inputs['location_id'];
        $venue->address             = $inputs['address'];
        $venue->phone               = $inputs['phone'];
        $venue->email               = $inputs['email'];
        $venue->longitude           = $inputs['longitude'];
        $venue->latitude            = $inputs['latitude'];
        $venue->introduction        = $inputs['introduction'];
        $venue->description         = $inputs['description'];
        $venue->meta_title          = $inputs['meta_title'];
        $venue->meta_description    = $inputs['meta_description'];
        
        if($request->hasFile('image')){
            $imageName = $this->Image_prefix.Carbon::now()->timestamp.'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path($venue->image_path), $imageName);
            $venue->image = $imageName;
        }
        $venue->save();
        if(!empty($venue->id))
        \Session::flash('success', 'Venue updated!'); 

        return redirect()->back();
    }

    public function delete(Venue $venue)
    {
        $venue->delete();
    }

    
   public function venuetrashList()
   {
    // $this->authorize('view', new Venue());
    $data['trashedVenues'] = Venue::onlyTrashed()->get();
 

    return  view('cms.trashed.venueTrashedList',$data);
       
   }

   public function restoreVenue($id)
   {
    // $this->authorize('restore', new Venue());
        $venue = Venue::onlyTrashed()->find($id)->restore();
 
       return back()->with('success','Successfully Restored');

   }
   public function forceDeleteVenue($id)
   {
    // $this->authorize('forceDelete', new Venue());
        $venue = Venue::onlyTrashed()->find($id)->forceDelete();
 
       return back()->with('success','Permanently Deleted');


   }
}