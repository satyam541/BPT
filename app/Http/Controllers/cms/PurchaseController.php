<?php

namespace App\Http\Controllers\cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\NetworkonlinePayment;
use App\Models\EmailRequest;
// use App\Models\Customerbillingdetails;
use App\Models\BillingDetail;
use App\Models\Country;
use App\Models\Course;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderLineItem;
use App\Models\Schedule;
use App\Models\Venue;
use Session;
use App\Http\Requests\cms\ManualPurchaseRequest;
use App\Models\Location;

class PurchaseController extends Controller
{
    public function index() {
        
        $courses = Course::all();
        // dd($courses);
        $countries = Country::orderBy('name')->get();
        
        return view('cms.purchase.purchaseForm', compact('courses', 'countries'));
    }
    
    public function viewDetails() {
        
        $courses = EmailRequest::with('course')
                    ->orderBy('created_at', 'DESC')
                    ->get();
        
        return view('cms.purchase.viewPurchase', compact('courses'));
        
    }
    
    public function addPurchase(ManualPurchaseRequest $request) {
     
          $input  = $request->all();
            $events = empty($input['events'])? array() : explode("_", $input['events']);
            $course = Course::find($input['courseId']);

            if(empty($events))
            {
                // save new schedule in schedule table
                $eventDate = $input['eventDate'];
                $eventTime = "";
                $schedule = new Schedule();
                $schedule->response_course_id = 0;
                $schedule->course_id = $input["courseId"];
                $schedule->response_course_name = $course->name;
                $schedule->response_venue_id = 0;
                $schedule->venue_id = 0;
                $schedule->response_location = $input["location"];
                $schedule->response_date = $input["eventDate"];
                $schedule->response_price = $input["price"];
                $schedule->response_discounted_price = $input["price"];
                $schedule->country_id = $input["country"];
                // $schedule->event_time = "10:00";
                $schedule->event_price = $input["price"];
                $schedule->source = "cms";
                $schedule->save();
                $scheduleId = $schedule->id;

            }
            else{
                $eventDate = $events['1'];
            
                $eventTime = $events['2'];
                $scheduleId = $events['3'];
                $schedule = Schedule::find($scheduleId);
                
            }

            $emailRequest = new EmailRequest();

            $emailRequest->email        =   $input['email'];
            $emailRequest->price        =   $input['totalAmount'];
            $emailRequest->course_id    =   $input['courseId']; // foreign key
            $emailRequest->country      =   $input['country'];
            $emailRequest->location     =   $input['location'];
            $emailRequest->currency     =   $input['currency'];
            $emailRequest->event_date   =   $eventDate;
            // $emailRequest->event_time   =   $eventTime;
            $emailRequest->save();
            
            /**
             * save customer detail and order details
             */
            $customerId = $this->saveCustomerDetail(array('FirstName'=>$input['name'],'EmailID'=>$input['email']));
            $billingData = $this->saveBillingData($input,$customerId);
            if(!empty($customerId))
            {// pass vat amount and grandtotal
                $orderId = $this->saveOrderData($input['price'],$scheduleId,$customerId,$input['vatPercentage'],$input['vatAmount'],$input['totalAmount']);
            }

            $emailRequest->order_id = $orderId;
            $emailRequest->save();

            $timestamp = strftime("%Y%m%d%H%M%S");  
            $gatewayOrderId = $orderId.$timestamp;
            
            $order = Order::find($orderId);
            $order->update(['gateway_order_id'=>$gatewayOrderId,'billing_id'=>$billingData->id,'country_id'=>$input['country']]);

            // $responseUrl = \Illuminate\Support\Facades\URL::to('admin/purchase/store');            
            // $urlArray = $this->getFormValues($input['totalAmount'], $responseUrl,$gatewayOrderId,$input["currency"],$input);

            $emailData['name'] = $input['name'];
            $emailData["vatPercentage"] = $order->vat_percentage;
            $emailData["vatAmount"] = $order->vat_amount;
            $emailData["basePrice"] = $order->sub_total;
            $emailData["totalAmount"] = $order->grand_total;
            $emailData['email'] = $input['email'];
            $emailData['courseName'] = $course->name;
            $emailData['location'] = $input["location"];
            $emailData['eventDate'] = $input["eventDate"];
            $emailData['currency'] = $emailRequest->currency;
            $emailData['link'] = route('BookingDetail',array('id'=>$gatewayOrderId))."#bookingDetail"; 
            $message = (string) \View::make('cms.purchase.purchaseEmail',$emailData);
            
            $this->sendEmail( $message, 'Payment Link Form', $input['email'] );
            
            Session::flash('message', 'Record Save & Email send to user successfully'); 
            Session::flash('paymentLink',$emailData['link']);
            Session::flash('alert-class', 'text text-success'); 
            
            return Redirect()->back();
            
    }
    public function purchaseList(){
        $purchases=Order::whereNotNull('gateway_order_id')->with('customer')->get();
        return view('cms.purchase.purchases',compact('purchases'));
        
    }
    public function bookingDetail($gatewayorderId)
    {
        $order = Order::where('gateway_order_id',$gatewayorderId)->first();
        if(empty($order))
        {
            return 'order not found';
            return abort(404);
        }
        $orderLineItem = OrderLineItem::where('order_id',$order->id)->first();
        if(empty($orderLineItem))
        {
            return 'no schedule id for orderlineitem';
           return abort(404);
        }
        // $schedule = Schedule::find($orderLineItem->first()->schedule_id);
        $customer = Customer::find($order->customer_id);
        $emailRequest = EmailRequest::where('order_id',$order->id)->first();
        $billingData = BillingDetail::find($order->billing_id);
            /**
             * create template for email
             */
            $responseUrl = route('cartResponseRoute');
            $urlArray = $this->getFormValues($order->grand_total, $responseUrl,$gatewayorderId,$emailRequest->currency,$billingData,$customer->email);
            $emailData["requestUrl"] = $urlArray['requestUrl'];
            $emailData['requestParameter'] = $urlArray['requestParameter'];
            $emailData["price"] = $order->sub_total;
            $emailData["basePrice"] = $order->sub_total;
            $emailData["vatPercentage"] = $order->vat_percentage;
            $emailData["vatAmount"] = $order->vat_amount;
            $emailData["totalAmount"] = $order->grand_total;
            $emailData['email'] = $customer->email;
            $emailData['courseName'] = $orderLineItem->course_name;
            $emailData['location'] = $orderLineItem->venue;
            $emailData['eventDate'] = $orderLineItem->schedule_date;
            $emailData['currency'] = $emailRequest->currency;
            dd($emailData);
            return view('cms.purchase.purchaseDetail',$emailData);
    }

