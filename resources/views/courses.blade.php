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
                        @php
                        $content = $selectedCourse->countryContent;
                        @endphp
                        @if (!empty($content['overview']))
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
                       
                        @if (
                            !empty($content['summary']) || !empty($content['detail']) || 
                            !empty($content['pre_requities']) || !empty($content['who_should_attend']) || 
                            !empty($content['what_will_you_learn']) 
                            )
                            <li class="tab-click" data-target="course">
                                <span class="image">
                                    <img src="{{ url('img/courses/content.svg') }}" alt="content">
                                </span>
                                <p class="tab">
                                    Course Content
                                </p>
                                <div class="number">02</div>
                            </li>
                        @endif
                        
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

                    @if (!empty($content['overview']))
                    <div class="tab-content tab-common" id="overview">
                        <div class="overview-content" id="showmorecontent">
                            <h2>Course Overview</h2>
                            {!! $content->overview !!}
                        </div>
                        <div class="buttons">
                            <a href="#showmorecontent" class="btn-blue showmorecontent">
                                <span class="text">Show More</span>
                            </a>
                        </div>
                    </div>
                    @endif
                    @if (
                            !empty($content['summary']) || !empty($content['detail']) || 
                            !empty($content['pre_requities']) || !empty($content['who_should_attend']) || 
                            !empty($content['what_will_you_learn']) 
                        )
                    <div class="tab-content tab-common" id="course">                   
                        <div class="overview-content" id="showmorecontent">
                            <h2>Course Content</h2>
                            @if (!empty($content['summary']))
                            {!!$content->summary!!}
                            @endif
                            @if (!empty($content['detail']))
                            {!!$content->detail!!}
                            @endif
                            @if (!empty($content['pre_requities']))
                            {!!$content->pre_requities!!}
                            @endif
                            @if (!empty($content['who_should_attend']))
                            {!!$content->who_should_attend!!}
                            @endif
                            @if (!empty($content['what_will_you_learn']))
                            {!!$content->what_will_you_learn!!}
                            @endif
                            
                            
                        </div>
                        <div class="buttons">
                            <a href="#showmorecontent" class="btn-blue showmorecontent">
                                <span class="text">Show More</span>
                            </a>
                        </div>
                        
                    </div>
                    @endif
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
                <h2>{!! $pageDetail->overlay['heading']->heading !!}</h2>
                <p>{!! $pageDetail->overlay['heading']->content !!}</p>
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
    <section class="flex-container training" id="datesprices">
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
                                {{$schedules->onEachSide(2)->fragment('classroom-booking')->appends(request()->query())->links()}}
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
                                {{$virtualSchedules->onEachSide(2)->fragment('classroom-booking')->appends(request()->query())->links()}}
                            @endif
                        </div>
                        <div id="online-block">
                        </div>
                        <div id="onsite-block">
                        </div>
                    </div>
                </div>
            </div>
            <div class="no-schedule">
        <div class="heading center-heading">
            <h2>Managing Change and Leading Teams</h2>
        </div>
            <p>Contact us for Date and Price</p>
            <div class="buttons">
                <div class="btn-blue">
                    Enquire <img src="{{url('../img/master/mail.svg')}}" alt="up-arrow">
                </div>
            </div>
                <p>---- OR ----</p>
                <p>Reach us at <strong>02034687222</strong> or <strong>info@sixsigma.co.uk</strong> for more information.</p>
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
                    @foreach ($pageDetail->features as $feature)
                    <div class="virtual-content">
                        <div class="content">
                            <span>
                                <img src="{{ $feature->getImagePath() }}" alt="{{$feature->image_alt}}">
                            </span>
                            <h2>{!! $feature->heading !!}</h2>
                        </div>
                        <p>{!! $feature->content !!}</p>
                    </div>
                    @endforeach
                    
                </div>
                <div class="virtual-img">
                    <h2>{!! $pageDetail->features_right['heading']->heading !!}</h2>
                    <span>
                        <img src="{{ $pageDetail->features_right['heading']->getImagePath() }}" alt="{{$pageDetail->features_right['heading']->image_alt}}">
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
                        <h2>{!! heading_split($pageDetail->work_flow['heading']->heading) !!}</h2>
                        <p>{!! $pageDetail->work_flow['heading']->page_tag_line !!}</p>
                    </div>
                    <p>{!! $pageDetail->work_flow['heading']->content !!}</p>
                </div>
                @php
                    unset($pageDetail->work_flow['heading']);
                @endphp
                <div class="work-list">

                    @foreach ($pageDetail->work_flow as $flow)
                    <div class="content">
                        <span>
                            <img src="{{ $flow->getImagePath() }}" alt="{{$flow->image_alt}}}">
                        </span>
                        <h3>{!! $flow->heading !!}</h3>
                        <p>{!! $flow->content !!}</p>
                    </div>
                    @endforeach
                   
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
                        <h2>{!! heading_split($pageDetail->benefits['heading']->heading) !!}</h2>
                    </div>
                    <p>{!! $pageDetail->benefits['heading']->content !!}</p>
                    @php
                        unset($pageDetail->benefits['heading'])
                    @endphp
                    <div class="language-list">
                        @foreach ($pageDetail->benefits as $benefit)
                            <div class="content">
                            <span>
                                <img src="{{ $benefit->getImagePath() }}" alt="{{$benefit->image_alt}}">
                            </span>
                            <h3>{!! $benefit->heading !!}</h3>
                        </div>
                        @endforeach
                        
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
                    <h2>{!! heading_split($pageDetail->online_courses['heading']->heading) !!}</h2>
                </div>
                @php
                    unset($pageDetail->online_courses['heading'])
                @endphp
                <div class="skill-list">
                    @foreach ($pageDetail->online_courses as $item)
                    <div class="skill-content">
                        <h3>{!! $item->heading !!}</h3>
                        <p>{!! $item->content !!}</p>
                        <div class="buttons">
                            <a href="javascript:void(0);" class="btn-blue open-popup enquiryJS" data-quote="Enquire Now">
                                <img src="{{ url('img/courses/email.svg') }}" alt="email">
                                Enquire Now
                            </a>
                        </div>
                    </div>
                    @endforeach
                   
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
                    @foreach ($relatedCourses as $relatedCourse)
                    <a href="{{ $relatedCourse->url }}" class="related-content">
                        <span>
                            <img src="{{ url('img/courses/related-book.svg') }}" alt="related-book">
                        </span>
                        <div class="name">{!! $relatedCourse->name !!}</div>
                    </a>
                    @endforeach
                  
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
                    <h2>{!! $pageDetail->largest_location['heading']->heading !!}</h2>
                    <p>{!! $pageDetail->largest_location['heading']->content !!}</p>
                    <div class="buttons">
                        <a href="javascript:void(0);" class="btn-blue open-popup enquiryJS" data-quote="Learn More">
                            <img src="{{ url('img/courses/learn.svg') }}" alt="learn">
                            Learn More
                        </a>
                    </div>
                </div>
                <div class="location-content">
                    <div class="heading">
                        <h2>{!! heading_split($pageDetail->location['heading']->heading) !!}</h2>
                    </div>
                    <div class="location-list">
                        @foreach ($popularLocations as $popularLocation)
                        <a href="{{$popularLocation->url}}" class="content">
                            <span class="image">
                                <img src="{{ url('img/courses/travel.svg') }}" alt="travel">
                            </span>
                            <div class="location-name">{!! $popularLocation->name !!}</div>
                            <span class="arrow">
                                <img src="{{ url('img/courses/dashed-arrow.svg') }}" alt="dashed-arrow">
                            </span>
                        </a>
                        @endforeach
                        
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

   $(document).ready(function(){
      @if(!empty($hash))
         window.location.hash = "{{$hash}}";
      @endif
      $(window).on('hashchange',function(){ 
        var hash = window.location.hash;
        if(hash!="")
         openSpecificDeliveryMethod(hash);
      });
      if(window.location.href)
      {
        var hash = window.location.hash;
        if(hash!="")
        openSpecificDeliveryMethod(hash);
      }
    });
    function openSpecificDeliveryMethod(method)
    {
      method = method.replace(/(?![a-z0-9-])./gi, ""); 
      switch(method){
      case 'classroom-booking':
            displaySchedules('classroom');
            $("#classroom").addClass('active');
            $("select[name=deliveryMethod]").val("#"+method);
            scrollToSpecificDiv("#datesprices");
            break;
      case 'virtual-booking' :
            displaySchedules('virtual');
            $("#virtual").addClass('active');
            $("select[name=deliveryMethod]").val("#"+method);
            scrollToSpecificDiv("#datesprices");
            break;
      case 'online-booking' :
            displaySchedules('online');
            $("#online").addClass('active');
            $("select[name=deliveryMethod]").val("#"+method);
            scrollToSpecificDiv("#datesprices");
            break;
      case 'onsite-booking' :
            displaySchedules('onsite');
            $("#onsite").addClass('active');
            $("select[name=deliveryMethod]").val("#"+method);
            scrollToSpecificDiv("#datesprices");
            break;
      default:
         scrollToSpecificDiv("#"+method);
         break;
      }
    }
    function scrollToSpecificDiv(selector)
    {
      if($(selector).length>0)
      {
         var selectorTop = $(selector).offset().top;
         console.log(selectorTop);
         $('html,body').animate({ 
            scrollTop:selectorTop
         }, 1000);
      }
      else{
         console.log('scrolltop not found');
      }
    }
</script>

@endsection
