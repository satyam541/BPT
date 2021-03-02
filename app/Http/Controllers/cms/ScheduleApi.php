<?php


namespace App\Http\Controllers\cms;

use App\Models\ActivityStatus;
use App\Models\CourseAddon;
use App\Models\OnlinePrice;
// use App\Models\Country;
use App\Models\Course;
use App\Models\Schedule;
use App\Models\CustomSchedulePrice;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
// use Illuminate\Support\Facades\Storage;
// use GuzzleHttp\Psr7;
// use GuzzleHttp\RequestOptions;
// use GuzzleHttp\Pool;
// use GuzzleHttp\Exception\RequestException;
// use Psr\Http\Message\ResponseInterface;
// use GuzzleHttp\Middleware;
// use Activity;
use Carbon\Carbon;


class ScheduleApi extends Controller
{
    /**
     * return api data as array
     * fetch api data for given country and year
     */
    private $country;
    private $year;
    
    /**
     * @return bool
     */
    public function check_fetch_status():bool
    {
        $activity = ActivityStatus::where('activity', 'schedule_fetching')->first();
        if(empty($activity))
        {
            return false;
        }
        $now = Carbon::now()->timezone("Asia/Kolkata");
        $last_updated = Carbon::parse($activity->updated_at);
        $status = $activity->status;
        if($status == 1)
        {
            if($last_updated->diffInMinutes($now) > 60)
            {
                return false;
            }
            return true;
        }
        return $status;
    }

    public function set_fetch_status($status = null)
    {
        if(request()->has('status'))
        {
            $status = request()->get('status');
        }
        if(empty($status)){
            return false;
        }
        $activity               =   ActivityStatus::where('activity', 'schedule_fetching')->first();
        $activity->status       =   (request()->get('status') == 'stop')?0:1;
        $activity->message      =   Carbon::now();
        $activity->save();
    }

    public function fetchApiData($countryid, $year, $month)
    {
        // $result = Storage::disk('dump')->get('apiResponse.json');
        // return json_decode($result,true);
        $this->updateApiProcess('month', $month);
        $this->updateApiProcess('status', 'Fetching Data From API');
        if ($countryid == 'gb') {
            $countryid = 'uk';
        }
        $url = "https://www.theknowledgeacademy.com/_engine/scripts/course-data-api.php?country=" . $countryid . "&year=" . $year . "&month=" . $month;
        $client = new Client(['verify' => false]);
        $response = $client->request('GET', $url, ['proxy' => env('PROXY_URL')]);
        $results = json_decode((string) $response->getBody(), true);   
        return $results;

    }

    public function processAPI(Request $request)
    {
        ini_set('max_execution_time', "-1");
        ini_set("memory_limit", "-1");
        $this->validate($request, [
            'CountryID' => 'required',
            'EventYear' => 'required',
        ]);
        $input = $request->all();
        $this->country = strtolower($input['CountryID']); //strtolower($this->input->post('CountryID'));

        // $get_country_data = Country::where('id',$countryid)->get();
        $this->year = $input['EventYear'];
        /*
        deleting all api Schedules before adding new from api
        */
        $currentyear=Carbon::now()->year;
        Schedule::where(['country_id' => $this->country, 'source' => 'API'])->where(DB::raw('YEAR(response_date)'), $this->year)->forceDelete();
        if($currentyear==$this->year)
        {
             $currentmonth=Carbon::now()->month;

        }   
        else
        {

             $currentmonth=1;
        }
     
       for($month=$currentmonth; $month<=12; $month++)
       {
               $results = $this->fetchApiData($this->country, $this->year, $month);
               $this->storeData($results);

        }

        Session::flash('success', 'Successfully Fetched All Schedules.');
        $this->updateApiProcess('status', 'Copy for locations');
        $this->copyScheduleForLocation();

        $this->updateApiProcess('status', 'destroy');
        $this->set_fetch_status(false);
        // return Redirect('/admin/schedules');
    }

