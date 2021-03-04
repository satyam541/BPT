@extends("layouts.master")
@section('content')

    <!-- Start Banner Section -->
    <section class="flex-container banner courses-banner">
        <div class="container">
            @include("layouts.navbar")
            <div class="banner-container">
                <div class="banner-content">
                    <h1>{{ $selectedCourse->name }}</h1>
                    <div class="breadcrums">
                        <ul>
                            <li><a href="{{ Route('home') }}">Home</a></li>
                            <img src="{{ url('img/master/breadcrum-arrow.svg') }}" alt="breadcrums" class="white">
                            <img src="{{ url('img/master/breadcrum-black.svg') }}" alt="breadcrums" class="black">
                            <li><a href="{{ $selectedCourse->topic->url }}">{{ $selectedCourse->topic->name }}</a></li>
                            <img src="{{ url('img/master/breadcrum-arrow.svg') }}" alt="breadcrums" class="white">
                            <img src="{{ url('img/master/breadcrum-black.svg') }}" alt="breadcrums" class="black">
                            <li><a href="javascript:void(0)">{{ $selectedCourse->name }}</a></li>
                        </ul>
                    </div>
                    {!! $selectedCourse->tag_line !!}
                </div>
                <div class="banner-points">
                    <h2>Key Points</h2>
                    <ul>
                        <li>Duration: {{ $selectedCourse->duration }}*</li>
                        <li>Certificate(s): Included</li>
                        <li>Exam(s): Included</li>
                        <li>Support: 24/7</li>
                    </ul>
                    <div class="buttons">
                        <a href="javascript:void(0);" class="btn-blue open-popup enquiryJS" data-quote="Enquire Now">
                            <img src="{{ url('img/courses/email.svg') }}" alt="email">Enquire Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Section -->

    <!-- Start Foundation Section -->
    <section class="flex-container foundation">
        <div class="container">
            <div class="foundation-container">
                <div class="heading">

                    <h2>{!! heading_split($selectedCourse->name) !!}</h2>
                </div>
                <div class="tabs-container">
                    <ul class="tab-links">
                        @if (!empty($selectedCourse->countryContent['overview']))
                        <li class="tab-click" data-target="overview">
                            <span class="image">
                                <img src="{{ url('img/courses/overview.svg') }}" alt="overview">
                            </span>
                            <p class="tab">
                                Overview
                            </p>
                            <div class="number">01</div>
                        </li> 
                        @endif
                        

                        <li class="tab-click" data-target="course">
                            <span class="image">
                                <img src="{{ url('img/courses/content.svg') }}" alt="content">
                            </span>
                            <p class="tab">
                                Course Content
                            </p>
                            <div class="number">02</div>
                        </li>
                        @if ($selectedCourse->faqs->isNotEmpty())
                            <li class="tab-click" data-target="faq">
                                <span class="image">
                                    <img src="{{ url('img/courses/faq.svg') }}" alt="faq">
                                </span>
                                <p class="tab">
                                    FAQs
                                </p>
                                <div class="number">03</div>
                            </li>

                        @endif

                        @if ($selectedCourse->whatsIncluded->isNotEmpty())
                            <li class="tab-click" data-target="included">
                                <span class="image">
                                    <img src="{{ url('img/courses/included.svg') }}" alt="included">
                                </span>
                                <p class="tab">
                                    What's Included
                                </p>
                                <div class="number">04</div>
                            </li>
                        @endif
                    </ul>

                    @if (!empty($selectedCourse->countryContent['overview']))
                    <div class="tab-content tab-common" id="overview">
                        <div class="overview-content" id="showmorecontent">
                            <h2>Course Overview</h2>
                            {!! $selectedCourse->countryContent->overview !!}
                        </div>
                        <div class="buttons">
                            <a href="#showmorecontent" class="btn-blue showmorecontent">
                                <span class="text">Show More</span>
                            </a>
                        </div>
                    </div>
                    @endif
                        
                    <div class="tab-content tab-common" id="course">
                        @if (!empty($selectedCourse->countryContent['summery']))                        
                        <div class="overview-content" id="showmorecontent">
                            <h2>Course Content</h2>
                            
                            {!!$selectedCourse->countryContent->summery!!}
                            
                        </div>
                        <div class="buttons">
                            <a href="#showmorecontent" class="btn-blue showmorecontent">
                                <span class="text">Show More</span>
                            </a>
                        </div>
                        @endif
                    </div>
                    @if ($selectedCourse->faqs->isNotEmpty())
                        <div class="tab-content" id="faq">
                            <div class="heading">
                                <h2>Frequently Asked <span>Questions</span></h2>
                            </div>
                            <div class="faq-list">

                                @foreach ($selectedCourse->faqs as $faq)
                                    <div class="faq-item">

                                        <div class="ques">
                                            <h3>{!! $faq->question !!} </h3>
                                            <span>
                                            </span>
                                        </div>
                                        <div class="ans">
                                            <p>{!! $faq->answer !!}.</p>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    @endif

                    @if ($selectedCourse->whatsIncluded->isNotEmpty())
                        <div class="tab-content" id="included">
                            <div class="heading center-heading">
                                <h2>What's Included <span>Us</span></h2>
                            </div>
                            <div class="included-list">

                                @foreach ($selectedCourse->whatsIncluded as $whatsInclude)
                                    <div class="included-content">
                                        <span>
                                            <img src="{{ url('images/' . $whatsInclude->icon) }}"
                                                alt="{!! $whatsInclude->name !!}">
                                        </span>
                                        <h3>{!! $whatsInclude->name !!}</h3>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- End Foundation Section -->

    <!-- Start Unable Section -->
    <section class="flex-container unable">
        <div class="container">
            <div class="unable-container">
                <h2>Unable to Spare Entire Days Training?</h2>
                <p>We offer the option to learn virtually over consecutive half-days, whilst maintaining your quality
                    day-to-day working commitments. We offer the option to learn virtually over consecutive half-days,
                    whilst maintaining your quality day-to-day working commitments. We offer the option to learn virtually
                    over consecutive half-days, whilst maintaining your quality day-to-day working commitments.</p>
                <div class="buttons">
                    <a href="javascript:void(0);" class="btn-blue open-popup enquiryJS" data-quote="Have a Question?">
                        <img src="{{ url('img/master/arrow.svg') }}" alt="arrow">Have a Question?
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- End Unable Section -->

    <!-- Start Training Section -->
    <section class="flex-container training">
        <div class="container">
            <div class="training-container">
                <div class="heading center-heading">
                    <h2>{!! $selectedCourse->name !!} <span>Training Calender</span></h2>
                </div>
                <div class="filter-top">
                    <div class="heading">
                        <h2>Filters</h2>
                        <img src="{{ url('img/master/breadcrum-black.svg') }}" alt="arrow">
                    </div>
                    <form class="form exclude" method="post" action="{{route('courseFilterRoute')}}">
                        @csrf
                        <div class="select-dropdown">
                            <select name="course" required="required" oninvalid="this.setCustomValidity('Please select your course')">
                                <option value="">Select Your Course:</option>

                                @foreach ($courses as $course)
                                    <option value={{ $course->id }}
                                        {{ $course->id == $selectedCourse->id ? 'selected' : ' ' }}>{{ $course->name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>
                        <div class="select-dropdown">
                            <select name="location">
                                <option value="">Choose a Location:</option>

                                @foreach ($locations as $location)
                                    <option value="{{ $location->reference }}"
                                        {{ $location->reference == $selectedlocation ? 'selected' : ' ' }}>
                                        {{ $location->name }}</option>
                                @endforeach
                                
                            </select>
                        </div>
                        <div class="select-dropdown">
                            <select name="deliveryMethod">
                                <option value="">Select a delivery format:</option>
                                <option value="#virtual-booking">Virtual</option>
                                <option value="#classroom-booking">Classroom</option>
                                <option value="#online-booking">Online</option>
                                <option value="#onsite-booking">Onsite</option>
                            </select>
                        </div>
                        <div class="buttons">
                            <a href="javascript:void(0);" onclick="filterSubmit(this)" class="btn-blue">Explore Now</a>
                        </div>
                    </form>
                </div>
                <div class="calender-container">
                    <div class="calender-left">
                        <div class="heading">
                            <h2>Choose Mode <span>of Training</span></h2>
                            <img src="{{ url('img/master/breadcrum-black.svg') }}" alt="arrow">
                        </div>
                        <div class="modes">
                            <div class="modes-list" id="scheduleLinks">
                                <a href="#classroom-booking" class="methods" id="classroom" data-target="classroom">
                                    <img src="{{ url('img/courses/classroom-blue.svg') }}" alt="classroom" class="blue">
                                    <img src="{{ url('img/courses/classroom-gray.svg') }}" alt="classroom" class="gray">
                                    <p>Classroom</p>
                                </a>
                                <a href="#online-booking" class="methods" id="online" data-target="online">
                                    <img src="{{ url('img/courses/online-blue.svg') }}" alt="online" class="blue">
                                    <img src="{{ url('img/courses/online-gray.svg') }}" alt="online" class="gray">
                                    <p>Online</p>
                                </a>
                                <a href="#virtual-booking" class="methods" id="virtual" data-target="virtual">
                                    <img src="{{ url('img/courses/virtual-blue.svg') }}" alt="virtual" class="blue">
                                    <img src="{{ url('img/courses/virtual-gray.svg') }}" alt="virtual" class="gray">
                                    <p>Virtual</p>
                                </a>
                                <a href="#onsite-booking" class="methods" id="onsite"  data-target="onsite">
                                    <img src="{{ url('img/courses/onsite-blue.svg') }}" alt="onsite" class="blue">
                                    <img src="{{ url('img/courses/onsite-gray.svg') }}" alt="onsite" class="gray">
                                    <p>Onsite</p>
                                </a>
                            </div>
                        </div>
                        <div class="key-point">
                            <h2>Key Points</h2>
                            <p><strong>Duration: </strong>5 Days*</p>
                            <p><strong>Exam(s): </strong> Included</p>
                            <p><strong>Certificate(s): </strong> Included</p>
                            <p><strong>Support: </strong> 24/7</p>
                            <div class="buttons">
                                <a href="javascript:void(0);" class="btn-blue open-popup enquiryJS"
                                    data-quote="Enquire Now">
                                    <img src="{{ url('img/courses/email.svg') }}" alt="email">Enquire Now
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="calender-right">
                        <div id="classroom-block">
                            @if (!$schedules->isEmpty())
                                @foreach ($schedules as $schedule)
                                    <div class="course-content" >
                                        <div class="name">
                                            <a href="javascript:void(0);" class="course-name">{{$schedule->course->name}}</a>
                                            <div class="buttons">
                                                <a href="javascript:void(0);" class="btn-white open-popup enquiryJS"
                                                    data-quote="Enquire Now">
                                                    <img src="{{ url('img/courses/email-black.svg') }}" alt="email">Enquire Now
                                                </a>
                                                <a href="javascript:void(0);" class="btn-blue open-popup enquiryJS"
                                                    data-quote="Book Now">
                                                    <img src="{{ url('img/courses/buy.svg') }}" alt="buy">Book Now
                                                </a>
                                            </div>
                                        </div>
                                        <div class="detail">
                                            <div class="content">
                                                <span>
                                                    <img src="{{ url('../img/courses/course-virtual.svg') }}" alt="course-virtual">
                                                </span>
                                                <div class="sub-content">
                                                    <h3>{{$schedule->response_location}}</h3>
                                                    <p>Best Selling Course in <strong>{{$schedule->response_location}}</strong></p>
                                                </div>
                                            </div>
                                            <div class="date">
                                                <p>{{ $schedule->response_date->isoFormat('ddd') }}</p>
                                                <p>{{ $schedule->response_date->isoFormat('DD') }}</p>
                                                <p>{{ $schedule->response_date->isoFormat('MMM') }}</p>
                                                <p>{{ $schedule->response_date->isoFormat('YYYY') }}</p>
                                            </div>
                                            <div class="rate">
                                                <h3>£{{ceil($schedule->event_price) }}</h3>
                                                <p><strong>Duration: </strong>2 Days</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                {{$schedules->links()}}
                            @endif
                        </div>
                        <div id="virtual-block">
                            @if (!$virtualSchedules->isEmpty())
                                @foreach ($virtualSchedules as $virtual)
                                    <div class="course-content" >
                                        <div class="name">
                                            <a href="javascript:void(0);" class="course-name">{{$virtual->course->name}}</a>
                                            <div class="buttons">
                                                <a href="javascript:void(0);" class="btn-white open-popup enquiryJS"
                                                    data-quote="Enquire Now">
                                                    <img src="{{ url('img/courses/email-black.svg') }}" alt="email">Enquire Now
                                                </a>
                                                <a href="javascript:void(0);" class="btn-blue open-popup enquiryJS"
                                                    data-quote="Book Now">
                                                    <img src="{{ url('img/courses/buy.svg') }}" alt="buy">Book Now
                                                </a>
                                            </div>
                                        </div>
                                        <div class="detail">
                                            <div class="content">
                                                <span>
                                                    <img src="{{ url('../img/courses/course-virtual.svg') }}" alt="course-virtual">
                                                </span>
                                                <div class="sub-content">
                                                    <h3>{{$virtual->response_location}}</h3>
                                                    {{-- <p>Best Selling Courses in <strong>{{$virtual->response_location}}</strong></p> --}}
                                                    <p>Best Selling Course</p>
                                                </div>
                                            </div>
                                            <div class="date">
                                                <p>{{ $virtual->response_date->isoFormat('ddd') }}</p>
                                                <p>{{ $virtual->response_date->isoFormat('DD') }}</p>
                                                <p>{{ $virtual->response_date->isoFormat('MMM') }}</p>
                                                <p>{{ $virtual->response_date->isoFormat('YYYY') }}</p>
                                            </div>
                                            <div class="rate">
                                                <h3>£{{ceil($virtual->event_price) }}</h3>
                                                <p><strong>Duration: </strong>2 Days</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                {{$virtualSchedules->links()}}
                            @endif
                        </div>
                        <div id="online-block">
                        </div>
                        <div id="onsite-block">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Training Section -->

    <!-- Start Virtual Section -->
    <section class="flex-container virtual">
        <div class="container">
            <div class="virtual-container">
                <div class="virtual-list">
                    <div class="virtual-content">
                        <div class="content">
                            <span>
                                <img src="{{ url('img/courses/conference.svg') }}" alt="conference">
                            </span>
                            <h2>Video Conferencing</h2>
                        </div>
                        <p>Using the best web conferencing software to facilitate learner-teacher-learner communication.</p>
                    </div>
                    <div class="virtual-content">
                        <div class="content">
                            <span>
                                <img src="{{ url('img/courses/whiteboard.svg') }}" alt="whiteboard">
                            </span>
                            <h2>Digital Whiteboards</h2>
                        </div>
                        <p>Offering real -time demonstrations and diagrams.Offering real -time demonstrations and diagrams.
                        </p>
                    </div>
                    <div class="virtual-content">
                        <div class="content">
                            <span>
                                <img src="{{ url('img/courses/messaging.svg') }}" alt="messaging">
                            </span>
                            <h2>Instant Messaging</h2>
                        </div>
                        <p>Allowing typed conversations on lower bandwidths.Offering real -time demonstrations and diagrams.
                        </p>
                    </div>
                    <div class="virtual-content">
                        <div class="content">
                            <span>
                                <img src="{{ url('img/courses/control.svg') }}" alt="control">
                            </span>
                            <h2>Participation Controls</h2>
                        </div>
                        <p>Enabling students to participate in discussions, mute their surroundings or virtually "raise"
                            their hands. </p>
                    </div>
                </div>
                <div class="virtual-img">
                    <h2>The Role of Virtual Classrooms in Future Learning</h2>
                    <span>
                        <img src="{{ url('img/courses/future.png') }}" alt="future">
                    </span>
                </div>
            </div>
        </div>
    </section>
    <!-- End Virtual Section -->

    <!-- Start Work Section -->
    <section class="flex-container work">
        <div class="container">
            <div class="work-container">
                <div class="work-content">
                    <div class="heading">
                        <h2>How It <span>Works?</span></h2>
                        <p>FIND COURSES</p>
                    </div>
                    <p>Choose from over 200 courses which cover all aspects of business and personal training, including
                        Project Management, IT Security, Business and many more.Our courses cater to every training need,
                        from introductory crash courses to advanced</p>
                </div>
                <div class="work-list">
                    <div class="content">
                        <span>
                            <img src="{{ url('img/courses/search.svg') }}" alt="search">
                        </span>
                        <h3>Search Courses</h3>
                        <p>Choose from over 200 courses which cover all aspects of business and personal training, including
                        </p>
                    </div>
                    <div class="content">
                        <span>
                            <img src="{{ url('img/courses/details.svg') }}" alt="details">
                        </span>
                        <h3>View Course Details</h3>
                        <p>Choose from over 200 courses which cover all aspects of business and personal training, including
                        </p>
                    </div>
                    <div class="content">
                        <span>
                            <img src="{{ url('img/courses/book.svg') }}" alt="book">
                        </span>
                        <h3>Book Course</h3>
                        <p>Choose from over 200 courses which cover all aspects of business and personal training, including
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Work Section -->

    <!-- Start Language Section -->
    <section class="flex-container language">
        <div class="container">
            <div class="language-container">
                <div class="language-img">
                    <div class="info">
                        <h2>{{$selectedCourse->name}}</h2>
                    </div>
                    {{-- {{dd($virtualSchedules->first()->event_price)}} --}}
                    <div class="price">
                        @if ($schedules->isNotEmpty())
                            @if (!empty($schedules->first()->response_discounted_price) < !empty($schedules->first()->event_price))
                            <span class="rate">£{{$schedules->first()->event_price}}</span>  
                            <span class="offer">£{{$schedules->first()->response_discounted_price}}</span>  
                                
                            @else
                            <span class="offer">£{{$schedules->first()->event_price}}</span> 
                            @endif
                        @elseif($virtualSchedules->isNotEmpty())
                            @if (!empty($virtualSchedules->first()->response_discounted_price) < !empty($virtualSchedules->first()->event_price))
                            <span class="rate">£{{$virtualSchedules->first()->event_price}}</span>  
                            <span class="offer">£{{$virtualSchedules->first()->response_discounted_price}}</span>  
                                
                            @else
                            <span class="offer">£{{$virtualSchedules->first()->event_price}}</span> 
                            @endif
                        @endif
                        
                        
                        
                        <div class="buy">
                            <span>
                                <img src="{{ url('img/courses/stopwatch.svg') }}" alt="stopwatch">
                            </span>
                            <h3>23 hours left at this price!</h3>
                        </div>
                        <div class="buttons">
                            <a href="javascript:void(0);" class="btn-blue open-popup enquiryJS" data-quote="Buy Now">
                                <img src="{{ url('img/courses/buy.svg') }}" alt="buy">
                                Buy Now
                            </a>
                        </div>
                    </div>
                </div>
                <div class="language-content">
                    <div class="heading">
                        <h2>Amazing Courses To Learn <span>Language Better</span></h2>
                    </div>
                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of
                        classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin
                        professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words,
                        consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical
                        literature, discovered the undoubtable source. Lorem Ipsum comes from sections</p>
                    <div class="language-list">
                        <div class="content">
                            <span>
                                <img src="{{ url('img/courses/skilled.svg') }}" alt="skilled">
                            </span>
                            <h3>Skilled Trainers</h3>
                        </div>
                        <div class="content">
                            <span>
                                <img src="{{ url('img/courses/affordable.svg') }}" alt="affordable">
                            </span>
                            <h3>Affordable Courses</h3>
                        </div>
                        <div class="content">
                            <span>
                                <img src="{{ url('img/courses/flexible.svg') }}" alt="flexible">
                            </span>
                            <h3>Efficient & Flexible</h3>
                        </div>
                        <div class="content">
                            <span>
                                <img src="{{ url('img/courses/access.svg') }}" alt="access">
                            </span>
                            <h3>Lifetime Access</h3>
                        </div>
                    </div>
                    <div class="buttons">
                        <a href="javascript:void(0);" class="btn-blue open-popup enquiryJS" data-quote="Enquire Now">
                            <img src="{{ url('img/courses/email.svg') }}" alt="email">Enquire Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Language Section -->

    <!-- Start Skill Section -->
    <section class="flex-container skill">
        <div class="container">
            <div class="skill-container">
                <div class="heading">
                    <h2>Learn a New Skill From <span>Online Courses</span></h2>
                </div>
                <div class="skill-list">
                    <div class="skill-content">
                        <h3>Learn The Latest Skills</h3>
                        <p>Like business analytics, graphic design, Python, and more.</p>
                        <div class="buttons">
                            <a href="javascript:void(0);" class="btn-blue open-popup enquiryJS" data-quote="Enquire Now">
                                <img src="{{ url('img/courses/email.svg') }}" alt="email">
                                Enquire Now
                            </a>
                        </div>
                    </div>
                    <div class="skill-content">
                        <h3>100k Online Courses</h3>
                        <p>In high-demand fields like IT, AI and cloud engineering.</p>
                        <div class="buttons">
                            <a href="javascript:void(0);" class="btn-blue open-popup enquiryJS" data-quote="Enquire Now">
                                <img src="{{ url('img/courses/email.svg') }}" alt="email">
                                Enquire Now
                            </a>
                        </div>
                    </div>
                    <div class="skill-content">
                        <h3>Earn a Certificate</h3>
                        <p>From a leading university in business, computer science, and more.</p>
                        <div class="buttons">
                            <a href="javascript:void(0);" class="btn-blue open-popup enquiryJS" data-quote="Enquire Now">
                                <img src="{{ url('img/courses/email.svg') }}" alt="email">
                                Enquire Now
                            </a>
                        </div>
                    </div>
                    <div class="skill-content">
                        <h3>Up Your Skill</h3>
                        <p>With on-demand training and development programs.</p>
                        <div class="buttons">
                            <a href="javascript:void(0);" class="btn-blue open-popup enquiryJS" data-quote="Enquire Now">
                                <img src="{{ url('img/courses/email.svg') }}" alt="email">
                                Enquire Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Skill Section -->

    <!-- Start Related Section -->
    <div class="flex-container related">
        <div class="container">
            <div class="related-container">
                <div class="heading center-heading white-heading">
                    <h2>Explore Related Courses</h2>
                </div>
                <div class="related-list">
                    <a href="javascript:void(0);" class="related-content">
                        <span>
                            <img src="{{ url('img/courses/related-book.svg') }}" alt="related-book">
                        </span>
                        <div class="name">MOV® Training</div>
                    </a>
                    <a href="javascript:void(0);" class="related-content">
                        <span>
                            <img src="{{ url('img/courses/related-book.svg') }}" alt="related-book">
                        </span>
                        <div class="name">Scrum Training</div>
                    </a>
                    <a href="javascript:void(0);" class="related-content">
                        <span>
                            <img src="{{ url('img/courses/related-book.svg') }}" alt="related-book">
                        </span>
                        <div class="name">CISA Training </div>
                    </a>
                    <a href="javascript:void(0);" class="related-content">
                        <span>
                            <img src="{{ url('img/courses/related-book.svg') }}" alt="related-book">
                        </span>
                        <div class="name">Linux Training Courses</div>
                    </a>
                    <a href="javascript:void(0);" class="related-content">
                        <span>
                            <img src="{{ url('img/courses/related-book.svg') }}" alt="related-book">
                        </span>
                        <div class="name">Primavera Training Courses</div>
                    </a>
                    <a href="javascript:void(0);" class="related-content">
                        <span>
                            <img src="{{ url('img/courses/related-book.svg') }}" alt="related-book">
                        </span>
                        <div class="name">Agile Project Management Training</div>
                    </a>
                    <a href="javascript:void(0);" class="related-content">
                        <span>
                            <img src="{{ url('img/courses/related-book.svg') }}" alt="related-book">
                        </span>
                        <div class="name">P3O® Training</div>
                    </a>
                    <a href="javascript:void(0);" class="related-content">
                        <span>
                            <img src="{{ url('img/courses/related-book.svg') }}" alt="related-book">
                        </span>
                        <div class="name">APMP Training</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Related Section -->

    <!-- Start Popular-Location Section -->
    <section class="flex-container popular-location">
        <div class="container">
            <div class="popular-container">
                <div class="popular-content">
                    <h2>Largest Location</h2>
                    <p>Southampton is the largest city located in England. The city is situated 69 miles south-west of
                        London and 15 miles west north-west of Portsmouth. Southampton is the main port and neigh bouring
                        city.</p>
                    <div class="buttons">
                        <a href="javascript:void(0);" class="btn-blue open-popup enquiryJS" data-quote="Learn More">
                            <img src="{{ url('img/courses/learn.svg') }}" alt="learn">
                            Learn More
                        </a>
                    </div>
                </div>
                <div class="location-content">
                    <div class="heading">
                        <h2>Find The Most Convenient <span>Location For You</span></h2>
                    </div>
                    <div class="location-list">
                        <a href="javascript:void(0);" class="content">
                            <span class="image">
                                <img src="{{ url('img/courses/travel.svg') }}" alt="travel">
                            </span>
                            <div class="location-name">London</div>
                            <span class="arrow">
                                <img src="{{ url('img/courses/dashed-arrow.svg') }}" alt="dashed-arrow">
                            </span>
                        </a>
                        <a href="javascript:void(0);" class="content">
                            <span class="image">
                                <img src="{{ url('img/courses/travel.svg') }}" alt="travel">
                            </span>
                            <div class="location-name">Birminghamon</div>
                            <span class="arrow">
                                <img src="{{ url('img/courses/dashed-arrow.svg') }}" alt="dashed-arrow">
                            </span>
                        </a>
                        <a href="javascript:void(0);" class="content">
                            <span class="image">
                                <img src="{{ url('img/courses/travel.svg') }}" alt="travel">
                            </span>
                            <div class="location-name">Manchester</div>
                            <span class="arrow">
                                <img src="{{ url('img/courses/dashed-arrow.svg') }}" alt="dashed-arrow">
                            </span>
                        </a>
                        <a href="javascript:void(0);" class="content">
                            <span class="image">
                                <img src="{{ url('img/courses/travel.svg') }}" alt="travel">
                            </span>
                            <div class="location-name">Cardiff</div>
                            <span class="arrow">
                                <img src="{{ url('img/courses/dashed-arrow.svg') }}" alt="dashed-arrow">
                            </span>
                        </a>
                        <a href="javascript:void(0);" class="content">
                            <span class="image">
                                <img src="{{ url('img/courses/travel.svg') }}" alt="travel">
                            </span>
                            <div class="location-name">Bristol</div>
                            <span class="arrow">
                                <img src="{{ url('img/courses/dashed-arrow.svg') }}" alt="dashed-arrow">
                            </span>
                        </a>
                        <a href="javascript:void(0);" class="content">
                            <span class="image">
                                <img src="{{ url('img/courses/travel.svg') }}" alt="travel">
                            </span>
                            <div class="location-name">Leeds</div>
                            <span class="arrow">
                                <img src="{{ url('img/courses/dashed-arrow.svg') }}" alt="dashed-arrow">
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Popular-Location Section -->

@endsection
@section('footerScripts')
<script>
   var defaultMethod = "virtual";
</script>
<script src="{{ url("script/filter.js") }}"></script>
<script src="{{ url("script/courseSchedule.js") }}"></script>
<script>
   function submitOnlineForm() {
      $("#onlineBookingForm").submit();
   }
</script>

@endsection
