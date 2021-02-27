@extends("layouts.master")

@section("content")
<style>
    .ui-autocomplete .ui-autocomplete-category {
  color: #000080;
  font-weight: 700;
  border-bottom: 1px solid #e5e5e5;
  margin-bottom: 5px;
  font-size: 16px;
  padding: 8px;
}
.ui-autocomplete .ui-menu-item {
  padding: 3px;
}
</style>
<section class="flex-container banner home-banner">
    
    <div class="container">
            @include("layouts.navbar")
            <div class="banner-container">
                <div class="banner-content">
                        <h1>
                            {!!$pageDetail->banner['banner-content']->heading!!}
                        </h1>
                        <p>{!!$pageDetail->banner['banner-content']->content!!}</p>
                        <div class="search">
                            <input type="text" class="auto-complete-course auto-redirect" placeholder="Search your training course here....">
                            <button>
                                Search
                            </button>
                        </div>
                        <div class="buttons">
                                <a class="btn-blue">
                                    <img src="{{url('img/home/book.svg')}}" alt="book">
                                    Course catalogue
                                </a>
                        </div>
                </div>
                <div class="topic-list owl-carousel">

                    @foreach ($topics->chunk(4) as $items)
                    @if ($items->count() == 4)
                    <ul>
                        @foreach ($items as $item)
                        <li>
                            <a>
                            <img src="{{url('img/master/open-book.svg')}}" alt="book">
                            <p>
                                {{$item['name']}}
                                <span>Browse Related Courses</span>
                            </p>
                            <img src="{{url('img/master/arrow.svg')}}" alt="arrow">
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
<section class="flex-container courses">
    <div class="container">
        <div class="courses-container">
            <div class="heading">
                <h2>Professional Skills For
                    <span>
                        The Digital World
                    </span>
                </h2>
            </div>
            <div class="courses-list">
                @foreach ($categories->take(9) as $category)

                <a href="javascript:void(0);" class="course-name">
                    <span class="icon">
                        <img src="{{$category->getImagePath()}}" alt="management">
                        <img src="{{$category->getIconPath()}}" alt="management-white">
                    </span>
                    <div class="name">
                        <h3>
                            {{$category->name}}
                        </h3>
                        <p>
                            {{$category->topics->count()}} Topics
                        </p>
                        @foreach ($category->topics as $topic)
                        @php $totalCourses+=$topic->courses->count() @endphp
                    @endforeach
                        <p>
                            {{$totalCourses}} Courses
                        </p>
                    </div>
                    <span class="arrow">
                        <img src="{{url('img/home/right-arrow.svg')}}" alt="right-arrow">
                    </span>
                </a>
                    
                @endforeach

            </div>
            <div class="buttons">
                <a class="btn-blue">
                    <img src="{{url('img/home/courses.svg')}}" alt="courses">
                    Explore All Courses
                </a>
            </div>
        </div>
    </div>
</section>
<section class="flex-container effective">
    <div class="container">
        <div class="effective-container">
            <div class="content">
                <img src="{{url('img/home/call-us.svg')}}" alt="call-us">
                <p>{!!$pageDetail->banner['content']->heading!!}</p>
            </div>
            <div class="buttons">
                <a class="btn-white" href="tel: 02380001008">
                    <img src="{{url('img/master/call.svg')}}" alt="call">
                    {{websiteDetail()->contact_number}}
                </a>
            </div>

        </div>
    </div>
</section>
<section class="flex-container whychoose">
    <div class="container">
        <div class="whychoose-container">
            <div class="heading center-heading">
                <h2>Why 
                    <span>
                        Choose  Us
                    </span>
                </h2>
                {{-- <h1>{{$pageDetail->choose_us['heading']->heading}}</h1> --}}
            </div>
            <div class="choose-list">
                @php unset($pageDetail->choose_us['heading'])@endphp
                @foreach ($pageDetail->choose_us as $item)
                <div class="item">
                    <img src="{{$item->getImagePath()}}" alt="{{$item->image_alt}}">
                    <h3>{!!$item->heading!!}</h3>
                    <p>{!!$item->content!!}</p>
                </div>    
                @endforeach
                

            </div>


        </div>
    </div>

</section>
<section class="flex-container ways">
    <div class="container">
        <div class="ways-container">
            <div class="ways-content">
            <div class="heading white-heading">
                <h2>{!!$pageDetail->ways['heading']->heading!!}</h2>
            </div>
            <div class="ways-list">
                @php 
                    $waysHead = $pageDetail->ways['heading'];
                    unset($pageDetail->ways['heading']); @endphp
                @foreach ($pageDetail->ways as $ways)
                <div class="item">
                    <span>
                        0{{$loop->iteration}}
                    </span>
                    <div class="content">
                        <h3>{!!$ways->heading!!}</h3>
                        <p>{!!$ways->content!!}</p>
                    </div>
                </div>
                @endforeach
              
                
            </div>

            </div>
            <div class="ways-image">
                <img src="{{$waysHead->getImagePath()}}" alt="{{$waysHead->image_alt}}">
            </div>
        </div>
    </div>
