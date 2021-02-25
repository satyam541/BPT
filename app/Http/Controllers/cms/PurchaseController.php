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
use Mail;

class PurchaseController extends Controller
{
    public function index() {
        
        $courses = Course::all();

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
                $schedule->response_town_city_id = 0;
                $schedule->location_id = 0;
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

            $mobile         = $input['phone']; 
            $phonecode      = $input['phonecode'];
            $mobile         = str_replace($phonecode,'', $mobile);       
            $phonecode      = substr($phonecode, 1); 
            $mobileNumber   = $phonecode."|".$mobile;
            $input['mobile']= $mobileNumber;
            
            /**
             * save customer detail and order details
             */
            $customerId = $this->saveCustomerDetail(array('FirstName'=>$input['name'],'EmailID'=>$input['email'],'Mobile'=>$input['mobile']));
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
            $emailData['eventDate'] = $eventDate;
            $emailData['currency'] = $emailRequest->currency;
            $emailData['gatewayOrderId']= $gatewayOrderId;
            $emailData['link'] = route('BookingDetail',array('id'=>$gatewayOrderId))."#bookingDetail"; 
           
            Mail::send('cms.purchase.purchaseEmail', $emailData , function($message) use ($input){
                
                $message->to($input['email'])->subject('Payment Link Form');

           });          
            
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
        }
        // $schedule = Schedule::find($orderLineItem->first()->schedule_id);
        $customer = Customer::find($order->customer_id);
        $emailRequest = EmailRequest::where('order_id',$order->id)->first();
        $billingData = BillingDetail::find($order->billing_id);
        $data = $this->getFormValues($order,$gatewayorderId,$billingData,$customer);
         
            return view('cart.checkout',$data);
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

            $schedules = Schedule::where('course_id',$input['courseId'])
            ->where('response_location',$input['location'])
            ->where('country_id',$input['countryId'])
            ->whereDate('response_date','>',$today->toDateString())->get();
            
            return json_encode($schedules);
    }
    
    protected function getVenue($countries) {
        
        $venueArray = [];
        
        foreach($countries as $key=>$value) {
            $venue = Location::where('country_id', $value->id)->select('name')->get();
            // $venue = DB::table('venue')->select('venue.venueName')->where('venue.fk_countryId', '=', $value->id)->get();
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

    protected function getFormValues($order,$gatewayOrderId, $billingDetail,$customer) {
        $data = array();
        if(env('APP_ENV') == "local")
        {
            $data['paymentUrl'] =   "https://pay.sandbox.realexpayments.com/pay";
            $merchantId         =   "knowledgeacademy";
            $secret   	        =   "secret";
            $account            =   "GPINTGBP";
        }else{
            $data['paymentUrl'] =   "https://hpp.globaliris.com/pay";
            $merchantId         =   "knowledgeacademy";
            $secret   	        =   "27v8GoTKLI";
            $account            =   "PentagonWeb";
        }

       
        $responseUrl  = route('cartResponseRoute');     // use this for networkbitmap
        $timestamp = strftime("%Y%m%d%H%M%S");
        $gatewayOrderId = $gatewayOrderId;
        $totalAmount = $order->grand_total*100;

        $currencyCode =  "GBP";
       
        $tmp = $timestamp.'.'.$merchantId.'.'.$gatewayOrderId.'.'.$totalAmount.'.'.$currencyCode;
        $tmp = sha1($tmp).'.'.$secret;
        $sha1hash = sha1($tmp);
        
        $details['merchantId']                          =   $merchantId;
        $details['gatewayOrderId']                      =   $order->gateway_order_id;                                                                                                                                                                                                                                                                                                                                                                                                                                                                      ;
        $details['currencyCode']                        =   $currencyCode;
        $details['totalAmount']                         =   $totalAmount;
        $details['timestamp']                           =   $timestamp;
        $details['sha1hash']                            =   $sha1hash;
        $details['account']                             =   $account;
        $details['responseUrl']                         =   $responseUrl;
        $details['customerEmail']                       =   $customer->email;
        $details['phone']                               =   $customer->mobile;
        $details['address1']                            =   $billingDetail->address1;
        $details['address2']                            =   $billingDetail->address2;
        $details['city']                                =   $billingDetail->city;
        $details['postalcode']                          =   $billingDetail->postcode;
        $details['country']                             =   $billingDetail->country->name;
        //form fields
        $response = array();
        $response['MERCHANT_ID']                        =   $details['merchantId'];
        $response['ORDER_ID']                           =   $details['gatewayOrderId'];
        $response['CURRENCY']                           =   $details['currencyCode'];
        $response['ACCOUNT']                            =   $details['account'];
        $response['MERCHANT_RESPONSE_URL']              =   $details['responseUrl'];
        $response['AMOUNT']                             =   $details['totalAmount'];
        $response['TIMESTAMP']                          =   $details['timestamp'];
        $response['SHA1HASH']                           =   $details['sha1hash'];
        $response['AUTO_SETTLE_FLAG']                   =   1;
        
        //uncommnet below for 3d secure
        $response['HPP_VERSION']                        =   2;
        $response['HPP_CHANNEL']                        =   "ECOM";
        $response['HPP_CUSTOMER_EMAIL']                 =   $details['customerEmail'];
        $response['HPP_CUSTOMER_PHONENUMBER_MOBILE']    =   $details['phone'];
        $response['HPP_BILLING_STREET1']                =   $details['address1'];
        $response['HPP_BILLING_STREET2']                =   $details['address2'];
        $response['HPP_BILLING_STREET3']                =   "";
        $response['HPP_BILLING_CITY']                   =   $details['city'];
        $response['HPP_BILLING_POSTALCODE']             =   $details['postalcode'];
        $response['HPP_BILLING_COUNTRY']                =   "826";

        //form field ends
        $data['response'] = $response;

        return  $data;

}

        
    private function saveCustomerDetail($input)
    {
        /* Customer Data - Update or Create ------------------------- */
        $customerData = [
            'firstname' => empty($input['FirstName'])? '' : $input['FirstName'],
            'lastname'  => empty($input['LastName'])? '' : $input['LastName'],
            'telephone' => empty($input['Telephone'])? '' : $input['Telephone'],
            'mobile'    => $input['Mobile'],
            'email'     => $input['EmailID'],
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

