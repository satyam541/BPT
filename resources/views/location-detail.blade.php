@extends("layouts.master")
@section("content")

<!-- Start Banner Section -->
<section class="flex-container banner location-banner">
    <div class="container">
    @include("layouts.navbar")
        <div class="banner-container">
            <h1>{{$location->name}}</h1>
            <p>{{$location->meta_description}}</p>
            <div class="breadcrums">
                <ul>
                    <li><a href="{{route('home')}}">Home</a></li>
                    <img src="{{url('img/master/breadcrum-arrow.svg')}}" alt="breadcrums" class="white">
                    <img src="{{url('img/master/breadcrum-black.svg')}}" alt="breadcrums" class="black">
                    <li><a href="{{route('locations')}}">Locations</a></li>
                    <img src="{{url('img/master/breadcrum-arrow.svg')}}" alt="breadcrums" class="white">
                    <img src="{{url('img/master/breadcrum-black.svg')}}" alt="breadcrums" class="black">
                    <li><a href="">{{$location->name}}</a></li>
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
                    <h2>{{$location->name}}</h2>
                </div>
               {!! $location->description !!}
            </div>
            <div class="location-contact">
               <div class="contact-top">
                    <span class="city">
                        <img src="{{url('img/location-detail/city.png')}}" alt="city">
                    </span>
                    <div class="contact-info">
                        <div class="content">
                            <div class="count">
                                <h2 class="count-number" data-to="{{websiteDetail()->locations}}" data-speed="3000"></h2>
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
                                    <a href="tel:{{websiteDetail()->contact_number}}">{{websiteDetail()->contact_number}} </a>
                                </div>
                            </div>
                            <div class="info">
                                <h2>Address:</h2>
                            <div class="reach">
                                    <span>
                                        <img src="{{url('img/location-detail/pin.svg')}}" alt="pin">
                                    </span>
                                    <a href="javascript:void(0);">
                                  {{$location->address}}
                                </a>
                            </div>
                            </div>
                        </div>
                    </div>
               </div>
               <div class="contact-bottom">
                   <h2>{{$pageDetail->contact_bottom['contact_bottom']->heading}}</h2>
                  <span>
                  <img src="{{ url($pageDetail->contact_bottom['contact_bottom']->getImagePath()) }}" alt="{{$pageDetail->contact_bottom['contact_bottom']->image_alt}}">
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
                @foreach($pageDetail->key_list as $keylist)
                <div class="key-content">
                    <span>
                        <img src="{{url($keylist->getIconPath())}}" alt="{{$keylist->icon_alt}}">
                    </span>
                    <h3>{{$keylist->heading}}</h3>
                    <p>{{$keylist->content}}</p>
                </div>
                @endforeach
               
            </div>
        </div>
    </div>
</section>
<!-- End Key Section -->

<!-- Start Form-Map Section -->
<section class="flex-container form-map">
    <div class="container">
        <div class="form-container">
            <form class="form" onsubmit="submitEnquiry(this)" id="locationDetail-form">
                @csrf
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
                    <p>The information you provide shall be processed by Pearce mayfield – a professional training organisation. Your data shall be used by a member of staff to contact you regarding your enquiry.
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
                    <button onclick="EnquiryFormSubmit('enquiry',this)" class="btn-blue">
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