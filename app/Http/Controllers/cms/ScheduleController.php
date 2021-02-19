<?php

namespace App\Http\Controllers\cms;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Venue;
use App\Models\CustomSchedulePrice;
use Carbon\Carbon;
use App\Models\Schedule;
use App\Models\Country;
use App\Http\Requests\cms\ScheduleRequest;
use App\Models\Location;
use App\Models\OnlinePrice;

class ScheduleController extends ScheduleApi
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

    public function getLocationsForCountry(Request $request)
    {
      return Schedule::where('country_id',$request->get('country','gb'))
      ->orderBy('response_location')->get()
      ->pluck('response_location','response_location')
      ->toJson();
    }

    public function list(Request $request)
    {
      // $this->authorize('view', new Schedule());
      // use when instead of if else statement here
      $schedules = Schedule::with('course','location')->where('source','API')->get();
      
      return view('cms.schedule.schedules',compact('schedules'));
    }

    public function create()
    {
      // $this->authorize('create', new Schedule());
      $data["schedule"]     = new Schedule();
      $data["submitRoute"]  = "insertSchedule";

      $list["courses"]      = Course::pluck("name","id")->toArray();
      $list["countries"]    = Country::has('locations')->pluck("name","country_code")->toArray();
      $list["locations"]    = array();

      $data['list']         = $list;
      // required input fields
      //course, country, location,venue, date , time, duration , eventprice 
      return view('cms.schedule.scheduleFormMultiple',$data);
    }

    public function insert(ScheduleRequest $request)
    {
      // $this->authorize('create', new Schedule());
      $inputs   = $request->all();
      $course   = Course::find($inputs['course_id']);
      $dates    = explode(",",$inputs['response_date']);
      foreach($inputs['location'] as $loc){
        foreach($dates as $date){
          $location = Location::with('venues')->where('name','like',"%".$loc."%")->first();
          $schedule = new Schedule();
          $schedule->response_course_id         = $inputs['course_id'];
          $schedule->course_id                  = $inputs['course_id'];
          $schedule->response_course_name       = $course->name;
          // $schedule->response_venue_id          = $location->venues->first()->id;
          // $schedule->venue_id                   = $location->venues->first()->id;
          $date=date_create($date);
          $date=date_format($date,"Y-m-d");
          $schedule->response_location          = $location->name;
          $schedule->response_date              = $date;
          $schedule->response_price             = $inputs['event_price'];
          $schedule->response_discounted_price  = $inputs['event_price'];
          $schedule->country_id                 = $inputs['country_id'];
          $schedule->event_time                 = $inputs['event_time'];
          $schedule->event_price                = $inputs['event_price'];
          $schedule->duration                   = $inputs['duration'];
          $schedule->source                     = "cms";
          $schedule->save();
        }
      }
      
      return redirect()->route('manualScheduleList')->with('success','New Schedule created!');
    }

    public function edit(Schedule $schedule)
    {
      // $this->authorize('update', $schedule);
      $data['schedule']         = $schedule;
      $data['response_location']=$schedule->location();
      $data["submitRoute"]      = array("updateSchedule",$schedule->id);

      $list["courses"]          = Course::pluck("name","id")->toArray();
      $list["countries"]        = Country::pluck("name","country_code")->toArray();
      $list["locations"]        = Location::pluck("name","id")->toArray();

      $data['list']             = $list;
      // required input fields
      //course, country, location,venue, date , time, duration , eventprice 
      return view('cms.schedule.scheduleForm',$data);

    }

    public function update(ScheduleRequest $request,Schedule $schedule)
    { 
      // $this->authorize('update', $schedule);
      $inputs   = $request->all();

      $course   = Course::find($inputs['course_id']);
      $location = Location::with('venues')->find($inputs['location']);

      // $schedule = new Schedule();
      $schedule->response_course_id         = $inputs['course_id'];
      $schedule->course_id                  = $inputs['course_id'];
      $schedule->response_course_name       = $course->name;
      // $schedule->response_venue_id          = $location->venues->first()->id;
      // $schedule->venue_id                   = $location->venues->first()->id;
      $schedule->response_location          = $location->name;
      $schedule->response_date              = $inputs['response_date'];
      $schedule->response_price             = $inputs['event_price'];
      $schedule->response_discounted_price  = $inputs['event_price'];
      $schedule->country_id                 = $inputs['country_id'];
      $schedule->event_time                 = $inputs['event_time'];
      $schedule->event_price                = $inputs['event_price'];
      $schedule->duration                   = $inputs['duration'];
      $schedule->source                     = "cms";
      $schedule->save();

      return back()->with('success','Schedule updated!');
    }

    public function delete(Schedule $schedule)
    {
      $this->authorize('delete', $schedule);
      $result = $schedule->delete();
    }

    // fetch schedule form page
    public function getSchedule()
    {
      $list["countries"]  = Country::where('active', 1)->pluck("name","country_code")->toArray();
      $data['list']       = $list;
      return view('cms.schedule.fetchSchedule',$data);
    }

    public function fetch(Request $request)
    {
        $this->processAPI($request);
        return 'true';
    }

    public function ApiStatus(Request $request)
    {
      $status = array('status'=>'idle');
      if (session()->has('schedule_api_status')) {
          $status = session()->get('schedule_api_status');
      }
      return json_encode($status);
    }

    public function manageCoursePrice()
    {
      // $this->authorize('update', new Schedule());
      $data['courses'] = Course::with('customSchedulePrice')->get();
      return view('cms.schedule.managePrice',$data);
    }

    public function manageSchedulePrice(Request $request, $courseId)
    {
      $this->authorize('update', new Schedule());
      $selectedCountry    = $request->input('country', 'gb');
      $selectedCourse     = $request->input('course',$courseId);    
      $list['courses']    = Course::pluck('name','id')->toArray();
      $list['countries']  = Country::pluck('name','country_code')->toArray();

      $data['locations']  = Location::with("venue.customSchedulePrice")->where("country_id",$selectedCountry)->get();
      $data['course']     = Course::find($courseId);
      $data['selectedCourse']   = $selectedCourse; 
      $data['selectedCountry']  = $selectedCountry; 
      $data['list']       = $list;
      return view('cms.schedule.manageSchedulePrice',$data);
    }

    public function updateCustomPrice(Request $request,$courseId, $venue = null)
    {
      $input = $request->all();
      $customize = CustomSchedulePrice::firstOrNew(array('course_id'=>$courseId,'venue_id'=>$venue));
        if(empty($input['method']) || empty($input['amount']))
        {
          $customize->delete();
        }
        else
        {
          $customize->method = $input['method'];
          $customize->amount = $input['amount'];
          $customize->save();
        }
        return back();
    }

    public function test(Request $request)
    {
      // testing required for
      // online_price
      // course_addon
      
    }

    public function onlinePrices()
    {
      // $this->authorize('create', new Schedule());
      $data['onlinePrices'] = OnlinePrice::all();
      return view('cms.schedule.onlinePrices',$data);
    }

    public function updateOnlinePrice(Request $request,$onlineId)
    {
      $input       = $request->all();
      $onlinePrice = OnlinePrice::find($onlineId);
      if($request->filled('amount'))
      {
        $onlinePrice->update(array('price'=>$request->amount));
      }
      else
      {
        $onlinePrice->update(array('price'=>0));
      }
      return back();
    }

    public function courseAddon(Request $request,OnlinePrice $online)
    {
      $addons = $online->addOns;
      $data['addons'] = $addons;
      return view('cms.schedule.courseAddons',$data);
    }

    public function manualschedulelist(Request $request)
    { 
      $schedules            = Schedule::whereHas('course')->with('course')->where('source','cms')->get();
       return view('cms.schedule.manualschedulelist',compact('schedules'));
    }


    public function   deletemanualschedule(Schedule $schedule)
    {
      $this->authorize('delete', $schedule);
      $result = $schedule->delete();
    }

    public function editmanualschedule(Schedule $schedule)
    {

      $this->authorize('update', $schedule);
      $data['schedule']     = $schedule;
      $data["submitRoute"]  = array("updateSchedule",$schedule->id);

      $list["courses"]      = Course::pluck("name","id")->toArray();
      $list["countries"]    = Country::pluck("name","country_code")->toArray();
      $list["locations"]    = Location::pluck("name","id")->toArray();

      $data['list']         = $list;
      return view('cms.schedule.editSchedule',$data);

    }


    public function updateManualSchedule(ScheduleRequest $request,Schedule $schedule)
    { 
      $this->authorize('update', $schedule);
      $inputs   = $request->all();

      $course   = Course::find($inputs['course_id']);
      $location = Location::with('venues')->find($inputs['location']);

      // $schedule = new Schedule();
      $schedule->response_course_id         = $inputs['course_id'];
      $schedule->course_id                  = $inputs['course_id'];
      $schedule->response_course_name       = $course->name;
      $schedule->response_venue_id          = $location->venues->first()->id;
      $schedule->venue_id                   = $location->venues->first()->id;
      $schedule->response_location          = $location->name;
      $schedule->response_date              = $inputs['response_date'];
      $schedule->response_price             = $inputs['event_price'];
      $schedule->response_discounted_price  = $inputs['event_price'];
      $schedule->country_id                 = $inputs['country_id'];
      $schedule->event_time                 = $inputs['event_time'];
      $schedule->event_price                = $inputs['event_price'];
      $schedule->duration                   = $inputs['duration'];
      $schedule->source                     = "cms";
      $schedule->save();

      return back()->with('success','Schedule updated!');
    }
}
