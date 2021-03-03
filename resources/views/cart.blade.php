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
<section class="flex-container steps">
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
                <form class="form">
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
                        <button class="btn-blue">
                            <img src="{{url('img/cart/next-arrow.svg')}}" alt="next-arrow">
                            Next
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- End Steps Section -->

@endsection