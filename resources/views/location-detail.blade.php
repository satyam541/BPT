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
                    <img src="{{url('img/location/breadcrum-black.svg')}}" alt="breadcrums" class="black">
                    <li><a href="">Locations</a></li>
                    <img src="{{url('img/master/breadcrum-arrow.svg')}}" alt="breadcrums" class="white">
                    <img src="{{url('img/location/breadcrum-black.svg')}}" alt="breadcrums" class="black">
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
                   <img src="{{url('img/location-detail/map.png')}}" alt="map">
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

@endsection