    public function getVenueDetails(Request $request) {
        
        $input  = $request->all();
        
        if(empty($input['countryId'])) {
            return ['500' => 'nothing found'];
        }

        $venues = Location::where('country_id',$input['countryId'])->get();
       
        return json_encode($venues);
    }
    
    public function getSchedule(Request $request) {
        
        $input  = $request->all();
        
        if( empty($input['courseId']) || empty($input['countryId']) || empty($input['location']) ) {
            return ['500' => 'nothing found'];
        }
            $today = \Carbon\Carbon::today();

            // $schedule = DB::table('schedules')
            //         ->select('schedules.responseDiscountedPrice', 'schedules.responseDate', 'schedules.eventTime','schedules.scheduleId')
            //         ->where('schedules.fk_courseId', '=', $input['courseId'])
            //         ->where('schedules.responseLocation', 'LIKE', $input['locationId'])
            //         ->where('schedules.fk_countryId', 'LIKE', $input['countryId'])
            //         ->whereDate('schedules.responseDate','>',$today->toDateString())
            //         ->get();
            $schedules = Schedule::where('course_id',$input['courseId'])
            ->where('response_location',$input['location'])
            ->where('country_id',$input['countryId'])
            ->whereDate('response_date','>',$today->toDateString())->get();
            
            return json_encode($schedules);
    }
    
    // protected function getAllCourses() {
        
