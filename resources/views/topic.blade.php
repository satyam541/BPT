@extends("layouts.master")
@section("content")


<!-- Start Banner Section -->
    <section class="flex-container banner topic-banner">
        <div class="container">
            @include("layouts.navbar")
            <div class="banner-container">
            <div class="banner-content">
                {{-- {{dd($topic)}} --}}
                <h1>{{$topic->name}}</h1>
                    <p>{!!$topic->tag_line!!}</p>
                    <div class="breadcrums">
                        <ul>
                            <li><a href="">Home</a></li>
                            <img src="{{url('img/master/breadcrum-arrow.svg')}}" alt="breadcrums" class="white">
                            <img src="{{url('img/master/breadcrum-black.svg')}}" alt="breadcrums" class="black">
                            <li><a href="">{{$topic->name}}</a></li>
                        </ul>
                </div>
            </div>
                <div class="choose-list">
                    @if($topic->Bulletpoint->isNotEmpty())
                    <div class="heading">
                        <h2>REASONS TO CHOOSE</h2>
                    </div>
                    <ul>
                        @foreach ($topic->Bulletpoint as $bulletPoint)
                        <li>{!!$bulletPoint->bullet_point_text!!}</li>    
                        @endforeach
                        
                    </ul>
                    @endif
                </div>
            </div>
        </div>
    </section>
<!-- End Banner Section -->


    <!-- Start topic-courses section -->
        <section class="flex-container topic-courses" id="topic-courses">
            <div class="container">
                <div class="courses-container">
                    <div class="explore-courses">
                        <div class="heading">
                            <h2>{!!heading_split($pageDetail->popular_courses['heading']->heading)!!}</h2>
                        </div>
                        @foreach ($courses as $course)

                        <div class="course-item">
                            <span>
                                <img src="{{url('img/topic/book-black.svg')}}" alt="book-black" class="book-black">
                                <img src="{{url('img/topic/white-book.svg')}}" alt="white-book" class="white-book">
                            </span>
                            <div class="course-name">
                                <a href="{{ url('training-courses' . $course->reference) }}">{{$course->name}}</a>
                                <img src="{{url('img/topic/right-arrow.svg')}}" alt="right-arrow" >
                            </div>
                        </div>
                        @endforeach

                    </div>
                    <div class="courses-info">
                        <h2>{{$pageDetail->popular_courses['heading']->content}}</h2>
                        <span>
                            <img src="{{$pageDetail->popular_courses['heading']->getImagePath()}}" alt="{{$pageDetail->popular_courses['heading']->image_alt}}">
                        </span>
                    </div>
                </div>
            </div>
        </section>
    <!-- End topic-courses section -->

<!-- Start Foundation Section -->
    <section class="flex-container foundation">
        <div class="container">
            <div class="foundation-container">
                @if ($courses->first()->countryContent && $courses->first()->faqs->isnotEmpty())
                <div class="heading">
                    <h2>{!!$courses->first()->name!!}</h2>
                </div>
                @endif
                <div class="tabs-container">
                    <ul class="tab-links">
                        @if ($courses->first()->countryContent)
                        <li class="tab-click" data-target="overview">
                            <span class="image">
                                <img src="{{url('img/courses/overview.svg')}}" alt="overview">
                            </span>
                            <p class="tab">
                            Overview
                            </p>
                            <div class="number">01</div>
                        </li>
                        <li class="tab-click" data-target="course">
                            <span class="image">
                                <img src="{{url('img/courses/content.svg')}}" alt="content">
                            </span>
                            <p class="tab">
                            Course Content
                            </p>
                            <div class="number">02</div>
                        </li>
                        @endif
                        @if ($courses->first()->faqs->isnotEmpty())

                        <li class="tab-click" data-target="faq">
                            <span class="image">
                                <img src="{{url('img/courses/faq.svg')}}" alt="faq">
                            </span>
                            <p class="tab">
                            FAQs
                            </p>
                            <div class="number">03</div>
                        </li>
                        @endif
                    </ul>
                    
                    <div class="tab-content" id="overview">
                        @if ($courses->first()->countryContent)                        
                        <div class="overview-content" id="showmorecontent">
                            <h2>Course Overview</h2>
                            
                            {!!$courses->first()->countryContent->overview!!}
                            
                        </div>
                        <div class="buttons">
                            <a href="#showmorecontent" class="btn-blue showmorecontent">
                                <span class="text">Show More</span>
                            </a>
                        </div>
                        @endif
                    </div>
                    
                    <div class="tab-content" id="faq">
                        <div class="heading">
                            <h2>Frequently Asked <span>Questions</span></h2>
                        </div>
                        @foreach ($courses->first()->faqs as $faq)
                            
                        
                        <div class="faq-list">
                            <div class="faq-item">
                                <div class="ques">
                                <h3>{!!$faq->question!!} </h3>
                                <span>
                                </span>
                                </div>
                                <div class="ans">
                                <p>{!!$faq->answer!!}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- End Foundation Section -->


