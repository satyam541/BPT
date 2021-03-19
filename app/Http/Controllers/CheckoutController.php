<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Cart;
use Mail;
use App\Mail\OrderMail;
class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        if(Cart::count() == 0)  return redirect('/cart');

        $agree = !empty($request->get('agree'));
        $orderData      = session('orderData');
        $orderData->refresh();
        $orderData->update(['agreement_acceptance'=>$agree,'progress'=>4]);

        $billingDetail    = session('billingData');
        $customer       = session('customer');
        $phonecode      = $request->session()->get('phonecode');
 
        $mobile         = $customer->mobile; 
        $mobile         = str_replace($phonecode, '', $mobile);    
        $phonecode      = substr($phonecode, 1); 
        $mobileNumber   = $phonecode."|".$mobile;

        $data = array();
        if(env('APP_ENV') == "local")
        {
            $data['paymentUrl'] =   "https://pay.sandbox.realexpayments.com/pay";
            $merchantId         =   "knowledgeacademy";
            $secret   	        =   "secret";
            $account            =   "GPINTGBP";
        }else{
          
            $data['paymentUrl'] =   "https://hpp.globaliris.com/pay";
            $merchantId         =   "bestpracticetraining";
            $secret             =   "VYHeI2MQtS";
            $account            =   "internet";
        }

         (new CartController)->clearCart($request);
        if($orderData->payment_method == 'Purchase Order') {
            // send purchase order email
            // customer detail, billing detail, order detail and type
            $mailData['type'] = 'incomplete';
            $mailData['customerDetail'] = $customer;
            $mailData['billingDetail'] = $billingDetail;
            $mailData['orderDetail'] = $orderData;

            //Mail::to($customer->email)->cc(config('mail.from.address'))->send(new OrderMail($mailData));
            
            Mail::to("enquiries@bestpracticetraining.com")->bcc("bpt@theknowledgeacademy.com")->cc($customer->email)->send(new OrderMail($mailData));
            
            $view               = \View::make('emails.cartOrder',$mailData);
            $mailData['emailsent'] =  $view->render();
            MakeJWTEnquiry($mailData);
            
            $data['title'] = "Thank you for your payment";
            $data["message"] = '<br/><br/>
            To continue browsing please <a href="'.url('/').'"><b><u>click here</u></b></a>
            <br/><br/>';
            return view('cart.response',$data);
            // return "purchase order";
        }

        $responseUrl  = route('cartResponseRoute');     // use this for networkbitmap
        $timestamp = strftime("%Y%m%d%H%M%S");
        $gatewayOrderId = $orderData->gateway_order_id;
        $totalAmount = $orderData->grand_total*100;
	
        $country = Country::find( $orderData->country_id );
        $currencyCode =  "GBP";
       
        $tmp = $timestamp.'.'.$merchantId.'.'.$gatewayOrderId.'.'.$totalAmount.'.'.$currencyCode;
        $tmp = sha1($tmp).'.'.$secret;
		$sha1hash = sha1($tmp);
        
        $details['merchantId']                          =   $merchantId;
		$details['gatewayOrderId']                      =   $orderData->gateway_order_id;                                                                                                                                                                                                                                                                                                                                                                                                                                                                      ;
		$details['currencyCode']                        =   $currencyCode;
		$details['totalAmount']                         =   $totalAmount;
		$details['timestamp']                           =   $timestamp;
		$details['sha1hash']                            =   $sha1hash;
        $details['account']                             =   $account;
        $details['responseUrl']                         =   $responseUrl;
        $details['customerEmail']                       =   $customer->email;
        $details['phone']                               =   $mobileNumber;
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
        // dd($data);
        return view('cart.checkout', $data);
    }

}
