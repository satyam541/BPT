@extends("layouts.master")
@section("content")

<!-- Start Banner Section -->
<section class="flex-container banner cart-banner">
    <div class="container">
        @include("layouts.navbar")
        <div class="banner-container">
            <h1>Cart</h1>
            <p>BPT was founded over 20 years ago with one simple mission: Finding the most trusted training courses around, at the most competitive prices. We recognise that the training marketplace is crowded.</p>
            <div class="breadcrums">
                <ul>
                    <li><a href="javascript:void(0);">Home</a></li>
                    <li><img src="{{url('img/master/breadcrum-arrow.svg')}}" alt="arrow" class="white"></li>
                    <li><a href="javascript:void(0);">Cart</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Section -->

<!-- Start Steps Section -->
<section class="flex-container steps">2
    
    <div class="container">
        <div class="steps-container">
            <div class="heading center-heading">
                <h2>Payment <span>Steps</span></h2>
                <p>Fill It With Some Training Courses - Take A Look At Our Catalogue.</p>
            </div>
            <div class="payment-container">
                <div class="detail-container">
                    <div class="detail">
                        <p>Customer Details</p>
                        <span>1</span>
                    </div>
                   <div class="detail">
                        <p>Billing Details</p>
                        <span>2</span>
                   </div>
                   <div class="detail">
                        <p>Delegate Details</p>
                        <span>3</span>
                   </div>
                   <div class="detail">
                        <p>Summary Details</p>
                        <span>4</span>
                   </div>
                </div>
                <div class="order-container">
                    <form class="form" id="stepOne">
                        <h2>Customer Details</h2>
                        <div class="form-input">
                            <div class="input-container">
                                <span><img src="{{url('img/master/name-black.svg')}}" alt="name" class="black">
                                <img src="{{url('img/master/name-red.svg')}}" alt="name-red" class="red"></span>
                                <input type="text" name="f-name" id="f-name" placeholder="Name*"
                                    autocomplete="off">
                            </div>
                            <input type="hidden" name="type" value="other"> 
                                    <input type="hidden" name="Url" id="url" value="{{Request::url()}}">
                            <div class="input-container">
                                <span><img src="{{url('img/master/email-black.svg')}}" alt="email" class="black">
                                <img src="{{url('img/master/email-red.svg')}}" alt="email-red" class="red"></span>
                                <input type="text" name="email" id="email" placeholder="Email*" autocomplete="off">
                            </div>
                            <div class="input-container">
                                <span><img src="{{url('img/master/phone-callblack.svg')}}" alt="phone-call" class="black">
                                <img src="{{url('img/master/phone-callred.svg')}}" alt="phonecall-red" class="red"></span>
                                <!-- <input type="number" name="phone" id="phone" placeholder="Phone Number*" autocomplete="off"> -->
                                <div class="phonecode-field field-black">
                                    <select class="country-code"></select>
                                    <span class="prefix"></span>
                                    <input type="number" class="telephone" placeholder="Phone Number*">
                                    <div style="z-index:-1;width:0;height:0;pointer-events: none;">
                                        <input type="text" name="Phone" class="phonenumber">
                                    </div>
                                </div>
                            </div>
                            <div class="input-container">
                                <span><img src="{{url('img/master/house-black.svg')}}" alt="house" class="black">
                                <img src="{{url('img/master/house-red.svg')}}" alt="house-red" class="red"></span>
                                <input type="text" name="address" id="adress" placeholder="Address"
                                    autocomplete="off">
                            </div>
                            <div class="input-container">
                                <span><img src="{{url('img/master/comment-black.svg')}}" alt="comment" class="black">
                                <img src="{{url('img/master/comment-red.svg')}}" alt="comment-red" class="red"></span>
                                <textarea placeholder="Message (Optional)" id="message" name="message"></textarea>
                            </div>
                        </div>
                        <div class="form-consent">
                            <input name="contactConsent" type="checkbox" id="offerConsent">
                            <label for="offerConsent">Click here to sign up to our email marketing, offers and discounts</label>
                        </div>
                        <div class="form-consent">
                            <p>The information you provide shall be processed by Best Practice Training Limited – a professional training organisation. Your data shall be used by a member of staff to contact you regarding your enquiry.
                            </p>
                        </div>
                        <div class="form-consent">
                            <p>Please click <a>here</a> for privacy policy. </p>
                        </div>
                        <div class="form-consent">
                            <input name="contactConsent" type="checkbox" id="checkConsent">
                            <label for="checkConsent">By submitting this enquiry I agree to be contacted in the most suitable manner (by phone or email) in order to respond to my enquiry.</label>
                        </div>
                        <div class="consent-error" style="display: none;">
                            <p>We cannot process your enquiry without contacting you, please tick to confirm you
                                consent to us contacting you about your enquiry</p>
                        </div>
                        <div class="form-consent">
                            <input type="checkbox" name="marketing_consent" id="allowconsent">
                            <label for="allowconsent">Click here to sign up to our email marketing, offers and discounts</label>
                        </div>
                        <div class="buttons">
                            <button class="btn-blue" type="button" onclick="stepOne();">
                                <img src="{{url('img/cart/next-arrow.svg')}}" alt="next-arrow">
                                Next
                            </button>
                        </div>
                    </form>
                    <div class="form-inner" id="stepTwo">
                        <div class="card-detail">
                            <p>Please Select Your Payment Options And Complete The Details Below</p>
                            <div class="input-container">
                                <span><img src="{{url('img/master/credit-black.svg')}}" alt="credit-black" class="black">
                                <img src="{{url('img/master/credit-red.svg')}}" alt="credit-red" class="red"></span>
                                    <select name="credit-card" id="credit-card">
                                        <option value="">Credit/Debit card*</option>
                                    </select>
                            </div>
                            <div class="input-container">
                                <span><img src="{{url('img/master/name-black.svg')}}" alt="name" class="black">
                                <img src="{{url('img/master/name-red.svg')}}" alt="name-red" class="red"></span>
                                <select name="debit-card" id="debit-card">
                                        <option value="">Debit card*</option>
                                    </select>
                            </div>
                        </div>
                        <form class="form billing-details">
                            <h2>Billing Details</h2>
                            <div class="form-consent">
                                <input name="contactConsent" type="checkbox" id="checkConsent">
                                <label for="checkConsent">Use the same details for billing details</label>
                            </div>
                        
                            <div class="group-input">
                                <div class="form-input">
                                    <div class="input-container">
                                        <span><img src="{{url('img/master/name-black.svg')}}" alt="name" class="black">
                                        <img src="{{url('img/master/name-red.svg')}}" alt="name-red" class="red"></span>
                                        <input type="text" name="f-name" id="f-name" placeholder="First Name*"
                                            autocomplete="off">
                                    </div>
                                    <div class="input-container">
                                        <span><img src="{{url('img/master/name-black.svg')}}" alt="name" class="black">
                                        <img src="{{url('img/master/name-red.svg')}}" alt="name-red" class="red"></span>
                                        <input type="text" name="l-name" id="l-name" placeholder="Last Name*"
                                            autocomplete="off">
                                    </div>
                                    <div class="input-container">
                                        <span><img src="{{url('img/master/house-black.svg')}}" alt="house" class="black">
                                        <img src="{{url('img/master/house-red.svg')}}" alt="house-red" class="red"></span>
                                        <input type="text" name="address-1" id="adress-1" placeholder="Address 1*" autocomplete="off">
                                    </div>
                                    <div class="input-container">
                                        <span><img src="{{url('img/master/house-black.svg')}}" alt="house" class="black">
                                        <img src="{{url('img/master/house-red.svg')}}" alt="house-red" class="red"></span>
                                        <input type="text" name="address-1" id="adress-1" placeholder="Address 2*" autocomplete="off">
                                    </div>
                                    <div class="input-container">
                                        <span><img src="{{url('img/master/city-black.svg')}}" alt="city-black" class="black">
                                        <img src="{{url('img/master/city-red.svg')}}" alt="city-red" class="red"></span>
                                        <input type="text" name="city" id="city" placeholder="City/Town*" autocomplete="off">
                                    </div>
                                    <div class="input-container">
                                        <span><img src="{{url('img/master/postcode-black.svg')}}" alt="postcode-black" class="black">
                                        <img src="{{url('img/master/postcode-red.svg')}}" alt="postcode-red" class="red"></span>
                                        <input type="text" name="postcode" id="postcode" placeholder="PostCode*" autocomplete="off">
                                    </div>
                                    <div class="input-container">
                                        <span><img src="{{url('img/master/province-black.svg')}}" alt="province-black" class="black">
                                        <img src="{{url('img/master/province-red.svg')}}" alt="province-red" class="red"></span>
                                        <input type="text" name="province" id="province" placeholder="Province*" autocomplete="off">
                                    </div>
                                    <div class="input-container">
                                        <span><img src="{{url('img/master/pin-black.svg')}}" alt="pin-black" class="black">
                                        <img src="{{url('img/master/pin-red.svg')}}" alt="pin-red" class="red"></span>
                                        <input type="text" name="location" id="location" placeholder="United Kingdom*" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="buttons">
                                <button class="btn-white" type="button" onclick="prev();">
                                    <img src="{{url('img/cart/previous-arrow.svg')}}" alt="previous-arrow">
                                    Previous
                                </buttton>
                                <button class="btn-blue" type="button" onclick="stepThree();">
                                    Next
                                    <img src="{{url('img/cart/next-arrow.svg')}}" alt="next-arrow">
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="form-inner delegate" id="stepThree">
                        <div class="card-detail">
                                <p>CCNA Training</p>
                                <div class="input-container">
                                    <p><strong>Booking Type:</strong> Online</p>
                                </div>
                        </div>
                        <form class="form billing-details delegate-details">
                            <h2>Delegate Details</h2>
                            <p>Choose from over 200 courses which cover all aspects of business and personal training, including Project Management, IT Security, Business and many more. Our courses cater to every training need, from introductory crash courses to advanced and prestigious qualifications, all to the highest standard of quality.</p>
                            <div class="form-consent">
                                <input name="contactConsent" type="checkbox" id="checkConsent">
                                <label for="checkConsent">Use your Details</label>
                            </div>
                        
                            <div class="group-input">
                                <div class="form-input">
                                    <h3>Delegate 1</h3>
                                    <div class="input-container">
                                        <span><img src="{{url('img/master/name-black.svg')}}" alt="name" class="black">
                                        <img src="{{url('img/master/name-red.svg')}}" alt="name-red" class="red"></span>
                                        <input type="text" name="f-name" id="f-name" placeholder="First Name*"
                                            autocomplete="off">
                                    </div>
                                    <div class="input-container">
                                        <span><img src="{{url('img/master/name-black.svg')}}" alt="name" class="black">
                                        <img src="{{url('img/master/name-red.svg')}}" alt="name-red" class="red"></span>
                                        <input type="text" name="l-name" id="l-name" placeholder="Last Name*"
                                            autocomplete="off">
                                    </div>
                                    <div class="input-container">
                                        <span><img src="{{url('img/contactus/phone-call.svg')}}" alt="phone-call" class="black">
                                        <img src="{{url('img/contactus/phone-callred.svg')}}" alt="phonecall-red" class="red"></span>
                                        <!-- <input type="number" name="phone" id="phone" placeholder="Phone Number*" autocomplete="off"> -->
                                        <div class="phonecode-field field-black">
                                            <select class="country-code"></select>
                                            <span class="prefix"></span>
                                            <input type="number" class="telephone" placeholder="Phone Number*" min=0>
                                            <div style="z-index:-1;width:0;height:0;pointer-events: none;">
                                                <input type="text" name="phone" class="phonenumber" tabindex="-1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-container">
                                        <span><img src="{{url('img/contactus/phone-call.svg')}}" alt="phone-call" class="black">
                                        <img src="{{url('img/contactus/phone-callred.svg')}}" alt="phonecall-red" class="red"></span>
                                        <!-- <input type="number" name="phone" id="phone" placeholder="Phone Number*" autocomplete="off"> -->
                                        <div class="phonecode-field field-black">
                                            <select class="country-code"></select>
                                            <span class="prefix"></span>
                                            <input type="number" class="telephone" placeholder="Phone Number*" min=0>
                                            <div style="z-index:-1;width:0;height:0;pointer-events: none;">
                                                <input type="text" name="phone" class="phonenumber" tabindex="-1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-container">
                                        <span><img src="{{url('img/contactus/email.svg')}}" alt="email" class="black">
                                        <img src="{{url('img/contactus/email-red.svg')}}" alt="email-red" class="red"></span>
                                        <input type="text" name="email" id="email" placeholder="Email*" autocomplete="off">
                                    </div>
                                    <div class="input-container">
                                        <span><img src="{{url('img/contactus/email.svg')}}" alt="email" class="black">
                                        <img src="{{url('img/contactus/email-red.svg')}}" alt="email-red" class="red"></span>
                                        <input type="text" name="confirm-email" id="confirm-email" placeholder="Confirm Email*" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-input">
                                    <h3>Delegate 1</h3>
                                    <div class="input-container">
                                        <span><img src="{{url('img/master/name-black.svg')}}" alt="name" class="black">
                                        <img src="{{url('img/master/name-red.svg')}}" alt="name-red" class="red"></span>
                                        <input type="text" name="f-name" id="f-name" placeholder="First Name*"
                                            autocomplete="off">
                                    </div>
                                    <div class="input-container">
                                        <span><img src="{{url('img/master/name-black.svg')}}" alt="name" class="black">
                                        <img src="{{url('img/master/name-red.svg')}}" alt="name-red" class="red"></span>
                                        <input type="text" name="l-name" id="l-name" placeholder="Last Name*"
                                            autocomplete="off">
                                    </div>
                                    <div class="input-container">
                                        <span><img src="{{url('img/contactus/phone-call.svg')}}" alt="phone-call" class="black">
                                        <img src="{{url('img/contactus/phone-callred.svg')}}" alt="phonecall-red" class="red"></span>
                                        <!-- <input type="number" name="phone" id="phone" placeholder="Phone Number*" autocomplete="off"> -->
                                        <div class="phonecode-field field-black">
                                            <select class="country-code"></select>
                                            <span class="prefix"></span>
                                            <input type="number" class="telephone" placeholder="Phone Number*" min=0>
                                            <div style="z-index:-1;width:0;height:0;pointer-events: none;">
                                                <input type="text" name="phone" class="phonenumber" tabindex="-1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-container">
                                        <span><img src="{{url('img/contactus/phone-call.svg')}}" alt="phone-call" class="black">
                                        <img src="{{url('img/contactus/phone-callred.svg')}}" alt="phonecall-red" class="red"></span>
                                        <!-- <input type="number" name="phone" id="phone" placeholder="Phone Number*" autocomplete="off"> -->
                                        <div class="phonecode-field field-black">
                                            <select class="country-code"></select>
                                            <span class="prefix"></span>
                                            <input type="number" class="telephone" placeholder="Phone Number*" min=0>
                                            <div style="z-index:-1;width:0;height:0;pointer-events: none;">
                                                <input type="text" name="phone" class="phonenumber" tabindex="-1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-container">
                                        <span><img src="{{url('img/contactus/email.svg')}}" alt="email" class="black">
                                        <img src="{{url('img/contactus/email-red.svg')}}" alt="email-red" class="red"></span>
                                        <input type="text" name="email" id="email" placeholder="Email*" autocomplete="off">
                                    </div>
                                    <div class="input-container">
                                        <span><img src="{{url('img/contactus/email.svg')}}" alt="email" class="black">
                                        <img src="{{url('img/contactus/email-red.svg')}}" alt="email-red" class="red"></span>
                                        <input type="text" name="confirm-email" id="confirm-email" placeholder="Confirm Email*" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="buttons">
                                <button class="btn-white" type="button" onclick="prevTwo();">
                                    <img src="{{url('img/cart/previous-arrow.svg')}}" alt="previous-arrow">
                                    Previous
                                </button>
                                <button class="btn-blue" type="button" onclick="stepFour();">
                                    Next
                                    <img src="{{url('img/cart/next-arrow.svg')}}" alt="next-arrow">
                                </button>
                            </div>
                        </form>
                        
                    </div>
                    <div class="payment-detail" id="stepFour">
                        <div class="payment">
                            <h2>Payment Detail</h2>
                            <div class="payment-content">
                                <p><strong>Payment Method: </strong> Credit Card</p>
                                <p><strong>Payment Method: </strong> Credit Card</p>
                            </div>
                        </div>
                        <div class="payment">
                            <h2>Payment Detail</h2>
                            <div class="payment-content">
                                <p><strong>Payment Method: </strong> Credit Card</p>
                                <p><strong>Payment Method: </strong> Credit Card</p>
                                <p><strong>Payment Method: </strong> Credit Card</p>
                            </div>
                        </div>
                        <div class="payment">
                            <h2>Payment Detail</h2>
                            <div class="payment-content">
                                <p><strong>Payment Method: </strong> Credit Card</p>
                                <p><strong>Payment Method: </strong> Credit Card</p>
                            </div>
                        </div>
                        <div class="form-consent">
                            <input type="checkbox" name="marketing_consent" id="readconsent">
                            <label for="readconsent">I have read and agree with the terms and conditions.</label>
                        </div>
                        <div class="buttons">
                            <button type="button" class="btn-white">
                                <img src="{{url('img/cart/back-arrow.svg')}}" alt="back-arrow">Cancel Order
                            </button>
                            <button type="button" class="btn-blue">
                                Confirm Payment<img src="{{url('img/cart/next-arrow.svg')}}" alt="next-arrow">
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Steps Section -->

@endsection