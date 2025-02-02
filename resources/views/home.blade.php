@extends("layouts.master")

@section('content')
    <!-- Start home-banner section -->
    <section class="flex-container banner home-banner">

        <div class="container">
            @include("layouts.navbar")
            <div class="banner-container">
                <div class="banner-content">
                    <h1>
                        {!! $pageDetail->banner['banner-content']->heading !!}
                    </h1>
                    <p>{!! $pageDetail->banner['banner-content']->content !!}</p>
                    <form class="search" action="" method="get" class="exclude" >
                            <input type="text"  name="q" class="auto-complete-course auto-redirect"
                                placeholder="Search your training course here...." required>
                            <button type="submit" onclick="getquery(this)">
                                Search
                            </button>
                    </form>
                    <div class="buttons">
                        <a href="{{ route('catalogue') }}" class="btn-blue">
                            <img src="{{ url('img/home/book.svg') }}" alt="book">
                            Course Catalogue
                        </a>
                    </div>
                </div>
                <div class="topic-list owl-carousel">

                    @foreach ($topics->chunk(4) as $items)
                        @if ($items->count() == 4)
                            <ul>
                                @foreach ($items as $item)
                                    <li>
                                        <a href="{{$item->url }}">
                                            <img src="{{ url('img/master/open-book.svg') }}" alt="book">
                                            <p>
                                                {{ $item['name'] }}
                                                <span>Browse Related Courses</span>
                                            </p>
                                            <img src="{{ url('img/master/arrow.svg') }}" alt="arrow">
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    @endforeach

                </div>
            </div>
        </div>

    </section>
    <!-- End home-banner section -->

    <!-- Start courses section -->
    <section class="flex-container courses">
        <div class="container">
            <div class="courses-container">
                <div class="heading center-heading">
                    <h2>{!! heading_split($pageDetail->course['heading']->heading) !!} </h2>
                </div>
                <div class="courses-list">
                    @foreach ($categories->take(9) as $category)

                        {{-- <a href="{{ url('training-courses' . $category->reference) }}" class="course-name"> --}}
                        <a href="{{ $category->url }}" class="course-name">
                            <span class="icon">
                                <img src="{{ $category->getImagePath() }}" alt="management">
                                <img src="{{ $category->getIconPath() }}" alt="management-white">
                            </span>
                            <div class="name">
                                <h3>
                                    {{ $category->name }}
                                </h3>
                                @if ($category->topics_count < 2)
                                    <p>{{ $category->topics_count }} Topic</p>
                                @else
                                    <p>{{ $category->topics_count }} Topics</p>
                                @endif
                                @foreach ($category->topics as $topic)
                                @if($loop->first)
                                @php $totalCourses=0 @endphp
                                @endif
                                @php $totalCourses+=$topic->courses_count @endphp
                                @endforeach
                                @if ($totalCourses < 2)
                                    <p> {{ $totalCourses }} Course </p>
                                @else
                                    <p> {{ $totalCourses }} Courses </p>
                                @endif
                            </div>
                            <span class="arrow">
                                <img src="{{ url('img/home/arrow.svg') }}" alt="arrow">
                            </span>
                        </a>

                    @endforeach
                    @foreach ($certifications->take(9) as $certification)

                    {{-- <a href="{{ url('training-courses' . $category->reference) }}" class="course-name"> --}}
                    <a href="{{ $certification->url }}" class="course-name">
                        <span class="icon">
                            <img src="{{ $certification->getImagePath() }}" alt="management">
                            <img src="{{ $certification->getIconPath() }}" alt="management-white">
                        </span>
                        <div class="name">
                            <h3>
                                {{ $certification->name }}
                            </h3>
                            @if ($certification->topics_count < 2)
                                <p>{{ $certification->topics_count }} Topic</p>
                            @else
                                <p>{{ $certification->topics_count }} Topics</p>
                            @endif
                            @foreach ($certification->topics as $topic)
                            @if($loop->first)
                            @php $totalCourses=0 @endphp
                            @endif
                            @php $totalCourses+=$topic->courses_count @endphp
                            @endforeach
                            @if ($totalCourses < 2)
                                <p> {{ $totalCourses }} Course </p>
                            @else
                                <p> {{ $totalCourses }} Courses </p>
                            @endif
                        </div>
                        <span class="arrow">
                            <img src="{{ url('img/home/arrow.svg') }}" alt="arrow">
                        </span>
                    </a>

                @endforeach
                </div>
                <div class="buttons">
                    <a href="{{route('catalogue')}}"  class="btn-blue">
                        <img src="{{ url('img/home/courses.svg') }}" alt="courses">
                        Explore All Courses
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- End courses section -->

    <!-- Start effective section -->
    <section class="flex-container effective">
        <div class="container">
            <div class="effective-container">
                <div class="content">
                    <img src="{{ url('img/home/call-us.svg') }}" alt="call-us">
                    <p>{!! $pageDetail->banner['content']->heading !!}</p>
                </div>
                <div class="buttons">
                    <a class="btn-white" href="tel:{{ websiteDetail()->contact_number }}">
                        <img src="{{ url('img/master/call.svg') }}" alt="call">
                        {{ websiteDetail()->contact_number }}
                    </a>
                </div>
                <div class="buttons">
                    <a class="btn-blue open-popup enquiryJS" data-quote="Enquire Now" data-type="other">
                        <img src="{{ url('img/master/quote.svg') }}" alt="quote">
                        Enquire Now
                    </a>
                </div>

            </div>
        </div>
    </section>
    <!-- End effective section -->

    <!-- Start whychoose section -->
    <section class="flex-container whychoose">
        <div class="container">
            <div class="whychoose-container">
                <div class="heading center-heading">
                    <h2>Why We are 
                        <span>
                        Best to Choose?
                        </span>
                    </h2>
                    {{-- <h1>{{$pageDetail->choose_us['heading']->heading}}</h1> --}}
                </div>
                <div class="choose-list">
                    @php unset($pageDetail->choose_us['heading'])@endphp
                    @foreach ($pageDetail->choose_us as $item)
                        <div class="item">
                            <img src="{{ $item->getImagePath() }}" alt="{{ $item->image_alt }}">
                            <h3>{!! $item->heading !!}</h3>
                            <p>{!! $item->content !!}</p>
                        </div>
                    @endforeach


                </div>


            </div>
        </div>

    </section>
    <!-- End whychoose section -->

    <!-- Start ways section -->
    <section class="flex-container ways">
        <div class="container">
            <div class="ways-container">
                <div class="ways-content">
                    <div class="heading white-heading">
                        <h2>{!! $pageDetail->ways['heading']->heading !!}</h2>
                    </div>
                    <div class="ways-list">
                        @php
                            $waysHead = $pageDetail->ways['heading'];
                        unset($pageDetail->ways['heading']); @endphp
                        @foreach ($pageDetail->ways as $ways)
                            <div class="item">
                                <span>
                                    0{{ $loop->iteration }}
                                </span>
                                <div class="content">
                                    <h3>{!! $ways->heading !!}</h3>
                                    <p>{!! $ways->content !!}</p>
                                </div>
                            </div>
                        @endforeach


                    </div>

                </div>
                <div class="ways-image">
                    <img src="{{ $waysHead->getImagePath() }}" alt="{{ $waysHead->image_alt }}">
                </div>
            </div>
        </div>
    </section>
    <!-- End ways section -->

    <!-- Start delivery section -->
    <section class="flex-container delivery">
        <div class="container">
            <div class="delivery-container">
                <div class="heading">
                    <h2>Professional Training, 
                        <span>
                        The Way It Should Be Done
                        </span>
                    </h2>
                </div>
                <div class="delivery-list">
                    @php unset($pageDetail->delivery_list['heading']) @endphp
                    @foreach ($pageDetail->delivery_list as $delivery)
                        <a class="item open-popup enquiryJS" data-heading="Enquire Now" data-quote="Enquire for-{{$delivery->heading}}" data-type= "other"> 
                            <div class="overlay">
                            </div>
                            <img src="{{ $delivery->getImagePath() }}" alt="{{ $delivery->image_alt }}">
                            <h3>{!! $delivery->heading !!}</h3>
                            <p>{!! $delivery->content !!}</p>
                            <button class="btn-blue open-popup enquiryJS" data-heading="Enquire Now" data-quote="Enquire Now">Enquire Now</button>
                        </a>
                    @endforeach



                </div>

            </div>
        </div>
    </section>
    <!-- End delivery section -->

    <!-- Start facts section -->
    <section class="flex-container facts">
        <div class="container">
            <div class="facts-container">
                <div class="fact-content">
                    @php $statsdata=statsData()  @endphp
                    <h2>Statics, We're Proud Of</h2>
                    <p>Best Practice Training is a globally accredited and renowned organisation providing specially designed training courses based on industry best practices.
                    </p>
                </div>
                <div class="facts-list">
                    <div class="item">
                        <img src="{{ url('img/home/running.svg') }}" alt="running">
                        <div class="fact-count">
                            {{-- {{dd($statsdata->stats['course_running_daily']->content)}} --}}
                            <h3 class="count-number" data-to="{{$statsdata->stats['course_running_daily']->content}}" data-speed="3000">{!!$statsdata->stats['course_running_daily']->content!!}</h3><span>+</span>
                        </div>
                        <p>Courses Running Daily</p>
                    </div>
                    <div class="item">
                        <img src="{{ url('img/home/locations.svg') }}" alt="running">
                        <div class="fact-count">
                            
                            <h3 class="count-number" data-to="{{$statsdata->stats['locations_world_wide']->content}}" data-speed="3000">{!!$statsdata->stats['locations_world_wide']->content!!}</h3><span>+</span>
                        </div>
                        <p>Locations Worldwide</p>
                    </div>
                    <div class="item">
                        <img src=" {{ url('img/home/trainer-home.svg') }}" alt="trainer">
                        <div class="fact-count">
                            <h3 class="count-number" data-to="{{$statsdata->stats['trainers']->content}}" data-speed="3000">{!!$statsdata->stats['trainers']->content!!}</h3><span>+</span>
                        </div>
                        <p>Trainers</p>
                    </div>
                    <div class="item">
                        <img src="{{ url('img/home/countries.svg') }}" alt="countries">
                        <div class="fact-count">
                            <h3 class="count-number" data-to="{{$statsdata->stats['countries']->content}}" data-speed="3000">{!!$statsdata->stats['countries']->content!!}</h3><span>+</span>
                        </div>
                        <p>Countries</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End facts section -->

    <!-- Start location section -->
    <section class="flex-container locations">
        <div class="container">
            <div class="locations-container">
                <div class="content">
                    <div class="heading">
                        <h2> {!! heading_split($pageDetail->locations['heading']->heading) !!}</h2>
                    </div>
                    <p> {!! $pageDetail->locations['heading']->content !!} </p>
                </div>
                    <div class="location-name">
                        <span>
                            01
                        </span>
                        <img src="{{ url('img/home/location.svg') }}" alt="location" class="blue">
                        <img src="{{ url('img/home/location-white.svg') }}" alt="location" class="white">
                        <p>
                            United Kingdom
                        </p>
                    </div>
                    <div class="location-name">
                        <span>
                            02
                        </span>
                        <img src="{{ url('img/home/location.svg') }}" alt="location" class="blue">
                        <img src="{{ url('img/home/location-white.svg') }}" alt="location" class="white">
                        <p>
                            United States
                        </p>
                    </div>
                    <div class="location-name">
                        <span>
                            03
                        </span>
                        <img src="{{ url('img/home/location.svg') }}" alt="location" class="blue">
                        <img src="{{ url('img/home/location-white.svg') }}" alt="location" class="white">
                        <p>
                            Canada
                        </p>
                    </div>
                    <div class="location-name">
                        <span>
                            04
                        </span>
                        <img src="{{ url('img/home/location.svg') }}" alt="location" class="blue">
                        <img src="{{ url('img/home/location-white.svg') }}" alt="location" class="white">
                        <p>
                             Australia
                        </p>
                    </div>
                    <div class="location-name">
                        <span>
                            05
                        </span>
                        <img src="{{ url('img/home/location.svg') }}" alt="location" class="blue">
                        <img src="{{ url('img/home/location-white.svg') }}" alt="location" class="white">
                        <p>
                        Europe
                        </p>
                    </div>
                    <div class="location-name">
                        <span>
                            06
                        </span>
                        <img src="{{ url('img/home/location.svg') }}" alt="location" class="blue">
                        <img src="{{ url('img/home/location-white.svg') }}" alt="location" class="white">
                        <p>
                        Middle East
                        </p>
                    </div>
                    <div class="location-name">
                        <span>
                            07
                        </span>
                        <img src="{{ url('img/home/location.svg') }}" alt="location" class="blue">
                        <img src="{{ url('img/home/location-white.svg') }}" alt="location" class="white">
                        <p>
                        Germany 
                        </p>
                    </div>
                <div class="buttons">
                    <a  class="btn-blue open-popup enquiryJS" data-quote="Get More Information" data-type="other" data-heading="Get More Information">
                        <img src="{{ url('img/home/location-white.svg') }}" alt="call">
                            Get More Information
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- End location section -->

    <!-- Start looking section -->
    <section class="flex-container looking">
        <div class="container">
            <div class="looking-container">
                <div class="looking-for">
                    <h2>
                        {!! $pageDetail->looking_for['heading']->heading !!}
                    </h2>
                    <p>
                        {!! $pageDetail->looking_for['heading']->content !!}
                    </p>
                    <div class="buttons">
                        <a  href="{{route('contactUs')}}" class="btn-blue  enquiryJS">
                            <img src="{{ url('img/home/phone-call.svg') }}" alt="phone-call">
                            Contact Us
                        </a>
                    </div>
                </div>
                <div class="clients-reviews">
                    <div class="heading white-heading">
                        <h2>What Our Customers Saying</h2>
                    </div>
                    <div class="reviews-outer owl-carousel">
                        @foreach ($testimonials as $testimonial)
                            <div class="reviews-inner">
                                <p>
                                    {!! $testimonial->content !!}
                                </p>
                                <div class="author-name">
                                    <h3>
                                        {!! $testimonial->author !!}
                                    </h3>
                                    <!-- <span>
                                        {!! $testimonial->designation !!}
                                    </span> -->
                                    <img src="{{ url('img/home/stars.svg') }}" alt="stars">
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End looking section -->

    <!-- Start partners section -->
    <section class="flex-container partners">
        <div class="container">
            <div class="partners-container">
                <div class="heading center-heading">
                    <h2>Approved by Professional 
                        <span>
                            Certification Bodies
                        </span>
                    </h2>
                </div>
                <p>
                    {!! $pageDetail->accredited['heading']->content !!}
                </p>
                <div class="partners-images">
                    @php unset($pageDetail->accredited['heading']) @endphp
                    @foreach ($pageDetail->accredited as $accredited)

                        <img src="{{ $accredited->getImagePath() }}" alt="{{ $accredited->image_alt }}">
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- End partners section -->


@endsection
