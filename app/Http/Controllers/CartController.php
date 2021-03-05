<?php

namespace App\Http\Controllers;

use App\Models\BillingDetail;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\OnlinePrice;
use App\Models\CourseAddon;
use App\Models\Customer;
use App\Models\Delegate;
use App\Models\EmailRequest;
use App\Http\Requests\BillingRequest;
use App\Http\Requests\CustomerRequest;
use App\Http\Requests\DelegateRequest;
use App\Models\LineItemAddon;
use App\Models\Order;
use App\Models\OrderCardType;
use App\Models\OrderLineItem;
use App\Models\Schedule;
use Cart;
use App\Models\Course;
use App\Mail\OrderMail;
use App\Models\Popular;


class CartController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function __construct()
    {
        
    }

    public function index()
    {
        $cartItems = Cart::content();
        $course=$cartItems->pluck('name')->toArray();

        $data['cartItems']=$cartItems;

        $data['courseobj']=Course::whereIn('name',$course)->first();
        $data['popularCourses']=Popular::courses()->take(7);
        $data['countries'] = Country::all();
        $data['cartTotal'] = Cart::subtotal(0,'','');
        $data['paymentCards'] = OrderCardType::all();
        return view('cart/cart',$data);
    }

    public function addToCart(Request $request)
    {
        $id = $request->route('id');
        $route = $request->route()->action['as'];
        switch ($route) {
            case 'classroomBooking':
                return $this->ScheduleBooking($id,'classroom');
            case 'virtualBooking':
                return $this->ScheduleBooking($id,'virtual');
            case 'onlineBooking':
                return $this->onlineBooking($request,$id);
            default:
                dd($request->url());
                break;
        }
    }

    private function ScheduleBooking($id,$method)
    {
        // required date, location, duration
        $schedule = Schedule::find($id);
        $course = $schedule->course;
     
        $cart['id'] = "schedule:".$schedule->id;
        $cart['name'] = $schedule->course->name;
        $cart['qty'] = 1;
        $cart['weight'] = 1;
        $cart['price'] = $schedule->event_price;

        $options = array();
        $options['method'] = $method;
        $options['id'] = $schedule->id;
        $options['date'] = $schedule->response_date->isoFormat('ddd DD MMM YYYY');
        $options['location'] = $schedule->response_location;
        $options['duration'] = $course->duration;
        $options['country'] = country()->id;
        $cart['options'] = $options;
       
        Cart::add($cart);
        
        $url = route('cartOrderPage');
        return redirect($url);
    }

    private function onlineBooking(Request $request,$id)
    {
        $onlinePrice = OnlinePrice::find($id);
        $addonIds = $request->get('addon');// array of id
        $addonPrice = 0;

        if(!empty($addonIds))
        {
            $addons = CourseAddon::whereIn('id',$addonIds)->get();
            asort($addonIds);
            $addonString = ":addon:".implode(":", $addonIds);
            $addonPrice = $addons->sum('price');
         
        }
        else{
            $addons = null;

            $addonString = '';
        }

        $cart['id'] = "online:".$onlinePrice->id.$addonString;
        $cart['name'] = $onlinePrice->course->name;
        $cart['qty'] = 1;
        $cart['weight'] = 1;
        $totalprice = country()->convertPrice($onlinePrice->price + $addonPrice);
        $cart['price'] =  $totalprice;
                   
        $options = array();
        $options['addons'] = $addons;
        $options['method'] = "online";
        $options['country'] = country()->id;
        $options['id'] = $onlinePrice->id;

        $cart['options'] = $options;
        
        Cart::add($cart);
        $url = route('cartOrderPage');
        return redirect($url);
    }

    public function updateQuantity(Request $request)
    {
        $rowId      = $request->get('cartId');
        $action     = $request->get('action');
        $cartItem   = Cart::get($rowId);
        $quantity   = $cartItem->qty;

        if($action == "add")
        {
            $quantity += 1;
        }
        elseif($action == "remove" && $quantity > 1)
        {
            $quantity -= 1;
        }

        Cart::update($rowId,$quantity);
        $result['quantity'] = $quantity;
        $result['price']    = $cartItem->price;
        $result['total']    = Cart::subtotal(0,'','');

        return json_encode($result);
    }

    public function removeItem(Request $request)
    {
        $rowId = $request->get('cartId');
        Cart::remove($rowId);
        $result['itemCount'] = Cart::count();
        if( $result['itemCount'] ==0){
            $this->clearCart($request);
        }
        return json_encode($result);  
    }

    public function clearCart(Request $request)
    {
        Cart::destroy();
        // if (session()->has('users')){}
            session()->forget([
                'customer',
                'orderData',
                'billingData',
                "currentCartItem",
                "currentDelegate"
                ]);

        return 'done';
    }

    public function submitCustomerDetail(CustomerRequest $request)
    {
        if(Cart::count() == 0)
        {
            return json_encode(['error'=>'empty']);
        }
        $input = $request->all();
        $customer = Customer::firstOrNew(['email'=>$input['email']]);

        $customer->firstname                    = $input['firstname'];
        $customer->lastname                     = $input['lastname'];
        $customer->mobile                       = $input['phone'];
        $customer->email                        = $input['email'];
        $customer->company                      = $input['company'];
        $customer->preffered_contact_method     = 'Phone and Email';
        $customer->marketing_consent            = isset($input['marketingConsent']);
        $customer->contact_consent              = isset($input['contactConsent']);
        $customer->others_consent               = isset($input['othersConsent']);
        
        $customer->save();
         // save customer detail to session
         session(['customer'=>$customer, 'phonecode'=>$input['phonecode']]);
        $order          = new Order(); 
        $cartItems = Cart::content();
        $order->customer_id = $customer->id;
        $order->country_id = country()->id;
       // $order->billing_id = $billingDetail->id;
        $order->line_item_count = $cartItems->count();
        $order->progress =1;
        $order->save();
        session(['orderData' => $order]);

       
//saving line items
        foreach ($cartItems as $rowId => $cartItem) {
            // $line_id = $cartItem->options['line_id']?? null;
            // $orderLineItem = OrderLineItem::firstOrNew(['id'=>$line_id]);
            $orderLineItem = new OrderLineItem();
            $orderLineItemData = [
                'order_id'      => $order->id,
                'quantity'      => $cartItem->qty,
                'price'         => $cartItem->price,
                'sub_total'     => $cartItem->qty * $cartItem->price,
                'delivery_method' => $cartItem->options['method'],
                'course_name'   => $cartItem->name
            ]; 
			
           if( $cartItem->options['method'] == 'classroom' || $cartItem->options['method'] == 'virtual') 
           { // Course Schedule --------------------
                // $orderLineItemData['schedule_id'] = $cartItem->options['id'];
                $orderLineItemData['course_duration']   = $cartItem->options['duration'];
                $orderLineItemData['venue']             = $cartItem->options['location'];
                $orderLineItemData['schedule_date']     = Schedule::find($cartItem->options['id'])->response_date;
                // $orderLineItemData['schedule_time'] = '';
           }
           elseif( $cartItem->options['method'] == 'online') 
           { 
               // Online Course Booking ------------------
               $orderLineItemData['venue']        = "Online";
                // $orderLineItemData['online_price_id'] = $cart->options['id'];
           }

            $orderLineItem->fill($orderLineItemData);
            $orderLineItem->save();
            // save lineItem id in cart to update
            $options = $cartItem->options;
            $options['line_id'] = $orderLineItem->id;
            Cart::update($rowId,['options'=>$options]);

           // save addons to lineItemAddon for online
            if(!empty($cartItem->options['addons'])){
                foreach ($cartItem->options->addons as $addon) {
                    LineItemAddon::updateOrCreate(
                        [
                             'line_id'   =>$orderLineItem->id,
                             'name'     =>$addon->name,
                             'price'    => country()->convertPrice($addon->price) ]
                        );
                }
            }
        }

        $result['status'] = 'done';
        return json_encode($result);
    }

    public function submitBillingDetail(BillingRequest $request)
    {
        $input          = $request->all();
        $customer       = session('customer',NULL);
        $billingDetail  = session('billingData',new BillingDetail()); 
        $order          = session('orderData'); 
        $billingDetail->customer_id = $customer->id;
        $billingDetail->title = '';
        $billingDetail->firstname = $input['firstname'];
        $billingDetail->lastname = $input['lastname'];
        $billingDetail->address1 = $input['address1'];
        $billingDetail->address2 = $input['address2'];
        $billingDetail->city = $input['city'];
        $billingDetail->postcode = $input['postcode'];
        $billingDetail->country_id = $input['country'];
        //$billingDetail->company = $input['company'];
        $billingDetail->province = '';
        $billingDetail->save();
        session(['billingData'=>$billingDetail]);
        $cartTotal = Cart::subtotal(2,'.','');
        $vatPercentage = 20;
        $vatAmount = ($vatPercentage * $cartTotal)/100;
        $firstTotal = $cartTotal+$vatAmount;

        if($input['paymentmethod'] == 'purchase order') {
            $cardFeesPercentage = $cardFeesAmount = $secondTotal = $cardFeesVatAmount = 0;
            $paymentDetails = $input['purchase'];
        } 
        else
         {
            $paymentCard = OrderCardType::find($input['cardtype']);
            $cardFeesPercentage = $paymentCard->card_fees_in_percent;
            $cardFeesAmount = ($cardFeesPercentage * $firstTotal)/100;
            $cardFeesVatAmount = ($vatPercentage * $cardFeesAmount)/100;
            $secondTotal = $cardFeesAmount += $cardFeesVatAmount;
            $paymentDetails = $paymentCard->card;
        }

        $cartTotalAmount = $firstTotal+$secondTotal;

        $paymentMethod = ($input['paymentmethod'] == 'card') ? 'Credit/Debit Card' : "Purchase Order";

        // save order data
        $cartItems = Cart::content();
        $order->customer_id = $customer->id;
        $order->progress =2;
        $order->country_id = country()->id;
        $order->billing_id = $billingDetail->id;
        $order->line_item_count = $cartItems->count();
        $order->sub_total = $cartTotal;
        $order->vat_percentage = $vatPercentage;
        $order->vat_amount = $vatAmount;
        $order->card_fees_percentage = $cardFeesPercentage;
        $order->card_fees_amount = number_format($cardFeesAmount, 2, '.', '');
        $order->grand_total = number_format($cartTotalAmount, 2, '.', '');
        $order->payment_method = $paymentMethod;
        $order->payment_detail = $paymentDetails;
        $order->save();

        session(['orderData' => $order]);
        // save or update all cartItem in orderlineItem
        
 
        $cartItems = Cart::content();
        $rowIds = array();
        foreach($cartItems as $cartItem)
        {
            $rowIds[] = $cartItem->rowId;
        }
        $rowId = $cartItems->first()->rowId;
        session(['currentCartItem'=>$rowId,'currentDelegate'=>1]);
        session()->save();

        $result['status'] = 'done';
        $result['rowId'] = $rowId; 
        $result['rowIds'] = $rowIds;

        // $customerDetail                     = $billingDetail->customer;
        // $mailData['orderDetail']            = $order->load('lineItems','country');
        // $mailData['billingDetail']          = $billingDetail->load('country');
        // $mailData['customerDetail']         = $customerDetail;
        // $mailData['type']                   = "booking";        
        // $data['enquiry']    = $mailData;
        // $view               = \View::make('email.cartOrder',$mailData);
        // $mailData['emailsent'] = $view->render();
        // MakeJWTEnquiry($mailData);

        // Mail::to($customerDetail->email)->cc(config('mail.from.address'))->send(new OrderMail($mailData));

        return json_encode($result);
    }
    
    public function submitDelegateDetail(DelegateRequest $request)
    {
        $input = $request->all();
        $cartItems = Cart::content();
        $cartItem = $cartItems->where('rowId',$input['rowId'])->first();
        if(empty($cartItem))
        {
            $status['error'] = '404';
            return json_encode($status);
        }
        // $cartItem = Cart::get($input['rowId']);
        // expected values
        $currentCartItem    = $request->session()->get('currentCartItem');
        $currentDelegate    = $request->session()->get('currentDelegate');

        // check if row id and delegate match expected values
        if($currentCartItem != $input['rowId'] || $currentDelegate != $input['delegate'])
        {
            $nextData = array('rowId'=> $currentCartItem,'delegate' => $currentDelegate);
            return json_encode($nextData);
        }

        // save delegate to database
        if($cartItem->qty == 1)
        {
            $delegate = Delegate::firstOrNew(['line_id'=>$cartItem->options['line_id']]);
        }
        else
        {
            $delegate = new Delegate();
            $delegate->line_id = $cartItem->options['line_id'];
        }
        $delegate->firstname = $input['firstname'];
        $delegate->lastname = $input['lastname'];
        $delegate->mobile = $input['phone'];
        $delegate->email = $input['email'];
        // $delegate->telephone = '';
        $delegate->save();

        // check for next item
        $nextCartItem = $this->nextCartItem($input['rowId'],$input['delegate']);

        // return rowId for current Item and delegate number
        return json_encode($nextCartItem);
    }

    private function nextCartItem($rowId,$delegate)
    {
        $cartItem = Cart::get($rowId);
        $cartItems = Cart::content();
        $quantity = $cartItem->qty;
        if($quantity > $delegate)
        {
            $delegate++;
        }
        else if($cartItems->last()->rowId != $cartItem->rowId)
        {
            $delegate = 1;
            $iterator = $cartItems->getIterator();
            $next = current($iterator);
            while($next->rowId != $cartItem->rowId)
            {
                $next = next($iterator);
            }
            $cartItem = next($iterator);
            
            $rowId = $cartItem->rowId;
        }
        else
        {
            $rowId = null;
            $order = session('orderData');
            $order->refresh();
            $order->progress = 3;
            $order->save();

        }
        // change session value
        session(['currentCartItem'=>$rowId,'currentDelegate'=>$delegate]);
        session()->save();

        // generate html for cart delegate page
        $content = "<h4>$cartItem->name</h4>";

        switch($cartItem->options['method'])
        {
            case 'classroom':
                $content .= "<p>Classroom</p>
                <p>".$cartItem->options->location."</p>
                <p>".$cartItem->options->date."</p>";
                break;

            case 'virtual':
                $content .= "<p>Virtual</p>
                <p>".$cartItem->options->date."</p>";
                break;

            case 'online':
                $content .= "<p>Online</p>";
                if(!empty($cartItem->options['addons']))
                {
                    $content .= "<ul>";
                    foreach($cartItem->options['addons'] as $addon)
                    {
                    $content .="<li> $addon->name </li>";
                    }
                    $content .= "</ul>";
                }
                break;
        }
        // return array
        return array('rowId'=>$rowId,'delegate'=>$delegate,'content'=>$content);
    }

    
    public function gatewayResponse(Request $request)
    {

     $inputs = $request->all();
     $timestamp  = $inputs['TIMESTAMP'];
        $result     = $inputs['RESULT'];
        $orderid    = $inputs['ORDER_ID'];
        $message    = $inputs['MESSAGE'];
        $authcode   = $inputs['AUTHCODE'];
        $pasref     = $inputs['PASREF'];
        $realexsha1 = $inputs['SHA1HASH'];
        $merchantid = "knowledgeacademy";
        $secret = "27v8GoTKLI";
        $tmp = "$timestamp.$merchantid.$orderid.$result.$message.$pasref.$authcode";
        $sha1hash = sha1($tmp);
        $tmp = "$sha1hash.$secret";
        $sha1hash = sha1($tmp);

        if($authcode == '')
        {
            $authcode = 'null';
        }
        if($pasref == '')
        {
            $pasref = 'null';
        }
        if($realexsha1 == '')
        {
            $realexsha1 = 'null';
        }

        if ($sha1hash != $realexsha1) {
            return "Hashes don't match - response not authenticated!";
        }

        $mailData = array();

        if ($result == "00")
        {
            $mailType = 'Confirmed';
            $data['title'] = "Thank you for your payment";
            $data["message"] = '<br/><br/>
            To continue browsing please <a href="'.url('/').'"><b><u>click here</u></b></a>
            <br/><br/>';
            $mailData['type']    =  "success";
            $progress = 5;
            
        }
        else
        {
            $mailType = 'Declined';
            $data['title'] = "Payment declined";
            $data['message'] = '<br/><br/>
            We are sorry, your payment was declined.<br/><br/> 
            To try again please <a href="'.url('/').'"><b><u>click here</u></b></a><br><BR>
            Please contact our customer care department at 
            <a href="mailto:'.websiteDetail()->contact_email.'"><b><u>'.websiteDetail()->contact_email.'</u></b></a>
            or if you would prefer to subscribe by phone, call on '.websiteDetail()->contact_number.'.';
            $mailData['type']       = "declined";
            $progress = 6;
        }
        $additionalInfo = json_encode(['ResponsePasRef'=>$pasref, 'ResponseSHA1HASH'=>$realexsha1]);
        Order::where('gateway_order_id',$orderid)
        ->update(['gateway_response' => $result ,'transaction_status'=>$authcode,'additional_info'=>$additionalInfo,'progress'=>$progress]);
        
        $order = Order::where('gateway_order_id',$orderid)->first();
        $customer = $order->customer;
        $billingDetail = $order->billingDetail;

        // $mailData['type'] = $mailType;
        $mailData['customerDetail'] = $customer;
        $mailData['billingDetail'] = $billingDetail;
        $mailData['orderDetail'] = $order;
        //Mail::to($customer->email)->cc("dheeraj.arora@theknowledgeacademy.com")->send(new OrderMail($mailData));
        if(config('app.env') != "local"){
        Mail::to($customer->email)->cc(config('mail.from.address'))->bcc("enquiries@theknowledgeacademy.com")->send(new OrderMail($mailData));
        MakeJWTEnquiry($mailData);
        }
        
        return view('cart.response',$data);
    }

}
