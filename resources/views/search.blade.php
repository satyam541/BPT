@extends("layouts.master")
@section("content")

<!-- Start Banner Section -->
<section class="flex-container banner search-banner">
    <div class="container">
        @include("layouts.navbar")
        <div class="banner-container">
            <h1>{{$pageDetail->banner['header']->heading}}</h1>
            <p>{{$pageDetail->banner['header']->content}}</p>
            <form class="search-form exclude">
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

<!-- Start most-search section-->
<section class="flex-container most-search">
    <div class="container">
        <div class="search-container">
            <div class="heading">
                {{-- {{dd($result)}} --}}
                <h2>Most Searched <span>Topics</span></h2>
            </div>
            <div class="search-list">
                @foreach ($popularTopics->take(4) as $popularTopic)
                {{$popularTopic->loadContent()}}
                <a class="search-info" href="{{url('/training-courses'.$popularTopic->reference)}}">
                    <span><img src="{{url('img/search/course.svg')}}" alt="course">
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
<!-- End most-search section -->

<!-- Start result section -->
<section class="flex-container result">
    <div class="container">
        <div class="result-container">
            <div class="heading">
                @if($resultCount != 0 && $query !="")
                <h2>{{$resultCount}} Results Found for "{{$query}}"</h2>
                @endif
            </div>
            <div class="result-content">
                <div class="result-list">
                  
                    <div class="result-info">
                    @foreach ($result as $course)
                    {{$course->loadContent()}}
                        <div class="result-fold">
                      
                            <div class="heading">
                                <h2>{{$course->name}} - <span>{{$course->topic->name}}</span></h2>
                            </div>
                            <p>{!!$course->detail!!}</p>
                            <div class="buttons">
                                <a class="btn-blue open-popup enquiryJS" data-quote="{{$course->name}}" data-course="{{$course->name}}" data-type="course"><img src="{{url('img/search/call-us.svg')}}" alt="call-us">Enquire Now</a>
                                <a class="btn-white" href="{{url('/training-courses'.$course->reference)}}"><img src="{{url('img/search/white-arrow.svg')}}" alt="white-arrow">Course Details</a>
                            </div>
                 
                        </div>
                                   @endforeach
                    {{$result->appends(request()->query())->links()}}
                       
                    </div>
                    @if(!empty($query))
                    <div class="not-found">
                            <div class="heading center-heading">
                                <h2>Result Not Found</h2>
                            </div>
                                <p>Enquire Us and we will get back to you.</p>
                            <div class="buttons">
                                <div class="btn-blue open-popup enquiryJS" data-heading="Enquire Now" data-quote="Enquire Now" >
                                <img src="{{url('../img/master/mail.svg')}}" alt="mail">Enquire Now
                                </div>
                            </div>
                            <p>---- OR ----</p>
                            <p>Reach Us at <a href="tel:{{websiteDetail()->contact_number}}" class="pointer">{{websiteDetail()->contact_number}}</a> or <a href="mailto:{{websiteDetail()->contact_email}}" class="pointer">{{websiteDetail()->contact_email}}</a> for more information.
                            </p>
                        </div>
                  @endif
                </div>
                <div class="filter">
                    <!-- <h2>Filter</h2> -->
                    <div class="search-catagories">
                        <p>Popular Courses</p>
                        <ul>
                            @foreach ($popularCourses->take(5) as $popularCourse)
                                <li><a href="{{$popularCourse->url}}">{{$popularCourse->name}}</a> </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="search-catagories">
                        <p>Popular Locations</p>
                        <ul>
                            @foreach ($popularLocations->take(5) as $popularLocation)
                                <li><a href="{{$popularLocation->url}}">{{$popularLocation->name}}</a> </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End result section -->

@endsection
 