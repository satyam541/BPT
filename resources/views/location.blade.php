@extends("layouts.master")
@section("content")

<!-- Start Banner Section -->
<section class="flex-container banner location-banner">
    <div class="container">
        @include("layouts.navbar")
        <div class="banner-container">
            <h1>Best Practice Training Locations</h1>
            <p>We utilise present day, work - accommodating spaces in every single significant city, with a great vehicle, joins and close by convenience. We likewise carry the classroom to your location of choice with our onsite training.</p>
            <div class="breadcrums">
                <ul>
                    <li><a href="">Home</a></li>
                    <img src="{{url('img/master/breadcrum-arrow.svg')}}" alt="breadcrums" class="white">
                    <img src="{{url('img/location/breadcrum-black.svg')}}" alt="breadcrums" class="black">
                    <li><a href="">Locations</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Section -->  

<!-- Start Convenient Section -->
<section class="flex-container convenient">
    <div class="container">
    <div class="heading">
            <h2>Find The Most Convenient <span>Location For You</span></h2>
        </div>
        <div class="convenient-container">
            <div class="convenient-list">
                <div class="convenient-content">
                    <span>
                    <img src="{{url('img/location/globe.svg')}}" alt="globe" class="black">
                        <img src="{{url('img/location/globe-white.svg')}}" alt="globe" class="white">
                    </span>
                    <div class="content">
                        <h3>London</h3>
                        <div class="buttons">
                            <a class="btn-blue open-popup enquiryJS" data-quote="View Details">
                                View Details<img src="{{url('img/location/btn-arrow.svg')}}" alt="btn-arrow">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="convenient-content">
                    <span>
                    <img src="{{url('img/location/globe.svg')}}" alt="globe" class="black">
                        <img src="{{url('img/location/globe-white.svg')}}" alt="globe" class="white">
                    </span>
                    <div class="content">
                        <h3>Manchester</h3>
                        <div class="buttons">
                            <a class="btn-blue open-popup enquiryJS" data-quote="View Details">
                                View Details<img src="{{url('img/location/btn-arrow.svg')}}" alt="btn-arrow">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="convenient-content">
                    <span>
                    <img src="{{url('img/location/globe.svg')}}" alt="globe" class="black">
                        <img src="{{url('img/location/globe-white.svg')}}" alt="globe" class="white">
                    </span>
                    <div class="content">
                        <h3>Cardiff</h3>
                        <div class="buttons">
                            <a class="btn-blue open-popup enquiryJS" data-quote="View Details">
                                View Details<img src="{{url('img/location/btn-arrow.svg')}}" alt="btn-arrow">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="convenient-content">
                    <span>
                    <img src="{{url('img/location/globe.svg')}}" alt="globe" class="black">
                        <img src="{{url('img/location/globe-white.svg')}}" alt="globe" class="white">
                    </span>
                    <div class="content">
                        <h3>Birminghamon</h3>
                        <div class="buttons">
                            <a class="btn-blue open-popup enquiryJS" data-quote="View Details">
                                View Details<img src="{{url('img/location/btn-arrow.svg')}}" alt="btn-arrow">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="convenient-content">
                    <span>
                    <img src="{{url('img/location/globe.svg')}}" alt="globe" class="black">
                        <img src="{{url('img/location/globe-white.svg')}}" alt="globe" class="white">
                    </span>
                    <div class="content">
                        <h3>Bristol</h3>
                        <div class="buttons">
                            <a class="btn-blue open-popup enquiryJS" data-quote="View Details">
                                View Details<img src="{{url('img/location/btn-arrow.svg')}}" alt="btn-arrow">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="convenient-content">
                    <span>
                    <img src="{{url('img/location/globe.svg')}}" alt="globe" class="black">
                        <img src="{{url('img/location/globe-white.svg')}}" alt="globe" class="white">
                    </span>
                    <div class="content">
                        <h3>Leeds</h3>
                        <div class="buttons">
                            <a class="btn-blue open-popup enquiryJS" data-quote="View Details">
                                View Details<img src="{{url('img/location/btn-arrow.svg')}}" alt="btn-arrow">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="largest">
                <h2>Largest Location</h2>
                <p>Southampton is the largest city located in England. The city is situated 69 miles south-west of London and 15 miles west north-west of Portsmouth. Southampton is the main port and neigh bouring city.</p>
                <div class="buttons">
                    <a href="javascript:void(0);" class="btn-blue">
                    <img src="{{url('img/location/learn.svg')}}" alt="learn"> Learn More
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Convenient Section --> 

<!-- Start Find Section -->
<section class="flex-container find">
    <div class="container">
        <div class="find-container">
            <span>
            <img src="{{url('img/location/route.svg')}}" alt="route">
            </span>
            <div class="content">
                <h2>Can't Find a Suitable Location?</h2>
                <p>We are always looking to expand our reach, so let us know where you are and we'll do our best to offer an ideal location.</p>
            </div>
            <div class="buttons">
                <a href="javascript:void(0);" class="btn-blue open-popup enquiryJS" data-quote="Enquire">
                    <img src="{{url('img/location/enquire.svg')}}" alt="enquire"> Enquire
                </a>
            </div>
        </div>
    </div>