    //     $courses = DB::table('course')
    //                 ->select(
    //                         'course.courseId', 'course.courseDisplayName', 'course.courseDuration'
    //                         )
    //                 ->where('course.isPublished', '=', '1')
    //                 ->whereNull('course.deleted_at')
    //                 ->orderBy('course.courseId', 'asc')
    //                 ->get();
        
    //     return $courses;
    // }
    
    // protected function groupByPackage($course) {
        
    //     $courses = [];
        
    //     foreach($course as $key=>$value) {
        
    //         $packages = DB::table('packages')->select('packages.packageName', 'packages.price', 'packages.fk_countryId')
    //                     ->where('packages.fk_courseId', '=', $value->courseId)->get();
            
    //         if(!empty($packages) && count($packages) > 0) {
            
    //             $value->packages = $this->getPackageCountries($packages);
                
    //             array_push($courses, $value);
                
    //         }
    //         else {
                
    //             array_push($courses, $value);
                
    //         }
            
    //     }
        
    //     return $courses;
    // }
    
    // protected function getPackageCountries($packages) {
        
    //     $packagesReturn = [];
        
    //     foreach($packages as $key=>$value) {
            
    //         $countries = DB::table('countries')->select('countries.id', 'countries.name', 'countries.incrementedAmount',
    //                                                     'countries.vatPercentage')
    //                     ->where('countries.id', '=', $value->fk_countryId)->get();
            
    //         if(count($countries) > 0 && !empty($countries)) {
                
    //             //$value->venue = $this->getVenue($countries);
                
    //             array_push($packagesReturn, $value);
                
    //         }
    //         else {
    //             array_push($packagesReturn, $value);
    //         }
            
    //     }
        
    //     return $packagesReturn;
    // }
    
    protected function getVenue($countries) {
        
        $venueArray = [];
        
        foreach($countries as $key=>$value) {
            $venue = DB::table('venue')->select('venue.venueName')->where('venue.fk_countryId', '=', $value->id)->get();
            array_push($venueArray, $venue);
        }
        
        return $venueArray;
    }
    
    public function convertPriceInGBP($currency_code){
        
        $GBPValue = 0;
        $currency_code = strtoupper($currency_code);
        $data = null;
        if($currency_code == 'GBP'){
            return 1;
        }
            $processing = true;
            $count = 0;
                // return value from google is not always the same 
                // to prevent unexpected values, more then one retry must be used.
                while($processing && $count < 5){ 
                try{
                    $count++;
                    $toCurrency = urlencode($currency_code);
                    $fromCurrency = urlencode('GBP');
                    

                        $url = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
                        $get = file_get_contents($url);
                        
                        $matches = array();
                        /**
                         * [^0-9,] prevent bad value by matching data begining with anything but digit or comma
                         * ([0-9]{1,3},) value can have a thousand separator(,) folowed by 1 to 3 digits
                         * \. a decimal value is necessary max upto 6 digits
                         *  [a-zA-Z]* the required value must end with a string followed by a space
                         */ 
                        $data = preg_match('/[^0-9,]([0-9]{1,3},)?[0-9]{1,3}\.[0-9]{1,6} [a-zA-Z]*/',$get,$matches);
                        
                        $capture = empty($matches[0])? '' : $matches[0];
                        $textAmount = substr($capture,1,stripos($capture," "));
                        $textAmount = str_replace(",","",$textAmount);
                        
                        $GBPValue = floatval( $textAmount);
                        if(empty($GBPValue))
                        { // bad value recieved , retry
                           // continue;
                        }
                    $processing = false;
                }
                catch(\Exception $e){
                    $GBPValue = 0;
                    // dd($e);
                }
            }
            //  dd(array('count'=>$count,'value'=>$GBPValue,'textamount'=>$textAmount,'capture'=>$capture,"data"=>$data,"get"=>$get));
        return $GBPValue;
    }

