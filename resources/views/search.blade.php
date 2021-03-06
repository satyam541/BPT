@extends("layouts.master")
@section("content")

<!-- Start Banner Section -->
<section class="flex-container banner search-banner">
    <div class="container">
        @include("layouts.navbar")
        <div class="banner-container">
            <h1>{{$pageDetail->banner['header']->heading}}</h1>
            <p>{{$pageDetail->banner['header']->content}}</p>
            <form class="search-form">
            <div class="search">
                            <input type="text" class="auto-complete-course auto-redirect" value="{{$query}}" placeholder="Search your course here...." name="q" >
                            <button>
                                Search
                            </button>
                        </div>
                    </form>
            <div class="breadcrums">
                <ul>
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li><img src="{{url('img/master/breadcrum-arrow.svg')}}" alt="arrow" class="white"></li>
                    <li><a href="">Search</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Section -->

<!-- Start search section-->
<section class="most-search">
    <div class="container">
        <div class="search-container">
            <div class="heading">
                <h2>Most Searched <span>Topics</span></h2>
            </div>
            <div class="search-list">
                @foreach ($popularTopics->take(4) as $popularTopic)
                {{$popularTopic->loadContent()}}
                <a class="search-info" href="{{url('/training-courses'.$popularTopic->reference)}}">
                    <span><img src="{{url('img/search/alarm-clock.svg')}}" alt="alarm-clock">
                    {{$popularTopic->courses->count()}} 
                    @if ($popularTopic->courses->count() == 1)
                    Course
                    @elseif($popularTopic->courses->count() > 1)
                    Courses
                    @endif
                 </span>
                    <h3>{{$popularTopic->name}}</h3>
                    <p>{!!$popularTopic->summary!!}</p>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- End search section -->

<!-- Start result section -->
<section class="result">
    <div class="container">
        <div class="result-container">
            <div class="heading">
                @if($result->count() != 0 && $query !="")
                <h2>{{$result->count()}} results found for "{{$query}}"</h2>
                @endif
            </div>
            <div class="result-content">
            <div class="result-list">
                @foreach ($result as $course)
                {{$course->loadContent()}}
                <div class="result-info">
                    <div class="heading">
                        <h2>{{$course->name}} - <span>{{$course->topic->name}}</span></h2>
                    </div>
                    <p>{!!$course->detail!!}</p>
                    <div class="buttons">
                        <a class="btn-blue open-popup enquiryJS"><img src="{{url('img/search/call-us.svg')}}" alt="call-us">Enquire Now</a>
                        <a class="btn-white" href="{{url('/training-courses'.$course->reference)}}"><img src="{{url('img/search/white-arrow.svg')}}" alt="white-arrow">Course Details</a>
                    </div>
                </div>
                @endforeach
                {{$result->links()}}
            </div>

            <div class="filter">
                <div class="filter-info">
                    <h2>Filter</h2>
                    <div class="search-catagories">
                        <p>Courses</p>
                        <ul>
                            @foreach ($popularCourses->take(5) as $popularCourse)
                                <li><a href="{{url('/training-courses'.$popularCourse->reference)}}"> <label for="">{{$popularCourse->name}}</label> </a> </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="search-catagories">
                        <p>Locations</p>
                        <ul>
                            @foreach ($popularLocations->take(5) as $popularLocation)
                                <li><a href="{{url('/training-locations/'.$popularLocation->reference)}}"> <label for="">{{$popularLocation->name}}</label> </a> </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>
<!-- End result section -->

<!-- Start form section -->
<form class="form" onsubmit="submitEnquiry(this)" id="contact-us">
                        @csrf
                        <div class="heading center-heading white-heading">
                            <h2>ONSITE ENQUIRY?</h2>
                            <p>Fill up the form below and we will get back to you!</p>
                        </div>
                        <div class="form-input">
                            <input type="hidden" name="type" value="onsite"> 
                            <input type="hidden" name="Url" id="url" value="{{Request::url()}}">
                            <div class="input-container">
                                <span><img src="{{url('img/master/name-white.svg')}}" alt="name" class="black">
                                <img src="{{url('img/master/name-red.svg')}}" alt="name-red" class="red"></span>
                                <input type="text" name="f-name" id="f-name" placeholder="First Name*"
                                    autocomplete="off">
                            </div>
                            <div class="input-container">
                                <span><img src="{{url('img/master/email-white.svg')}}" alt="email" class="black">
                                <img src="{{url('img/master/email-red.svg')}}" alt="email-red" class="red"></span>
                                <input type="text" name="email" id="email" placeholder="Email*" autocomplete="off">
                            </div>
                            <div class="input-container">
                                <span><img src="{{url('img/master/phone-callwhite.svg')}}" alt="phone-call" class="black">
                                <img src="{{url('img/master/phone-callred.svg')}}" alt="phonecall-red" class="red"></span>
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
                                <span><img src="{{url('img/master/house-white.svg')}}" alt="house" class="black">
                                <img src="{{url('img/master/house-red.svg')}}" alt="house-red" class="red"></span>
                                <input type="text" name="company" id="address" placeholder="Company"
                                    autocomplete="off">
                            </div>
                            <div class="input-container">
                                <span><img src="{{url('img/master/book-white.svg')}}" alt="book" class="black">
                                <img src="{{url('img/master/book-red.svg')}}" alt="book-red" class="red"></span>
                                <input type="text" name="course" id="course" placeholder="Course*"
                                    autocomplete="off">
                            </div>
                            <div class="input-container">
                                <span><img src="{{url('img/master/position-white.svg')}}" alt="position" class="black">
                                <img src="{{url('img/master/position-red.svg')}}" alt="position-red" class="red"></span>
                                <input type="text" name="delegate" id="delegate" placeholder="Number of Delegates*"
                                    autocomplete="off"> 
                            </div>
                            <div class="input-container">
                                <span><img src="{{url('img/master/house-white.svg')}}" alt="house" class="black">
                                <img src="{{url('img/master/house-red.svg')}}" alt="house-red" class="red"></span>
                                <input type="text" name="address" id="address" placeholder="Address"
                                    autocomplete="off">
                            </div>
                            <div class="input-container">
                                <span><img src="{{url('img/master/comment-white.svg')}}" alt="comment" class="black">
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
<!-- End form section -->

@endsection
 