<!-- Start topic-delivery section -->

    <section class="flex-container topic-delivery">
        <div class="container">
            <div class="delivery-container">
                <div class="delivery-content">
                <div class="heading white-heading">
                    <h2>{!!$pageDetail->delivery_methods['delivery_content']->heading!!}</h2>
                </div>
                <p>{!!$pageDetail->delivery_methods['delivery_content']->content!!}</p>
                </div>
                @php unset($pageDetail->delivery_methods['delivery_content']) @endphp
                <div class="delivery-list">
                    @foreach ($pageDetail->delivery_methods as $deliveryMethods)
                        <a class="item">
                            <span>
                            <img src="{{$deliveryMethods->getImagePath()}}" alt="{{$deliveryMethods->image_alt}}" class="black-icon">
                            <img src="{{$deliveryMethods->getIconPath()}}" alt="{{$deliveryMethods->icon_alt}}" class="white-icon">
                            </span>
                            {!!$deliveryMethods->heading!!}
                        </a>
                        @endforeach
                    
                </div>
            </div>
        </div>
    </section>

<!-- End topic-delivery section -->


<!-- Start topic-choose section -->
    <section class="flex-container topic-choose">
        <div class="container">
            <div class="choose-container">
                <div class="choose-content">
                        <div class="heading">
                           <h2>{!!heading_split($pageDetail->choose_content['heading']->heading)!!}</h2>  
                        </div>
                        <p>{!!$pageDetail->choose_content['heading']->content!!}</p>
                        <p>{!!$pageDetail->choose_content['heading']->page_tag_line!!}</p>
                    <div class="choose-progress">
                        <div class="count">
                            <div class="circle">
                                <svg class="progress-ring topic-first" width="95" height="95">
                                    <circle class="circle-default" fill="white" r="43" cx="47.5" cy="47.5" />
                                    <circle class="progress-ring__circle" fill="transparent" r="43" cx="47.5" cy="47.5" />
                                </svg>
                            </div>
                                <p class="txt-name">Business strategy growth</p>
                        </div>     
                        <div class="count">
                            <div class="circle">
                                <svg class="progress-ring topic-second" width="95" height="95">
                                    <circle class="circle-default" fill="white" r="43" cx="47.5" cy="47.5" />
                                    <circle class="progress-ring__circle" fill="transparent" r="43" cx="47.5" cy="47.5" />
                                </svg>
                            </div>
                            <p class="txt-name">Finance valuable ideas</p>
                        </div>
                    </div>
                    <div class="buttons">
                        <a class="btn-blue">
                            <img src="{{url('img/topic/topic-email.svg')}}" alt="topic-email">
                            Enquire Now
                        </a>
                    </div>
                </div>
                <div class="choose-image">
                    <div class="years">
                        <h3>{!!$pageDetail->choose_content['years']->heading!!}</h3>
                        <p>{!!$pageDetail->choose_content['years']->content!!}</p>
                    </div>
                    <span>
                        <img src="{{$pageDetail->choose_content['years']->getImagePath()}}" alt="{{$pageDetail->choose_content['years']->image_alt}}">
                    </span>
                </div>
            </div>
        </div>
    </section>
<!-- End topic choose section -->


