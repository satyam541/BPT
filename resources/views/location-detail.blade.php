@extends("layouts.master")
@section("content")

<!-- Start Banner Section -->
<section class="flex-container banner location-banner">
    <div class="container">
    @include("layouts.navbar")
        <div class="banner-container">
            <h1>Southampton</h1>
            <p>Southampton is the largest city located in England. The city is situated 69 miles south-west of London and 15 miles west north-west of Portsmouth. Southampton is the main port and neigh bouring city to the New Forest. The city has population of around 253,651.</p>
            <div class="breadcrums">
                <ul>
                    <li><a href="">Home</a></li>
                    <img src="{{url('img/master/breadcrum-arrow.svg')}}" alt="breadcrums" class="white">
                    <img src="{{url('img/master/breadcrum-black.svg')}}" alt="breadcrums" class="black">
                    <li><a href="">Locations</a></li>
                    <img src="{{url('img/master/breadcrum-arrow.svg')}}" alt="breadcrums" class="white">
                    <img src="{{url('img/master/breadcrum-black.svg')}}" alt="breadcrums" class="black">
                    <li><a href="">Southampton</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Section -->

<!-- Start Location-Main Section -->
<section class="flex-container location-main">
    <div class="container">
        <div class="location-main-container">
            <div class="location-content">
                <div class="heading">
                    <h2>Southampton</h2>
                </div>
                <p>Southampton is a town in Hampshire, South East England, 70 miles (110 km) south-west of London and 24 km north-west of Portsmouth. A major port, and close to the New Forest, it stands at Southampton Water's northernmost point, at the confluence of the River Test and Itchen, with the River Hamble joining south. the unitary authority had a population of 253,651.</p>
                <p>Education</p>
                <p>Southampton has two universities</p>
                <ul>
                    <li>University of Southampton</li>
                    <li>Southampton Solent University</li>
                </ul>
            </div>
            <div class="location-contact">
               <div class="contact-top">
                    <span class="city">
                        <img src="{{url('img/location-detail/city.png')}}" alt="city">
                    </span>
                    <div class="contact-info">
                        <div class="content">
                            <div class="count">
                                <h2 class="count-number" data-to="99" data-speed="3000"></h2>
                                <span>+</span>
                            </div>
                            <p>Number of Locations</p>
                        </div>
                        <div class="address">
                            <div class="info">
                                <h2>Contact:</h2>
                                <div class="reach">
                                    <span>
                                        <img src="{{url('img/location-detail/call-black.svg')}}" alt="call-black">
                                    </span>
                                    <a href="tel:01344 203999">01344 203999 </a>
                                </div>
                            </div>
                            <div class="info">
                                <h2>Address:</h2>
                            <div class="reach">
                                    <span>
                                        <img src="{{url('img/location-detail/pin.svg')}}" alt="pin">
                                    </span>
                                    <a href="javascript:void(0);">
                                    1 Charlotte Place Southampton Hampshire SO14 0TB
                                </a>
                            </div>
                            </div>
                        </div>
                    </div>
               </div>
               <div class="contact-bottom">
                   <h2>People Likes Us Worldwide</h2>
                  <span>
                  <img src="{{url('img/location-detail/map.png')}}" alt="map">
                  </span>
               </div>
            </div>
        </div>
    </div>
</section>
<!-- End Location-Main Section -->

<!-- Start Key Section -->
<section class="flex-container key">
    <div class="container">
        <div class="key-container">
            <div class="info">
                <h2>
                Some Key Points of the Location
                </h2>
                <div class="buttons">
                    <a href="javascript:void(0);" class="btn-white open-popup enquiryJS" data-quote="Enquire Now">
                    <img src="{{url('img/location-detail/call.svg')}}" alt="call">Enquire Now
                    </a>
                </div>
            </div>
            <div class="key-list">
                <div class="key-content">
                    <span>
                        <img src="{{url('img/location-detail/clock.svg')}}" alt="clock">
                    </span>
                    <h3>Opening Hours</h3>
                    <p>9.00am-17.30pm</p>
                </div>
                <div class="key-content">
                    <span>
                        <img src="{{url('img/location-detail/facilities.svg')}}" alt="facilities">
                    </span>
                    <h3>Facilities</h3>
                    <p>WiFi, tea, coffee (both available at all times), biscuits, fruit and ice lollies available</p>
                </div>
                <div class="key-content">
                    <span>
                        <img src="{{url('img/location-detail/tech.svg')}}" alt="tech">
                    </span>
                    <h3>Technology</h3>
                    <p>WiFi, tea, coffee (both available at all times), biscuits, fruit and ice lollies available</p>
                </div>
                <div class="key-content">
                    <span>
                        <img src="{{url('img/location-detail/accessibility.svg')}}" alt="accessibility">
                    </span>
                    <h3>Accessibility</h3>
                    <p>WiFi, tea, coffee (both available at all times), biscuits, fruit and ice lollies available</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Key Section -->

<!-- Start Form-Map Section -->
<section class="flex-container form-map">
    <div class="container">
        <div class="form-container">
            <form class="form" id="locationDetail-form">
                <div class="heading center-heading">
                    <h2>Get In Touch With <span>Us</span></h2>
                </div>
                <div class="form-input">
                    <div class="input-container">
                        <span><img src="{{url('img/master/name-black.svg')}}" alt="name" class="black">
                        <img src="{{url('img/master/name-red.svg')}}" alt="name-red" class="red"></span>
                        <input type="text" name="f-name" id="f-name" placeholder="First Name*"
                            autocomplete="off">
                    </div>
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
                    <p>The information you provide shall be processed by Pearce mayfield – a professional training organisation. Your data shall be used by a member of staff to contact you regarding your enquiry.
                    </p>
                </div>
                <div class="form-consent">
                    <p>Please click <a>here</a> for privacy policy. </p>
                </div>
                <div class="form-consent">
                    <input type="checkbox" id="checkConsent">
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
                        Submit
                    </button>
                </div>
            </form>
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d13633.525907762536!2d75.58587720000001!3d31.320836250000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1613628596038!5m2!1sen!2sin" width="400" height="270" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
    </div>
</section>
<!-- End Form-Map Section -->

@endsection