</section>
<!-- Start Find Section -->

<!-- Start Popular Section -->
<section class="flex-container popular">
    <div class="container">
        <div class="popular-container">
            <div class="popular-info">
                <div class="heading">
                    <h2>Popular <span>Locations</span></h2>
                </div>
                <div class="search">
                    <input type="text" placeholder="Search location here....">
                    <button>
                        Search
                    </button>
                </div>
            </div>
            
            <div class="popular-list">
                <a href="javascript:void(0);" class="popular-content">
                    <span class="img">
                        <img src="{{url('img/location/around.svg')}}" alt="around">
                    </span>
                    <span class="content">
                        Southampton
                        <img src="{{url('img/location/breadcrum-black.svg')}}" alt="breadcrums">
                    </a>
                </a>
                <a href="javascript:void(0);" class="popular-content">
                    <span class="img">
                        <img src="{{url('img/location/around.svg')}}" alt="around">
                    </span>
                    <span class="content">
                        Manchester
                        <img src="{{url('img/location/breadcrum-black.svg')}}" alt="breadcrums">
                    </a>
                </a>
                <a href="javascript:void(0);" class="popular-content">
                    <span class="img">
                        <img src="{{url('img/location/around.svg')}}" alt="around">
                    </span>
                    <span class="content">
                        Kingston Upon Hall
                        <img src="{{url('img/location/breadcrum-black.svg')}}" alt="breadcrums">
                    </a>
                </a>
                <a href="javascript:void(0);" class="popular-content">
                    <span class="img">
                        <img src="{{url('img/location/around.svg')}}" alt="around">
                    </span>
                    <span class="content">
                        Birmingham
                        <img src="{{url('img/location/breadcrum-black.svg')}}" alt="breadcrums">
                    </a>
                </a>

                <a href="javascript:void(0);" class="popular-content">
                    <span class="img">
                        <img src="{{url('img/location/around.svg')}}" alt="around">
                    </span>
                    <span class="content">
                        Southampton
                        <img src="{{url('img/location/breadcrum-black.svg')}}" alt="breadcrums">
                    </a>
                </a>
                <a href="javascript:void(0);" class="popular-content">
                    <span class="img">
                        <img src="{{url('img/location/around.svg')}}" alt="around">
                    </span>
                    <span class="content">
                        Manchester
                        <img src="{{url('img/location/breadcrum-black.svg')}}" alt="breadcrums">
                    </a>
                </a>
                <a href="javascript:void(0);" class="popular-content">
                    <span class="img">
                        <img src="{{url('img/location/around.svg')}}" alt="around">
                    </span>
                    <span class="content">
                        Kingston Upon Hall
                        <img src="{{url('img/location/breadcrum-black.svg')}}" alt="breadcrums">
                    </a>
                </a>
                <a href="javascript:void(0);" class="popular-content">
                    <span class="img">
                        <img src="{{url('img/location/around.svg')}}" alt="around">
                    </span>
                    <span class="content">
                        Birmingham
                        <img src="{{url('img/location/breadcrum-black.svg')}}" alt="breadcrums">
                    </a>
                </a>

                <a href="javascript:void(0);" class="popular-content">
                    <span class="img">
                        <img src="{{url('img/location/around.svg')}}" alt="around">
                    </span>
                    <span class="content">
                        Southampton
                        <img src="{{url('img/location/breadcrum-black.svg')}}" alt="breadcrums">
                    </a>
                </a>
                <a href="javascript:void(0);" class="popular-content">
                    <span class="img">
                        <img src="{{url('img/location/around.svg')}}" alt="around">
                    </span>
                    <span class="content">
                        Manchester
                        <img src="{{url('img/location/breadcrum-black.svg')}}" alt="breadcrums">
                    </a>
                </a>
                <a href="javascript:void(0);" class="popular-content">
                    <span class="img">
                        <img src="{{url('img/location/around.svg')}}" alt="around">
                    </span>
                    <span class="content">
                        Kingston Upon Hall
                        <img src="{{url('img/location/breadcrum-black.svg')}}" alt="breadcrums">
                    </a>
                </a>
                <a href="javascript:void(0);" class="popular-content">
                    <span class="img">
                        <img src="{{url('img/location/around.svg')}}" alt="around">
                    </span>
                    <span class="content">
                        Birmingham
                        <img src="{{url('img/location/breadcrum-black.svg')}}" alt="breadcrums">
                    </a>
                </a>

                <a href="javascript:void(0);" class="popular-content">
                    <span class="img">
                        <img src="{{url('img/location/around.svg')}}" alt="around">
                    </span>
                    <span class="content">
                        Southampton
                        <img src="{{url('img/location/breadcrum-black.svg')}}" alt="breadcrums">
                    </a>
                </a>
                <a href="javascript:void(0);" class="popular-content">
                    <span class="img">
                        <img src="{{url('img/location/around.svg')}}" alt="around">
                    </span>
                    <span class="content">
                        Manchester
                        <img src="{{url('img/location/breadcrum-black.svg')}}" alt="breadcrums">
                    </a>
                </a>
                <a href="javascript:void(0);" class="popular-content">
                    <span class="img">
                        <img src="{{url('img/location/around.svg')}}" alt="around">
                    </span>
                    <span class="content">
                        Kingston Upon Hall
                        <img src="{{url('img/location/breadcrum-black.svg')}}" alt="breadcrums">
                    </a>
                </a>
                <a href="javascript:void(0);" class="popular-content">
                    <span class="img">
                        <img src="{{url('img/location/around.svg')}}" alt="around">
                    </span>
                    <span class="content">
                        Birmingham
                        <img src="{{url('img/location/breadcrum-black.svg')}}" alt="breadcrums">
                    </a>
                </a>

                <a href="javascript:void(0);" class="popular-content">
                    <span class="img">
                        <img src="{{url('img/location/around.svg')}}" alt="around">
                    </span>
                    <span class="content">
                        Southampton
                        <img src="{{url('img/location/breadcrum-black.svg')}}" alt="breadcrums">
                    </a>
                </a>
                <a href="javascript:void(0);" class="popular-content">
                    <span class="img">
                        <img src="{{url('img/location/around.svg')}}" alt="around">
                    </span>
                    <span class="content">
                        Manchester
                        <img src="{{url('img/location/breadcrum-black.svg')}}" alt="breadcrums">
                    </a>
                </a>
                <a href="javascript:void(0);" class="popular-content">
                    <span class="img">
                        <img src="{{url('img/location/around.svg')}}" alt="around">
                    </span>
                    <span class="content">
                        Kingston Upon Hall
                        <img src="{{url('img/location/breadcrum-black.svg')}}" alt="breadcrums">
                    </a>
                </a>
                <a href="javascript:void(0);" class="popular-content">
                    <span class="img">
                        <img src="{{url('img/location/around.svg')}}" alt="around">
                    </span>
                    <span class="content">
                        Birmingham
                        <img src="{{url('img/location/breadcrum-black.svg')}}" alt="breadcrums">
                    </a>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- End Popular Section -->

