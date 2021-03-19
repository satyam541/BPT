<?php

namespace App\Http\Controllers;

use App\Models\Country;

class JWTEnquiryController extends JWT
{
	private $data;
		
	public function __construct() {
	}


	function make_order_enquiry($data,$enquiryFormTypeId=7) {
	
		$customer  =  $data["customerDetail"];
		$billing   =  $data["billingDetail"];
		$order     =  $data["orderDetail"];
		$lineItems =  $order->lineItems;
		$courses   =  $lineItems->implode('course_name', ', ');
		$venues    =  $lineItems->implode('venue', ', ');
		$dates     =  $lineItems->implode('schedule_date', ', ');
		$country   =  Country::find($data['country_id'] ?? "gb");
		$this->data = [
				    'name' 			            => (isset($customer['firstname']) ? $customer['firstname'].' '.$customer['lastname'] : ''),
        			'mobile' 		            => (isset($customer['mobile']) ? $customer['mobile'] : ''),
        			'telephone' 		        => (isset($customer['telephone']) ? $customer['telephone'] : ''),
					'email' 		            => (isset($customer['email']) ? $customer['email'] : ''),
					'companyName'				=> (isset($billing['company'])? $billing['company'] : ''),
        			'message' 		            => (isset($data['message']) ? $data['message'] : ''),
        			'emailSent'		            => (isset($data['emailsent']) ? $data['emailsent'] : ''),
        			'url'			            => (isset($data['Url']) ? $data['Url'] : ''),
        			'address1' 		            => (isset($billing['address1']) ? $billing['address1'] : ''),
					'countryId'					=>	$country->country_id,
        			'organisation' 		        => (isset($billing['company']) ? $billing['company'] : ''),
                    'noOfDelegates'             => (isset($order['line_item_count']) ? $order['line_item_count'] : 1),
                    'course'                    => [
                                                    'name'          =>  (isset($courses) ? $courses : ''),
													'towncityName'  =>  (isset($venues) ? $venues : ''),
                                                    'courseDate'    =>  (isset($dates) ? $dates : ''),
                                                    'rrp'           =>  (isset($order['grand_total']) ? $order['grand_total'] : ''), // price
                                                    ],
                    'enquiryFormTypeId'         => $enquiryFormTypeId,
                    'total'                     => (isset($data['Total'])?$data['Total'] : ''),
                    'currency'                  => empty($order->country->currency_symbol)? $order->country->currency_symbol : '£',
        			'iso'			            => $country->iso,
                    'enquiryType'               => (isset($data['type']) ? $data['type'] : ''),
                    'contactConsent'            => (isset($customer['contact_consent']) ? $customer['contact_consent'] : 0),
                    'prefferedContactMethod'    => (isset($customer['preffered_contact_method']) ? $customer['prefferedContactMethod'] : ''),
                    'marketingOffersOptIn'      => (isset($customer['marketing_consent']) ? $customer['marketing_consent'] : ''),
                    //below are for booking forms
                    'userOrderId'               => (isset($order['id']) ? $order['id'] : ''),
                    'booking'                   => (isset($data['booking']) ? $data['booking'] : ''),
                    'isDeclined'                => (isset($data['isDeclined']) ? $data['isDeclined'] : ''),
					'isIncomplete'              => (isset($data['isIncomolete']) ? $data['isIncomplete'] : ''),
					'isIncomplete'              => (isset($data['isIncomolete']) ? $data['isIncomplete'] : ''),
					'deliveryType'				=> (isset($data['deliveryType']) ? $data['deliveryType'] : ''),
					
			   ];
               if($enquiryFormTypeId != 8)
               {
                    $this->data['enquiryForm'] 		= true;
			   }
			//    if($order->payment_method == "Purchase Order")
            //    {
            //         $this->data['po'] 		= $order->patment_detail;
            //    }
               else
               {
                    $this->data['enquiryForm']        = false;
               }
		$this->send_enquiry();			
	}