</section>
<section class="flex-container delivery">
    <div class="container">
        <div class="delivery-container">
            <div class="heading center-heading">
                <h2>Expert Training In A Classroom,
                    <span>
                     Online Or From Home!
                    </span>
                </h2>
            </div>
            <div class="delivery-list">
                @php unset($pageDetail->delivery_list['heading']) @endphp
                @foreach ($pageDetail->delivery_list as $delivery)
                <div class="item">
                    <div class="overlay">
                    </div>
                    <img src="{{$delivery->getImagePath()}}" alt="{{$delivery->image_alt}}">
                    <h3>{!!$delivery->heading!!}</h3>
                    <p>{!!$delivery->content!!}</p>
                    <a href="">Enquire Now</a>
                </div>     
                @endforeach
                
                

            </div>
            
        </div>
    </div>
</section>
<section class="flex-container facts">
    <div class="container">
        <div class="facts-container">
            <div class="fact-content">
                <h2>Our Amazing Facts and Figures</h2>
                <p>We are the Largest Global Accredited Training Provider. We successfully run 100+ Courses Daily in 490+ locations worldwide.</p>
            </div>
            <div class="facts-list">
                <div class="item">
                    <img src="{{url('img/home/running.svg')}}" alt="running">
                    <div class="fact-count">
                    <h3 class="count-number" data-to="230" data-speed="3000">230</h3><span>+</span>
                    </div>
                    <p>Courses Running  Daily</p>
                </div>
                <div class="item">
                    <img src="{{url('img/home/locations.svg')}}" alt="running">
                    <div class="fact-count">
                    <h3 class="count-number" data-to="150" data-speed="3000">150</h3><span>+</span>
                    </div>
                    <p>Locations Worldwide</p>
                </div>
                <div class="item">
                    <img src="{{url('img/home/event.svg')}}" alt="event">
                    <div class="fact-count">
                    <h3 class="count-number" data-to="670" data-speed="3000">670</h3><span>+</span>
                    </div>
                    <p>Events</p>
                </div>
                <div class="item">
                    <img src="{{url('img/home/countries.svg')}}" alt="countries">
                    <div class="fact-count">
                    <h3 class="count-number" data-to="80" data-speed="3000">80</h3><span>+</span>
                    </div>
                    <p>Countries</p>
                </div>
            </div>

        </div>
    </div>
</section>
<section class="flex-container locations">
    <div class="container">
        <div class="locations-container">
            <div class="content">
                <div class="heading">
                    <h2>Organisations Locations
                        <span>
                            Around The Globe
                        </span>
                    </h2>
                </div>
                <p> {!!$pageDetail->locations['heading']->content!!} </p>
            </div>
            @foreach ($locations as $location)
            <div class="location-name">
                
                <span>
                    0{{$loop->iteration}}
                </span>
                <img src="{{url('img/home/location.svg')}}" alt="location" class="blue">
                <img src="{{url('img/home/location-white.svg')}}" alt="location" class="white">
                <a href="{{route('locationDetail',['location'=>$location->reference])}}">
                <p>
                    {!!$location->name!!}</a>
                </p>
            </div>                
            @endforeach

            
            
            
            <div class="buttons">
                <a class="btn-blue">
                    <img src="{{url('img/home/location-white.svg')}}" alt="call">
                    View All Locations
                </a>
            </div>
        </div>
    </div>
</section>
<section class="flex-container looking">
    <div class="container">
        <div class="looking-container">
            <div class="looking-for">
                <h2>    
                    {!!$pageDetail->looking_for['heading']->heading!!}
                </h2>
                <p>
                    {!!$pageDetail->looking_for['heading']->content!!}
                </p>
                <div class="buttons">
                    <a class="btn-blue">
                        <img src="{{url('img/home/phone-call.svg')}}" alt="phone-call">
                        Contact Us
                    </a>
                </div>
            </div>
            <div class="clients-reviews">
                <div class="heading white-heading">
                    <h2>What Our Clients Say About Us</h2>
                </div>
                <div class="reviews-outer owl-carousel">
                    <div class="reviews-inner">
                        <p>
                            {!!$testimonial->content!!}
                        </p>
                        <div class="author-name">
                            <h3>
                                {!!$testimonial->author!!}
                            </h3>
                            <span>
                                {!!$testimonial->designation!!}
                            </span>
                            <img src="{{url('img/home/stars.svg')}}" alt="stars">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="flex-container partners">
    <div class="container">
        <div class="partners-container">
            <div class="heading center-heading">
                        <h2>Our Courses Are Accredited By The Leading Learning
                            <span>
                            Institutions Across The Globe
                            </span>
                        </h2>
            </div>
            <p>
                {!!$pageDetail->accredited['heading']->content!!}
            </p>
            <div class="partners-images">
                @php unset($pageDetail->accredited['heading']) @endphp
                @foreach ($pageDetail->accredited as $accredited)

                <img src="{{$accredited->getImagePath()}}" alt="{{$accredited->image_alt}}">    
                @endforeach
            </div>
        </div>
    </div>
</div>


@endsection