<!-- Start experiences section -->
    <section class="flex-container experiences">
        <div class="container">
            <div class="experiences-container">
                <div class="heading center-heading white-heading">
                    <h2>
                         {!!$pageDetail->experiences_list['heading']->heading!!}
                    </h2>
                </div>
                <div class="experiences-list">
                    @php unset($pageDetail->experiences_list['heading']) @endphp
                    @foreach ($pageDetail->experiences_list as $experience)
                    <div class="experiences-item">
                        <span>
                            <img src="{{$experience->getImagePath()}}" alt="{{$experience->image_alt}}">
                        </span>

                        <h3>
                        {!!$experience->heading!!}
                        </h3>

                        <p>
                            {!!$experience->content!!}
                        </p>
                    </div>
                    @endforeach
                        
                        
                </div>
            </div>
            <a class="top-arrow smoothscroll" data-href="#topic-courses" >
                <img src="{{url('../img/topic/top-arrow.svg')}}" alt="top-arrow">
            </a>
        </div>
    </section>
<!-- End experiences section -->


<!-- Start explore section -->
    <section class="flex-container explore" id="explore">
        <div class="container">
            <div class="explore-container">
                <div class="heading center-heading">
                    <h2>Other Topics to <span>Explore</span></h2>
                </div>
                <div class="explore-list">
                @foreach ($otherTopics as $otherTopic)

                    <div class="explore-item"> 
                        <div class="numbers">
                            <img src="{{url('img/topic/topic-book.svg')}}" alt="topic-book">
                            <p> {{$otherTopic->courses->count()}} 
                                <span>Courses</span>
                            </p>
                        </div>
                        <a href="{{ url('training-courses' . $otherTopic->reference) }}">{{$otherTopic->name}}</a>
                    </div>
                @endforeach
            </div>
            </div>
        </div>
    </section>
<!-- End explore section -->


<!-- Start goals section  -->
    <section class="flex-container goals">
        <div class="container">
            <div class="goals-container">
                <div class="goal-image">
                    <div class="heading">
                        <h2>{!!heading_split($pageDetail->goals_list['heading']->heading)!!}</h2>
                    </div>
                    <p>{!!$pageDetail->goals_list['heading']->content!!}</p>
                    <span class="img">
                        <img src="{{$pageDetail->goals_list['heading']->getImagePath()}}" alt="{{$pageDetail->goals_list['heading']->image_alt}}">
                    </span>
                </div>
                <div class="goals-list">
                    @php unset($pageDetail->goals_list['heading'])  @endphp
                    @foreach ($pageDetail->goals_list as $goal)
                    <div class="goal-item">
                        <span class="image">
                            <img src="{{$goal->getImagePath()}}" alt="{{$goal->image_alt}}">
                        </span>
                        <div class="content">
                            <h3>
                            {!!$goal->heading!!}
                            </h3>
                            <p>{!!$goal->content!!}</p>
                        </div>
                    </div>    
                    @endforeach
                    
                    
                </div>
            </div>
        </div>
    </section>
<!-- End goals section  -->

<!-- Start Popular-Location Section -->
    <section class="flex-container popular-location">
        <div class="container">
            <div class="popular-container">
                        <div class="popular-content">
                            <h2>{!!$pageDetail->popular_location['popular']->heading!!}</h2>
                            @if($locations->isNotEmpty())
                            
                            <p>{!!$locations->first()->meta_description!!}</p>
                            @endif
                            <div class="buttons">
                            <a href="javascript:void(0);" class="btn-blue open-popup enquiryJS" data-quote="Learn More">
                                <img src="{{url('img/courses/learn.svg')}}" alt="learn">
                                Learn More
                            </a>
                            </div>
                        </div>
                        <div class="location-content">
                            <div class="heading">
                                <h2>{!!heading_split($pageDetail->popular_location['popular']->page_tag_line)!!}</h2>
                            </div>
                            <div class="location-list">
                                @foreach ($locations as $location)
                                <div class="content">
                                    <span class="image">
                                        <img src="{{url('img/courses/travel.svg')}}" alt="travel">
                                    </span>
                                    <h3>{{$location->name}}</h3>
                                    <span class="arrow">
                                        <a href="{{ url('training-locations/' . $location->reference) }}"><img src="{{url('img/courses/dashed-arrow.svg')}}" alt="dashed-arrow"></a>
                                    </span>
                                </div>                                    
                                @endforeach

                            </div>
                        </div>
                </div>
        </div>
    </section>
<!-- End Popular-Location Section -->



@endsection