@extends("layouts.master")
@section('content')

    <!-- Start Banner Section -->
    <section class="flex-container banner cart-banner">
        <div class="container">
            @include("layouts.navbar")
            <div class="banner-container">
                <h1>Cart</h1>
                <p>Check what is in your cart here. Fetch all the information about every item, including its date, delivery method, number of delegates, and cost of each course.</p>
                <div class="breadcrums">
                    <ul>
                        <li><a href="{{route('home')}}">Home</a></li>
                        <li><img src="{{ url('img/master/breadcrum-arrow.svg') }}" alt="arrow" class="white"></li>
                        <li><a href="">Cart</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Section -->

    <!-- Start Steps Section -->
    <section class="flex-container steps">
        <div class="container">
            <div class="steps-container">
                <div class="heading center-heading">
                    <h2>Payment <span>Steps</span></h2>
                    <p id="change">Fill out the details given below and click on the Next button. </p>
                </div>
                <div class="payment-container">
                    <div class="detail-container">
                        <div class="detail blue-active" id="one">
                            <p>Customer Details</p>
                            <span class="number">   
                                <p>1</p>
                                <img src="{{ url('img/cart/green-tick.svg') }}" alt="tick">
                            </span>
                        </div>
                        <div class="detail" id="two">
                            <p>Billing Details</p>
                            <span class="number">
                                <p>2</p>
                                <img src="{{ url('img/cart/green-tick.svg') }}" alt="tick">
                            </span>
                        </div>
                        <div class="detail" id="three">
                            <p>Delegate Details</p>
                            <span class="number">
                                <p>3</p>
                                <img src="{{ url('img/cart/green-tick.svg') }}" alt="tick">
                            </span>
                        </div>
                        <div class="detail" id="four">
                            <p>Summary Details</p>
                            <span class="number">
                                <p>4</p>
                                <img src="{{ url('img/cart/green-tick.svg') }}" alt="tick">
                            </span>
                        </div>
                    </div>
                    <div class="order-container">
                        <form class="form" id="stepOne">
                            @csrf
                            <h2>Customer Details</h2>
                            <div class="form-input">
                                <div class="input-container">
                                    <span><img src="{{ url('img/master/name-black.svg') }}" alt="name" class="black">
                                        <img src="{{ url('img/master/name-red.svg') }}" alt="name-red" class="red"></span>
                                    <input type="text" name="firstname" id="firstname" placeholder="First Name*" autocomplete="off" class="inputfirstname">
                                </div>
                                <input type="hidden" name="type" value="other">
                                <input type="hidden" name="Url" id="url" value="{{ Request::url() }}">

                                <div class="input-container">
                                    <span><img src="{{ url('img/master/name-black.svg') }}" alt="name" class="black">
                                        <img src="{{ url('img/master/name-red.svg') }}" alt="name-red" class="red"></span>
                                    <input type="text" name="lastname" id="lastname" placeholder="Last Name" autocomplete="off" class="inputlastname">
                                </div>
                                <div class="input-container">
                                    <span><img src="{{ url('img/master/email-black.svg') }}" alt="email" class="black">
                                        <img src="{{ url('img/master/email-red.svg') }}" alt="email-red" class="red"></span>
                                    <input type="text" name="email" id="email" placeholder="Email Address*" autocomplete="off" class="inputemail">
                                </div>
                                <div class="input-container">
                                    <span><img src="{{ url('img/master/email-black.svg') }}" alt="email" class="black">
                                        <img src="{{ url('img/master/email-red.svg') }}" alt="email-red" class="red"></span>
                                    <input type="text" name="email_confirmation" id="email" placeholder="Confirm Email Address*" autocomplete="off"  class="inputemail">
                                </div>

                                <div class="input-container ">
                                    <span><img src="{{ url('img/master/phone-callblack.svg') }}" alt="phone-call"
                                            class="black">
                                        <img src="{{ url('img/master/phone-callred.svg') }}" alt="phonecall-red"
                                            class="red"></span>
                                    <!-- <input type="number" name="phone" id="phone" placeholder="Phone Number*" autocomplete="off"> -->
                                    <div class="phonecode-field field-black">
                                        <select class="country-code"></select>
                                        <span class="prefix"></span>
                                        <input type="number" class="telephone mobile" placeholder="Phone Number*">
                                        <div style="z-index:-1;width:0;height:0;pointer-events: none;">
                                            <input type="text" name="phone" class="phonenumber" tabindex="-1">
                                            <input type="text" name="phonecode" class="phonecode" tabindex="-1">
                                            <input type="text" name="m_code" class="countrycode" autocomplete="off" tabindex="-1">
                                        </div>
                                    </div>
                                </div>

                                <div class="input-container ">
                                    <span><img src="{{ url('img/master/phone-callblack.svg') }}" alt="phone-call"
                                            class="black">
                                        <img src="{{ url('img/master/phone-callred.svg') }}" alt="phonecall-red"
                                            class="red"></span>
                                    <!-- <input type="number" name="phone" id="phone" placeholder="Phone Number*" autocomplete="off"> -->
                                    <div class="phonecode-field field-black">
                                        <select class="country-code"></select>
                                        <span class="prefix"></span>
                                        <input type="number" class="telephone" placeholder="Telephone Number">
                                        <div style="z-index:-1;width:0;height:0;pointer-events: none;">
                                            <input type="text" name="telephone" class="phonenumber" tabindex="-1">
                                            <input type="text" name="cphonecode" class="phonecode" tabindex="-1">
                                            <input type="text" name="t_code" class="countrycode" autocomplete="off" tabindex="-1">
                                          
                                        </div>
                                    </div>
                                </div>

                                <div class="input-container">
                                    <span><img src="{{ url('img/master/house-black.svg') }}" alt="house" class="black">
                                        <img src="{{ url('img/master/house-red.svg') }}" alt="house-red" class="red"></span>
                                    <input type="text" name="company" id="email" placeholder="Company" autocomplete="off" class="inputcompany">
                                </div>
                                
                            </div>
                            <div class="form-consent">
                                <input name="othersConsent" type="checkbox" id="offerConsent">
                                <label for="offerConsent">I am buying this course for someone else and I have their consent to provide this personal data</label>
                            </div>
                            <div class="form-consent">
                                <p>In purchasing this course with Best Practice Training Limited, you are entering into a service agreement where your data shall be processed for the purpose of delivering the service. If appropriate, your contact details shall be given to the relevant Examination Institute or Lab provider to fulfil the contract.</p>
                            </div>
                            <div class="form-consent">
                                <p>Please click <a href="{{route("privacy-policy")}}">here</a> for privacy policy. </p>
                            </div>
                            <div class="form-consent">
                                <input name="contactConsent" type="checkbox" id="checkConsent">
                                <label for="checkConsent">By clicking next, I consent to my data being stored & processes within the delivery of the service, including processing my booking and ordering exams (if applicable) with third parties*</label>
                            </div>
                            <div class="consent-error" style="display: none;">
                                <p>We cannot process your enquiry without contacting you, please tick to confirm you consent to us contacting you about your enquiry</p>
                            </div>
                            <div class="form-consent">
                                <input type="checkbox" name="marketingConsent" id="allowconsent">
                                <label for="allowconsent">Click here to sign up to our email marketing, offers and discounts</label>
                            </div>
                            <div class="buttons">
                                <button class="btn-blue" type="button" onclick="cartFormSubmit('customer',this)">
                                    <img src="{{ url('img/cart/next-arrow.svg') }}" alt="next-arrow">
                                    Next
                                </button>
                            </div>
                        </form>
                        <form class="form-inner" id="stepTwo">
                            <div class="card-detail">
                                <p>Please Select Your Payment Options And Complete The Details Below:</p>
                                <div class="input-container input-card">
                                    <span><img src="{{ url('img/master/credit-black.svg') }}" alt="credit-black"
                                            class="black">
                                        <img src="{{ url('img/master/credit-red.svg') }}" alt="credit-red"
                                            class="red"></span>
                                    <select name="paymentmethod" id="credit-card" onchange="switchPaymentMethod(this.value)" class="inputpaymentmethod">
                                        <option value="" selected> Choose your payment method * </option>
                                        <option value="card"> Credit/Debit Card </option>
                                        <option value="purchase order"> Purchase Order </option>
                                    </select>
                                </div>
                                <div class="input-container input-card">
                                    <span><img src="{{ url('img/master/name-black.svg') }}" alt="name" class="black">
                                        <img src="{{ url('img/master/name-red.svg') }}" alt="name-red" class="red"></span>
                                    <select name="cardtype" id="debit-card" class="inputcard_fees_in_percent">
                                        <option value=""> Choose your card type * </option>
                                        @foreach($paymentCards as $paymentCard)
                                        <option value="{{ $paymentCard->id }}">{{ $paymentCard->card }}</option>
                                        @endforeach
                                    </select>
                                    <input type="text" name="purchase" placeholder="Purchase order number*" class="inputpurchase" style="display:none;">
                                </div>
                            </div>
                            <div class="form billing-details">
                                <div class="cart-heading">
                                    <h2>Billing Details</h2>
                                    <div class="form-consent">
                                        <input name="contactConsent" type="checkbox" id="billingConsent" onclick="sameBilling(this)">
                                        <label for="billingConsent">Use the same details for billing details</label>
                                    </div>
                                </div>

                                <div class="group-input">
                                    <div class="form-input">
                                        <div class="input-container">
                                            <span><img src="{{ url('img/master/name-black.svg') }}" alt="name"
                                                    class="black">
                                                <img src="{{ url('img/master/name-red.svg') }}" alt="name-red"
                                                    class="red"></span>
                                            <input type="text" name="firstname" id="f-name" placeholder="First Name*"
                                                autocomplete="off" class="firstname inputfirstname">
                                        </div>
                                        <div class="input-container">
                                            <span><img src="{{ url('img/master/name-black.svg') }}" alt="name"
                                                    class="black">
                                                <img src="{{ url('img/master/name-red.svg') }}" alt="name-red"
                                                    class="red"></span>
                                            <input type="text" name="lastname" id="l-name" placeholder="Last Name"
                                                autocomplete="off"  class="lastname inputlastname">
                                        </div>
                                        <div class="input-container">
                                            <span><img src="{{ url('img/master/house-black.svg') }}" alt="house"
                                                    class="black">
                                                <img src="{{ url('img/master/house-red.svg') }}" alt="house-red"
                                                    class="red"></span>
                                            <input type="text" name="address1" id="adress-1" placeholder="Address 1*"
                                                autocomplete="off" class="inputaddress1">
                                        </div>
                                        <div class="input-container">
                                            <span><img src="{{ url('img/master/house-black.svg') }}" alt="house"
                                                    class="black">
                                                <img src="{{ url('img/master/house-red.svg') }}" alt="house-red"
                                                    class="red"></span>
                                            <input type="text" name="address2" id="adress-1" placeholder="Address 2*"
                                                autocomplete="off" class="inputaddress2">
                                        </div>
                                        <div class="input-container">
                                            <span><img src="{{ url('img/master/city-black.svg') }}" alt="city-black"
                                                    class="black">
                                                <img src="{{ url('img/master/city-red.svg') }}" alt="city-red"
                                                    class="red"></span>
                                            <input type="text" name="city" id="city" placeholder="City/Town*"
                                                autocomplete="off" class="inputcity">
                                        </div>
                                        <div class="input-container">
                                            <span><img src="{{ url('img/master/postcode-black.svg') }}"
                                                    alt="postcode-black" class="black">
                                                <img src="{{ url('img/master/postcode-red.svg') }}" alt="postcode-red"
                                                    class="red"></span>
                                            <input type="text" name="postcode" id="postcode" placeholder="PostCode*"
                                                autocomplete="off" class="inputpostcode">
                                        </div>
                                        <div class="input-container">
                                            <span><img src="{{ url('img/master/province-black.svg') }}"
                                                    alt="province-black" class="black">
                                                <img src="{{ url('img/master/province-red.svg') }}" alt="province-red"
                                                    class="red"></span>
                                            <input type="text" name="province" id="province" placeholder="Province"
                                                autocomplete="off">
                                        </div>
                                        <div class="input-container">
                                            <span><img src="{{ url('img/master/pin-black.svg') }}" alt="pin-black"
                                                    class="black">
                                                <img src="{{ url('img/master/pin-red.svg') }}" alt="pin-red"
                                                    class="red"></span>
                                            <select name="country" id="location"  class="inputcountry">
                                                <option value="">Select Country*</option>
                                                @foreach ($countries as $code => $country)
                                                    <option value="{{$code}}">{{$country}}</option>
                                                @endforeach
                                                
                                            </select>
                                    
                                        </div>

                                    </div>
                                </div>
                                <div class="buttons">
                                    <button class="btn-white" type="button" onclick="prev();">
                                        <img src="{{ url('img/cart/previous-arrow.svg') }}" alt="previous-arrow">
                                        Previous
                                        </button>
                                        <button class="btn-blue" type="button" onclick="cartFormSubmit('billing')">
                                            Next
                                            <img src="{{ url('img/cart/next-arrow.svg') }}" alt="next-arrow">
                                        </button>
                                </div>
                            </div>
                        </form>
                        <form class="form-inner delegate" id="stepThree">
                            <input type="hidden" name="rowId" value="">
                            <input type='hidden' name='delegate' value='1'>
                            @csrf
                            <div class="card-detail">
                                <p id="course-name">{{$cartItems->first()->name}}</p>
                                <div class="booking-content">
                                    <p><strong id="method">Booking Type:</strong><span>
                                        @switch($cartItems->first()->options['method'] ?? '')
                                        @case('classroom')
                                        Classroom  
                                        @break
                                        @case('online')
                                        Online
                                        @break
                                        @case('virtual')
                                        Virtual
                                        @break
                                        @endswitch
                                        </span>
                                    </p>
                                </div>
                            </div>
                            <div class="form billing-details delegate-details">
                                <h2>Delegate Details</h2>
                                <p id="delegate-detail">
                                    
                                    @switch($cartItems->first()->options['method'])
                                    @case ('classroom')
                                        
                                        <p>Location: {{$cartItems->first()->options->location}}</p>
                                        <p>Date: {{$cartItems->first()->options->date}}</p>
                                    @break

                                    @case ('virtual')
                                       {{$cartItems->first()->options->date}}
                                    @break

                                    @case ('online')
                                    
                                        @if(!empty($cartItems->first()->options['addons']))
                                       
                                           <ul>
                                            @foreach($cartItems->first()->options['addons'] as $addon)
                                            
                                           <li> {{$addon->name }}</li>
                                            @endforeach
                                            </ul>
                                        @endif
                                     @break;
                                @endswitch
                                </p>
                                <div class="form-consent">
                                    <input name="contactConsent" type="checkbox" id="delegateConsent" onclick="sameDelegate(this)">
                                    <label for="delegateConsent">Use your Details</label>
                                </div>

                                <div class="group-input">
                                    <div class="form-input delegatedetail">
                                        <h3 class="headingJS">Delegate <span>1</span></h3>
                                        <div class="input-container">
                                            <span><img src="{{ url('img/master/name-black.svg') }}" alt="name"
                                                    class="black">
                                                <img src="{{ url('img/master/name-red.svg') }}" alt="name-red"
                                                    class="red"></span>
                                            <input type="text" name="firstname" id="f-name" placeholder="First Name*"
                                                autocomplete="off" class="firstname inputfirstname">
                                        </div>
                                        <div class="input-container">
                                            <span><img src="{{ url('img/master/name-black.svg') }}" alt="name"
                                                    class="black">
                                                <img src="{{ url('img/master/name-red.svg') }}" alt="name-red"
                                                    class="red"></span>
                                            <input type="text" name="lastname" id="l-name" placeholder="Last Name"
                                                autocomplete="off"  class="firstname inputlastname">
                                        </div>
                                        <div class="input-container">
                                            <span><img src="{{ url('img/contactus/phone-call.svg') }}" alt="phone-call"
                                                    class="black">
                                                <img src="{{ url('img/contactus/phone-callred.svg') }}" alt="phonecall-red"
                                                    class="red"></span>
                                            <!-- <input type="number" name="phone" id="phone" placeholder="Phone Number*" autocomplete="off"> -->
                                            <div class="phonecode-field field-black">
                                                <select class="country-code c_code"></select>
                                                <span class="prefix code"></span>
                                                <input type="number" class="telephone tel mobile" placeholder="Phone Number*" min=0 autocomplete="off">
                                                <div style="z-index:-1;width:0;height:0;pointer-events: none;">
                                                    <input type="text" name="phone" class="phonenumber mobilenumber" tabindex="-1" autocomplete="off">
                                                    <input type="text" name="phonecode" class="phonecode" tabindex="-1" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-container">
                                            <span><img src="{{ url('img/contactus/phone-call.svg') }}" alt="phone-call"
                                                    class="black">
                                                <img src="{{ url('img/contactus/phone-callred.svg') }}" alt="phonecall-red"
                                                    class="red"></span>
                                            <!-- <input type="number" name="phone" id="phone" placeholder="Phone Number*" autocomplete="off"> -->
                                            <div class="phonecode-field field-black">
                                                <select class="country-code mcode"></select>
                                                <span class="prefix  "></span>
                                                <input type="number" class="telephone " placeholder="Telephone Number" min=0>
                                                <div style="z-index:-1;width:0;height:0;pointer-events: none;">
                                                   
                                                     <input type="text" name="telephone" class="phonenumber">
                                                    <input type="text" name="cphonecode" class="phonecode">
                                                    <input type="text" name="t_code" class="countrycode" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-container">
                                            <span><img src="{{ url('img/contactus/email.svg') }}" alt="email"
                                                    class="black">
                                                <img src="{{ url('img/contactus/email-red.svg') }}" alt="email-red"
                                                    class="red"></span>
                                            <input type="text" name="email" id="email" placeholder="Email*"
                                                autocomplete="off" class="email inputemail">
                                        </div>
                                        <div class="input-container">
                                            <span><img src="{{ url('img/contactus/email.svg') }}" alt="email"
                                                    class="black">
                                                <img src="{{ url('img/contactus/email-red.svg') }}" alt="email-red"
                                                    class="red"></span>
                                            <input type="text" name="confirm-email" id="confirm-email"
                                                placeholder="Confirm Email*" autocomplete="off" class="email inputemail">
                                        </div>
                                    </div>
                                 
                                </div>
                                <div class="buttons">
                                    <button class="btn-white" type="button" onclick="prevTwo();">
                                        <img src="{{ url('img/cart/previous-arrow.svg') }}" alt="previous-arrow">
                                        Previous
                                    </button>
                                    <button class="btn-blue" type="button" onclick="cartFormSubmit('delegate')">
                                        Next
                                        <img src="{{ url('img/cart/next-arrow.svg') }}" alt="next-arrow">
                                    </button>
                                </div>
                            </div>

                        </form>
                        <div class="payment-detail" id="stepFour">
                            <div class="group-input">
                                
                                
                            </div>
                            {{ Form::open(array('route'=>'cartCheckout', 'id'=>'pay_form')) }}
                            <div class="form-consent">
                                <input type="checkbox" name="agree" id="agree">
                                <label for="agree">I have read and agree with the terms and conditions.</label>
                            </div>
                            <div class="buttons">
                                <button type="button" class="btn-white" onclick="cancelOrder()">
                                    <img src="{{ url('img/cart/back-arrow.svg') }}" alt="back-arrow">Cancel Order
                                </button>
                                <button type="button" class="btn-blue" onclick="checkAgree()">
                                    Confirm Payment<img src="{{ url('img/cart/next-arrow.svg') }}" alt="next-arrow">
                                </button>
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Steps Section -->

@endsection

@section('footerScripts')

       
    <script>
        var submitCustomerRoute   = '{{ route('customerDetailSubmit') }}';
        var submitBillingRoute    = '{{ route('billingDetailSubmit') }}';
        var submitDelegateRoute   = '{{ route('delegateDetailSubmit') }}';
        var summaryPageRoute      = "{{ route('summary') }}";
        var customerData          = "{{route('customerData')}}";

    </script>
    <script src="{{ url('script/cartDetail.js') }}"></script>

    
@endsection