    protected function getFormValues($amount, $responseUrl,$gatewayOrderId,$currency, $billingDetail,$email) {
                $billingData = array();
                $billingData["billToFirstName"]     = $billingDetail->firstname;
                $billingData["billToLastName"]      = $billingDetail->lastname;
                $billingData["billToStreet1"]       = $billingDetail->address1;
                $billingData["billToStreet2"]       = $billingDetail->address2;
                $billingData["billToCity"]          = $billingDetail->city;
                $billingData["billToState"]         = '';
                $billingData["billtoPostalCode"]    = $billingDetail->postcode;
                $billingData["billToCountry"]       = $billingDetail->country->name;
                $billingData["billToEmail"]         = $email;
        
                $options['timestamp'] = strftime("%Y%m%d%H%M%S");
                $options['gatewayOrderId'] = $gatewayOrderId;
                $options['responseUrl'] = $responseUrl;
                $options['billingData'] = $billingData;
        $networkOnlineObject = NetworkonlinePayment::create($amount, $currency,$options);

        $requestParameter = $networkOnlineObject->NeoPostData;

        if($networkOnlineObject->url)
        $requestUrl = 'https://NeO.network.ae/direcpay/secure/PaymentTxnServlet';
        else
        $requestUrl = 'https://uat-NeO.network.ae/direcpay/secure/PaymentTxnServlet';
     
        return ['requestUrl' => $requestUrl, 'requestParameter' => $requestParameter];
    }
    
    protected function sendEmail($message, $subject, $userEmail) {
        
        $to = $userEmail;
        
        $emailSubject = $subject;

                    // Always set content-type when sending HTML email
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                    // More headers
                    $headers .= 'From: <webmaster@pearcemayfield.com>' . "\r\n";
                    //\Session::flash('temp_form', $message); 
                     mail($to,$emailSubject,$message,$headers);
        
    }

        
    private function saveCustomerDetail($input)
    {
        /* Customer Data - Update or Create ------------------------- */
        $customerData = [
            'firstname' => empty($input['FirstName'])? '' : $input['FirstName'],
            'lastname'  => empty($input['LastName'])? '' : $input['LastName'],
            'telephone' => empty($input['Telephone'])? '' : $input['Telephone'],
            // 'Mobile'    => $input['Mobile'],
            'email'   => $input['EmailID'],
            // 'marketingOffersOptIn'   => $input['marketingOffersOptIn'],
            // 'contactConsent' => 1,
            // 'othersConsent' => $input['otherConsent'],
            // 'prefferedContactMethod' => 'Phone and Email'
        ];
        $customer = Customer::updateOrCreate(['email' => $input['EmailID']],$customerData);
        return $customer->id;
    }

    private function saveBillingData($input,$customerId)
    {
        $billingData = [
            'customer_id' => $customerId,
            'firstname'     => $input['name'],
            'lastname'      => $input['lastname'],
            'address1'  => $input['Address1'],
            'address2'  => $input['Address2'],
            'city'          => $input['Town'],
            'postcode'      => $input['PostCode'],
            'country_id'       => $input['country']
        ];
        return BillingDetail::create($billingData);

    }

    private function saveOrderData($amount,$scheduleId,$customerId,$vatPercentage,$vatAmount,$totalAmount)
    {
        $orderData = [
            'line_item_count'   => 1, // number of purchase
            'sub_total'         => $amount,
            'customer_id'       => $customerId,
            'grand_total'       => $totalAmount,
            'vat_percentage'    => $vatPercentage,
            'vat_amount'        => $vatAmount

        ];
        $order = Order::create($orderData);

        $orderLineItemData = [
            'order_id'      => $order->id,
            'quantity'      => 1,
            'price'         => $amount,
            'sub_total'     => $amount,
            'delivery_method' => 'Classroom',
        ]; 
        $schedule = Schedule::find($scheduleId);
        if(!empty($schedule))
        {
            $orderLineItemData['course_name'] = $schedule->response_course_name;
            $orderLineItemData['venue'] = $schedule->response_location;
            $orderLineItemData['schedule_date'] = $schedule->response_date;
            $orderLineItemData['schedule_time'] = $schedule->event_time;
        }
            // $orderLineItemData['Fk_ScheduleID'] = $scheduleId;
            $orderLineItem  = OrderLineItem::create($orderLineItemData);

            return $order->id;
    }

}