<!-- Start Buy Section -->
<section class="flex-container buy">
    <div class="container">
        <div class="buy-container">
            <div class="heading center-heading">
                <h2>Number Of User Buys Our Courses <span>In The World</span></h2>
            </div>
            <span class="img">
                <img src="{{url('img/location/buy-bg.png')}}" alt="buy">
            </span>
        </div>
    </div>
</section>
<!-- End Buy Section -->

<!-- Start Form-Map Section -->
<section class="flex-container form-map">
    <div class="container">
        <div class="form-container">
            <form class="form" id="prince2-other">
                <div class="heading center-heading">
                    <h2>Get In Touch With <span>Us</span></h2>
                </div>
                <div class="form-input">
                    <div class="input-container">
                        <span><img src="{{url('img/location/name.svg')}}" alt="name" class="black">
                        <img src="{{url('img/location/name-red.svg')}}" alt="name-red" class="red"></span>
                        <input type="text" name="f-name" id="f-name" placeholder="First Name*"
                            autocomplete="off">
                    </div>
                    <div class="input-container">
                        <span><img src="{{url('img/location/email.svg')}}" alt="email" class="black">
                        <img src="{{url('img/location/email-red.svg')}}" alt="email-red" class="red"></span>
                        <input type="text" name="email" id="email" placeholder="Email*" autocomplete="off">
                    </div>
                    <div class="input-container">
                        <span><img src="{{url('img/location/phone-call.svg')}}" alt="phone-call" class="black">
                        <img src="{{url('img/location/phone-callred.svg')}}" alt="phonecall-red" class="red"></span>
                        <!-- <input type="number" name="phone" id="phone" placeholder="Phone Number*" autocomplete="off"> -->
                        <div class="phonecode-field">
                            <select class="country-code"></select>
                            <span class="prefix"></span>
                            <input type="number" class="telephone" placeholder="Phone Number*">
                            <div style="z-index:-1;width:0;height:0;pointer-events: none;">
                                <input type="text" name="Phone" class="phonenumber">
                            </div>
                        </div>
                    </div>
                    <div class="input-container">
                        <span><img src="{{url('img/location/house.svg')}}" alt="house" class="black">
                        <img src="{{url('img/location/house-red.svg')}}" alt="house-red" class="red"></span>
                        <input type="text" name="address" id="adress" placeholder="Address"
                            autocomplete="off">
                    </div>
                    <div class="input-container">
                        <span><img src="{{url('img/location/comment.svg')}}" alt="comment" class="black">
                        <img src="{{url('img/location/comment-red.svg')}}" alt="comment-red" class="red"></span>
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