	function make_enquiry($data,$enquiryFormTypeId=7) {
		$country = Country::find($data['country_id'] ?? "gb");
		$this->data = [
					'name' 			            => (isset($data['name']) ? $data['name'] : ''),
					'companyName'				=> (isset($data['company'])? $data['company'] : ''),
        			'mobile' 		            => (isset($data['phone']) ? $data['phone'] : ''),
        			'telephone' 		        => (isset($data['telephone']) ? $data['telephone'] : ''),
                    'email' 		            => (isset($data['email']) ? $data['email'] : ''),
        			'message' 		            => (isset($data['message']) ? $data['message'] : ''),
        			'emailSent'		            => (isset($data['emailsent']) ? $data['emailsent'] : ''),
        			'url'			            => (isset($data['Url']) ? $data['Url'] : ''),
        			'address1' 		            => (isset($data['address']) ? $data['address'] : ''),
        			'countryId' 		        => $country->country_id,
        			'organisation' 		        => (isset($data['company']) ? $data['company'] : ''),
                    'noOfDelegates'             => (isset($data['delegates']) ? $data['delegates'] : 1),
                    'course'                    => [
                                                    'name'          =>  (isset($data['course']) ? $data['course'] : ''),
                                                    'towncityName'  =>  (isset($data['location']) ? $data['location'] : ''),
                                                    'courseDate'    =>  (isset($data['date']) ? $data['date'] : ''),
                                                    'rrp'           =>  (isset($data['rrp']) ? $data['rrp'] : ''), // price
                                                    ],
                    'enquiryFormTypeId'         => $enquiryFormTypeId,
                    'total'                     => (isset($data['Total'])?$data['Total'] : ''),
                    'currency'                  => '£',
        			'iso'			            => $country->iso,
                    'enquiryType'               => (isset($data['type']) ? $data['type'] : ''),
                    'contactConsent'            => (isset($data['contactConsent']) ? 1 : 0),
                    'prefferedContactMethod'    => (isset($data['prefferedContactMethod']) ? $data['prefferedContactMethod'] : ''),
                    'marketingOffersOptIn'      => (isset($data['marketing_consent']) ? $data['marketing_consent'] : ''),
                    //below are for booking forms
                    'userOrderId'               => (isset($data['userOrderId']) ? $data['userOrderId'] : ''),
                    'booking'                   => (isset($data['booking']) ? $data['booking'] : ''),
                    'isDeclined'                => (isset($data['isDeclined']) ? $data['isDeclined'] : ''),
					'isIncomplete'              => (isset($data['isIncomplete']) ? $data['isIncomplete'] : ''),
					'deliveryType'				=> (isset($data['delivery_type']) ? $data['delivery_type'] : ''),
               ];
               if($enquiryFormTypeId != 8)
               {
                    $this->data['enquiryForm'] 		= true;
               }
               else
               {
                    $this->data['enquiryForm']        = false;
               }
		$this->send_enquiry();			
	}
		
	private function send_enquiry() {
		//return false;
		if(in_array($this->data['email'],config('mail.testing_email')))
		{
		
			return false;
		}
		
	
		$this->data['iss']    = isset($_SERVER['HTTP_HOST'])?$_SERVER['HTTP_HOST']:"";
		$this->data['source'] = "Best Practice Training";
		$this->data['sub']    = "Enquiry";
		$this->data['aud']    = "theknowledgeacademy.com";
		$this->data['iat']    = time();
		$this->data['exp']    = time()+300; //5 min exp time
		$this->data['nbf']    = time();
		$this->data['jti']    = md5($this->data['sub'].$this->data['iat']);

		$jwt = $this->encode($this->data, "xUHLda68UmYN9Xl7iXTX1pTZPWiK0iY1");

		try {
			$ch = curl_init();
			$url = "https://www.theknowledgeacademy.com/_engine/enquiry/enquiry.php";
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_TIMEOUT, 5);
			curl_setopt($ch, CURLOPT_HEADER, false);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, '_token='.$jwt);
			$result = curl_exec($ch);
			curl_close($ch);
		}
		catch(Exception $e){
			//
		}

		// try {
		// 	$cognitio = curl_init();
		// 	$cogurl = "http://cognitio.tka-in.com/api/enquiry";
		// 	curl_setopt($cognitio, CURLOPT_URL, $cogurl);
		// 	curl_setopt($cognitio, CURLOPT_SSL_VERIFYPEER, false);
		// 	curl_setopt($cognitio, CURLOPT_TIMEOUT, 5);
		// 	curl_setopt($cognitio, CURLOPT_HEADER, false);
		// 	curl_setopt($cognitio, CURLOPT_POST, 1);
		// 	curl_setopt($cognitio, CURLOPT_POSTFIELDS, http_build_query($this->data));
		// 	$result1 = curl_exec($cognitio);
		// 	curl_close($cognitio);
		// }
		// catch(Exception $e){

		// }			
	}
}
?>