    private function storeData($results)
    {
        $insert_success = false;

        $API['country_id'] = $this->country;
        $API['event_time'] = "10:00:00";

        if (empty($results)) {
            $this->updateApiProcess('status', 'No data received from API');
            return false;
        }

        /* 
         loop to execute each course
        */
        $this->updateApiProcess('status', 'Processing');
        $totalResults = count($results);
        $resultIteration = 1;
        $data = array();

        foreach ($results as $coursename => $courselocations) {

            $this->updateApiProcess('first', $coursename, $totalResults, $resultIteration++);

            $API['response_course_id'] = $courselocations['courseId'];
            unset($courselocations['courseId']);

            $API['response_course_name'] = $coursename;
            $courses = Course::with('customSchedulePrice')->where('tka_name', $coursename)->get();

            if ($courses->isEmpty()) {
                continue;
            }
             
            foreach ($courses as $course) {
                $API['course_id'] = $course->id;
                $API['duration'] = $course->duration;

                /**
                 * save online price and addons for selected course
                 */
                if (isset($courselocations['onlinePrice'])) {
                    $addons = $courselocations['onlinePrice']['addons'] ?? array();
                    $this->updateApiProcess('second', 'onlinePrice', 1, 1);
                    $this->saveOnlineCoursePrice(
                        $courselocations['onlinePrice']['price'],
                        $course,
                        $addons
                    );
                    unset($courselocations['onlinePrice']);
                }

                array_shift($courselocations);

                /**
                 * a loop to execute each location for the course
                 */
                $totalLocations = count($courselocations);
                $locationIteration = 2;
                foreach ($courselocations as $responseLocation => $eventData) {

                    $this->updateApiProcess('second', $responseLocation, $totalLocations, $locationIteration++);

                    if ($responseLocation == 'orderSeq') continue;
                    if (strtolower($responseLocation) == "virtual") {
                        $locationId = 0;
                    } else {
                        $location = Location::where('name', $responseLocation)->where('country_id', $this->country)->where('fetch_schedule', 1)->first();

                        if (empty($location)) {
                            continue;
                        }
                      $locationId = $location->id;
                       
                        
                    }

                    $API['location_id'] = $locationId;
                    // $API['location_id'] = $location->id;
                    $API['response_town_city_id'] = $eventData['towncityId'];
                    $API['response_location'] = $responseLocation;

                    $customSchedulePrice = CustomSchedulePrice::where('course_id', $course->id)
                        ->where('location_id', $locationId)->first();

                    /**
                     * loop to execute all dates for the location
                     */
                    $totalDates = count($eventData['dates']);
                    $dateIteration = 1;
                    foreach ($eventData['dates'] as $coursedate => $price) {
                        $this->updateApiProcess('last', $coursedate, $totalDates, $dateIteration++);
                        $API['response_date'] = $coursedate;
                        $API['response_price'] = $price['price'];
                        $API['response_discounted_price'] = $price['discountedPrice'];
                        $API['source'] = 'API';

                        $API['event_price'] = $this->getEventPrice($customSchedulePrice, $course, $responseLocation, $API['response_discounted_price']);
                        $data[] = $API;
                    }
                }
                // dd($data);
                if (!empty($data))
                     Schedule::insert($data);
                unset($data);
            }
        }
    }

    /**
     * return price with expected increment
     * for classroom schedules
     */
    public function getEventPrice($scheduleData, $course, $location, $price)
    {
        $eventPrice = '';
        if (!empty($scheduleData)) {

            if ($scheduleData->method == 'Increment') {
                $eventPrice = round($price + $scheduleData->amount);
            } elseif ($scheduleData->method == 'Price') {
                $eventPrice = round($scheduleData->amount);
            } else {
                $temp = ($scheduleData->amount * $price) / 100;
                $eventPrice = round($price + $temp);
                unset($temp);
            }
        } elseif (!empty($course->customSchedulePrice)) {

            if ($course->customSchedulePrice->method == 'Increment') {
                $eventPrice = round($price + $course->customSchedulePrice->amount);
            } elseif ($course->customSchedulePrice->method == 'Price') {
                $eventPrice = round($course->customSchedulePrice->amount);
            } else {
                $temp = ($course->customSchedulePrice->amount * $price) / 100;
                $eventPrice = round($price + $temp);
                unset($temp);
            }
        } else {

            if ($location == "Reading" || $location == "Brighton" || $location == "Southampton") {
                $eventPrice = floor($price);
            } else { // apply default 10 percent increment to all location
                $percentage = 10;
                $new_incrementedAmount = ($percentage / 100) * $price;
                // $eventPrice = $price + $get_country_data[0]['incrementedAmount'];
                $eventPrice = floor($price + $new_incrementedAmount);
            }
        }

        return $eventPrice;
    }

    /*
    ** save online price for the given course
    ** and also call save addons with the onlinepriceid
    */
    public function saveOnlineCoursePrice($price, $course, $addons)
    {
        if (empty($price)) {
            return FALSE;
        }
        $courseid = $course->id;
        
        $onlinePrice = OnlinePrice::firstOrNew(['course_id' => $courseid]);
        $percentage = 10;
        $new_incrementedAmount = ($percentage / 100) * $price;
        $onlinePrice['price'] =  round($price + $new_incrementedAmount);
        $onlinePrice['type']  =  'Online';
        $onlinePrice['component'] =  'Basic';
        $onlinePrice['course_id'] = $courseid;
        $onlinePrice->save();
    
  

        if (!empty($addons))
            $this->saveOnlineCourseAddons($addons, $course);
    }

