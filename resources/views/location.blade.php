@extends("layouts.master")
@section("content")

<!-- Start Banner Section -->
<section class="flex-container banner location-banner">
    <div class="container">
        @include("layouts.navbar")
        <div class="banner-container">
            <h1>{{ $pageDetail->banner['header']->heading}}</h1>
            <p>{{ $pageDetail->banner['header']->content}}</p>
            <div class="breadcrums">
                <ul>
                    <li><a href="{{url('home')}}">Home</a></li>
                    <img src="{{url('img/master/breadcrum-arrow.svg')}}" alt="breadcrums" class="white">
                    <img src="{{url('img/master/breadcrum-black.svg')}}" alt="breadcrums" class="black">    
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
    <div class="heading center-heading">
            <h2>Popular Locations in <span>{{ replaceVar('{countryname}')}}</span></h2>
    </div>
        <div class="convenient-container">
            <div class="convenient-list">
                @foreach($popularLocations as $popularLocation)
                <div class="convenient-content">
                    <span>
                    <img src="{{url('img/location/globe.svg')}}" alt="globe" class="black">
                        <img src="{{url('img/location/globe-white.svg')}}" alt="globe" class="white">
                    </span>
                    <div class="content">
                        <a href={{$popularLocation->url}}>{{$popularLocation->name}}</a>
                        <div class="buttons">
                            <a href={{$popularLocation->url}} class="btn-blue">
                                View detail<img src="{{url('img/location/btn-arrow.svg')}}" alt="btn-arrow">
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
           
            </div>
            <div class="largest">
                <!-- <h2>{{$pageDetail->convenient['largest']->heading}}</h2> -->
                <p>{{$pageDetail->convenient['largest']->content}}</p>
                <div class="buttons">
                    <a class="btn-blue open-popup enquiryJS" data-quote="Get More Info" data-heading="Get More Info" data-type="other">
                    <img src="{{url('img/location/learn.svg')}}" alt="learn"> Get More Info
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
            <img src="{{ url($pageDetail->find['find_container']->getIconPath()) }}" alt="{{$pageDetail->find['find_container']->icon_alt}}">
            </span>
            <div class="content">
                <h2>{{$pageDetail->find['find_container']->heading}}</h2>
                <p>{{$pageDetail->find['find_container']->content}}</p>
            </div>
            <div class="buttons">
                <a class="btn-blue open-popup enquiryJS" data-quote="Enquire Now" data-heading="Enquire Now" data-type="other">
                    <img src="{{url('img/location/enquire.svg')}}" alt="enquire"> Enquire Now
                </a>
            </div>
        </div>
    </div>
</section>
<!-- Start Find Section -->

<!-- Start Popular Section -->
<section class="flex-container popular">
    <div class="container">
        @if(count($locations)>6)
        <div class="popular-container">
            <div class="popular-info">
                <div class="heading center-heading">
                    <h2>Browse All <span>Locations</span></h2>
                </div>
                <div class="search">
                    <input type="text" name="filter" id="locationFilter" placeholder="Search location here....">
                </div>
            </div>
            
            <div class="popular-list">
                @foreach($locations as $location)
                <div class="item" >
                <a href="{{$location->url}}" class="popular-content">
                    <span class="img">
                        <img src="{{url('img/location/around.svg')}}" alt="around">
                    </span>
                    <span class="content text-name">
                        {{$location->name}}
                        <img src="{{url('img/master/breadcrum-black.svg')}}" alt="breadcrums">
                    </span>
                </a>
                </div>
                @endforeach
          
            </div>
        </div>
        @endif
    </div>
</section>
<!-- End Popular Section -->

<!-- Start Buy Section -->
<section class="flex-container buy">
    <div class="container">
        <div class="buy-container">
            <div class="heading center-heading">
                <h2>{!! heading_split($pageDetail->buy['buy_container']->heading) !!}  </h2>
            </div>
            <span class="img">
                <img src="{{ url($pageDetail->buy['buy_container']->getImagePath()) }}" alt="{{$pageDetail->buy['buy_container']->image_alt}}">
            </span>
        </div>
    </div>
</section>
<!-- End Buy Section -->

<!-- Start Form-Map Section -->
<section class="flex-container form-map">
    <div class="container">
        <div class="form-container">
            <form class="form" onsubmit="submitEnquiry(this)" id="location-form">
                @csrf
                <div class="heading center-heading">
                    <h2>Get In Touch With <span>Us</span></h2>
                </div>
                <div class="form-input">
                    <div class="input-container">
                        <span><img src="{{url('img/master/name-black.svg')}}" alt="name" class="black">
                        <img src="{{url('img/master/name-red.svg')}}" alt="name-red" class="red"></span>
                        <input type="text" name="name" id="f-name" placeholder="Name*"
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
                                <input type="text" name="phone" class="phonenumber">
                            </div>
                        </div>
                    </div>
                    <div class="input-container">
                        <span><img src="{{url('img/master/house-black.svg')}}" alt="house" class="black">
                        <img src="{{url('img/master/house-red.svg')}}" alt="house-red" class="red"></span>
                        <input type="text" name="address" id="adress" placeholder="Address"
                            autocomplete="off">
                    </div>
                    <div class="input-container message">
                        <span><img src="{{url('img/master/comment-black.svg')}}" alt="comment" class="black">
                        <img src="{{url('img/master/comment-red.svg')}}" alt="comment-red" class="red"></span>
                        <textarea placeholder="Message (Optional)" id="message" name="message"></textarea>
                    </div>
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
                    <button onclick="EnquiryFormSubmit('enquiry',this)" class="btn-blue">
                        Submit
                    </button>
                </div>
            </form>
            <div class="map">
                <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?hl=en&amp;q={{$location->latitude}},{{$location->longitude}}&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
            </div>
        </div>
    </div>
</section>
<!-- End Form-Map Section -->

@endsection

@section('footerScripts')
    
<script>
 
    $("#locationFilter").on('keyup',function(){
       
       var input = $(this).val();
       var locations = $(".popular-list .item");
       locations.hide();

       $.each(locations, function( index, location ) {
           location = $(location);
           var locationName = location.find('.text-name').text().trim();
           console.log(locationName);
           regex = new RegExp('^(' + input + ')', 'i');
           if (regex.test(locationName)) 
           {
               location.show();
           }
       });
 
   }).on('keypress',function(e){
       // prevent form submit on enter key
       if(e.keyCode === 13 || e.which === 13)
       {
           event.preventDefault();
           return false;
       }
   });
    </script>

@endsection