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
                        <a class="btn-blue open-popup enquiryJS" data-quote="{{$course->name}}" data-course="{{$course->name}}" data-type="course"><img src="{{url('img/search/call-us.svg')}}" alt="call-us">Enquire Now</a>
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
                                <li><a href="{{url('/training-courses'.$popularCourse->reference)}}">{{$popularCourse->name}}</a> </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="search-catagories">
                        <p>Locations</p>
                        <ul>
                            @foreach ($popularLocations->take(5) as $popularLocation)
                                <li><a href="{{url('/training-locations/'.$popularLocation->reference)}}">{{$popularLocation->name}}</a> </li>
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



@endsection
 