    /*
    ** save addons related to given onlinepriceid
    */
    public function saveOnlineCourseAddons($addons, $course)
    {
      
        if (empty($addons)) {
            return FALSE;
        }
        
      
        $totalAddons = count($addons, COUNT_RECURSIVE) - count($addons);
        $addonIteration = 1;
        foreach ($addons as $addonType => $addOnData) {
           
           
            foreach ($addOnData as $responseid => $responseData) {
                $this->updateApiProcess('last', 'addon', $totalAddons, $addonIteration);
                $percentage = 10;
                $new_incrementedAmount = ($percentage / 100) * $responseData['price'];

                $data = array();
                $data["addon_type"] = $addonType;
            
                $courseAddon =  CourseAddon::updateOrCreate(
                    [
                        'name'        =>  $responseData['name'],
                        'addon_type' => $addonType
                    ],
                    [
                        'description' => $responseData['description'],
                        'price'      =>  round($responseData['price'] + $new_incrementedAmount)
                    ]
                  
                   
                );
             
               
                $course->courseAddon()->syncWithoutDetaching($courseAddon->id);


            }
        }
       
    }


    private function copyScheduleForLocation()
    {
        $locations = Location::all();

        $data = array();
        $totalLocations = $locations->count();
        $currentLocation = 1;
        foreach ($locations as $location) {
            $this->updateApiProcess('first', $location->name, $totalLocations, $currentLocation++);
            // find locations with inherit id =  locations
            $targetLocations = Location::where('inherit_schedule', $location->id)->get();
            if ($targetLocations->isEmpty()) {
                continue;
            }
            $schedules = Schedule::where('location_id', $location->id)->whereYear('response_date', $this->year)->where('country_id', $this->country)->get();
            if ($schedules->isEmpty()) {
                continue;
            }
            $totalTargetLocations = $targetLocations->count();
            $currentTargetLocation = 1;
            foreach ($targetLocations as $targetLocation) {

                $this->updateApiProcess('second', $targetLocation->name, $totalTargetLocations, $currentTargetLocation++);
                $targetSchedules = Schedule::where('location_id', $targetLocation->id)->whereYear('response_date', $this->year)->where('country_id', $this->country)->get();
                if ($targetSchedules->isNotEmpty()) {
                    // check if target locations has schedule 
                    Schedule::where('location_id', $targetLocation->id)->whereYear('response_date', $this->year)->where('country_id', $this->country)->forceDelete();
                    // Schedule::where(['country_id'=>$this->country, 'source'=>'API'])->where(DB::raw('YEAR(response_date)'),$this->year)->forceDelete();
                }
                // copy schedule from location to target locations
                $copy = array();
                $totalSchedules = $schedules->count();
                $currentSchedule = 1;
                foreach ($schedules as $schedule) {
                    $this->updateApiProcess('last', 'schedule', $totalSchedules, $currentSchedule++);
                    $copy['country_id'] = $this->country;
                    $copy['event_time'] = $schedule['event_time'];
                    $copy['response_course_id'] = $schedule['response_course_id'];
                    $copy['response_course_name'] = $schedule['response_course_name'];

                    $copy['course_id'] = $schedule['course_id'];
                    $copy['duration'] = $schedule['duration'];
                    $copy['location_id'] = $targetLocation->id;
                    $copy['response_town_city_id'] = $schedule['response_town_city_id'];
                    $copy['response_location'] = $targetLocation->name;
                    $copy['response_date'] = $schedule['response_date'];
                    $copy['response_price'] = $schedule['response_price'];
                    $copy['response_discounted_price'] = $schedule['response_discounted_price'];
                    $copy['source'] = "Copy of location " . $location->name;

                    $copy['event_price'] = $schedule['event_price'];
                    $data[] = $copy;
                }
                Schedule::insert($data);
                $data = array();
            }
        }
    }

    public function updateApiProcess($key, $name, $total = 0, $current = 0)
    {
        $status = session()->get('schedule_api_status', array());
        if ($key == "status") {
            if ($name == "destroy") {
                session()->forget('schedule_api_status');
                return TRUE;
            }
            $status['status'] = $name;
        }
        else if($key == "month")
        {
            $status['month'] = $name;
        }
        else if($key == "break")
        {
            $status['break'] = $name;
        } 
        else {
            if (empty($status[$key])) {
                $status[$key] = array();
            }
            if ($key == 'first') {
                $status['second'] = $status['last'] = null;
            }
            if ($key == 'second') {
                $status['last'] = null;
            }
            $status[$key]['name'] = $name;
            $status[$key]['total'] = $total;
            $status[$key]['current'] = $current;
        }
        session()->put('schedule_api_status', $status);
        session()->save();
    }
}