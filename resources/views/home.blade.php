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

                    @foreach (array_chunk($topics,4) as $topic)
                        <ul>
                        @foreach ($topic as $item)
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

                <a class="course-name">
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
                    <img src="{{$item->getImagePath()}}" alt="price">
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
                <h2>Professional Training, The Way It Should Be Done.</h2>
            </div>
            <div class="ways-list">
                <div class="item">
                    <span>
                        01 
                    </span>
                    <div class="content">
                        <h3>Largest Global Course Portfolio</h3>
                        <p>You won’t find better value in the marketplace. If you do find a lower price, we will beat it.</p>
                    </div>
                </div>
                <div class="item">
                    <span>
                        02 
                    </span>
                    <div class="content">
                        <h3>Best Choice Of Dates For Classroom</h3>
                        <p>A variety of delivery methods are available depending on your learning preference.</p>
                    </div>
                </div>
                <div class="item">
                    <span>
                        03 
                    </span>
                    <div class="content">
                        <h3>Most Venues Globally</h3>
                        <p>We have locations stretching the entire globe, allowing flexible training wherever you need it.</p>
                    </div>
                </div>
            </div>

            </div>
            <div class="ways-image">
                <img src="{{url('img/home/ways-info.png')}}" alt="ways-info">
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
                <div class="item">
                    <div class="overlay">
                    </div>
                    <img src="{{url('img/home/classroom.svg')}}" alt="classroom">
                    <h3>Classroom Training</h3>
                    <p>A variety of delivery methods are available depending on your learning preference.</p>
                    <a href="">Enquire Now</a>
                </div>
                <div class="item">
                    <div class="overlay">
                    </div>
                    <img src="{{url('img/home/led.svg')}}" alt="led">
                    <h3>Online Instructor-Led</h3>
                    <p>A variety of delivery methods are available depending on your learning preference.</p>
                    <a href="">Enquire Now</a>
                </div>
                <div class="item">
                    <div class="overlay">
                    </div>
                    <img src="{{url('img/home/paced.svg')}}" alt="paced">
                    <h3>Online Self-Paced</h3>
                    <p>A variety of delivery methods are available depending on your learning preference.</p>
                    <a href="">Enquire Now</a>
                </div>
                <div class="item">
                    <div class="overlay">
                    </div>
                    <img src="{{url('img/home/onsite.svg')}}" alt="onsite">
                    <h3>Onsite Training</h3>
                    <p>A variety of delivery methods are available depending on your learning preference.</p>
                    <a href="">Enquire Now</a>
                </div>

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
                <p>
                    We are committed to providing our customers with exceptional service while offering our employees 
                    the best training.We are committed to providing our customers with exceptional service while offering our employees the best 
                    training.We are committed to providing our customers with exceptional service while offering our employees the best training.
                </p>
            </div>
            <div class="location-name">
                <span>
                    01
                </span>
                <img src="{{url('img/home/location.svg')}}" alt="location" class="blue">
                <img src="{{url('img/home/location-white.svg')}}" alt="location" class="white">
                <p>
                    London
                </p>
            </div>
            <div class="location-name">
                <span>
                    02
                </span>
                <img src="{{url('img/home/location.svg')}}" alt="location" class="blue">
                <img src="{{url('img/home/location-white.svg')}}" alt="location" class="white">
                <p>
                    London
                </p>
            </div>
            <div class="location-name">
                <span>
                    03
                </span>
                <img src="{{url('img/home/location.svg')}}" alt="location" class="blue">
                <img src="{{url('img/home/location-white.svg')}}" alt="location" class="white">
                <p>
                    London
                </p>
            </div>
            <div class="location-name">
                <span>
                    04
                </span>
                <img src="{{url('img/home/location.svg')}}" alt="location" class="blue">
                <img src="{{url('img/home/location-white.svg')}}" alt="location" class="white">
                <p>
                    London
                </p>
            </div>
            <div class="location-name">
                <span>
                    05
                </span>
                <img src="{{url('img/home/location.svg')}}" alt="location" class="blue">
                <img src="{{url('img/home/location-white.svg')}}" alt="location" class="white">
                <p>
                    London
                </p>
            </div>
            <div class="location-name">
                <span>
                    06
                </span>
                <img src="{{url('img/home/location.svg')}}" alt="location" class="blue">
                <img src="{{url('img/home/location-white.svg')}}" alt="location" class="white">
                <p>
                    London
                </p>
            </div>
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
                    Didn't Find What You're Looking For?
                </h2>
                <p>
                    If you didn't find your ideal course or facing any difficulty to choose which course suits you best, we are here to help you.
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
                            "Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                            when an unknown printer took a galley of type and scrambled it to maLorem Ipsum is simply."
                        </p>
                        <div class="author-name">
                            <h3>
                                Harsul Hisham
                            </h3>
                            <span>
                                WEB DESIGNER
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
                Leading bodies including AXELOS, APMG, BCS, PeopleCert, PMI, CompTIA and Microsoft 
                have accredited our courses, materials and trainers, certifying that they reach the 
                high standards that they require from their training partners., materials and trainers, 
                certifying that they reach the high standards that they require from their training partners.
            </p>
            <div class="partners-images">
                <img src="{{url('img/home/prince2.png')}}" alt="prince2">
                <img src="{{url('img/home/itil.png')}}" alt="itil">
                <img src="{{url('img/home/agile.png')}}" alt="agile">
                <img src="{{url('img/home/change-mgt.png')}}" alt="change-mgt">
                <img src="{{url('img/home/ms.png')}}" alt="ms">
            </div>
        </div>
    </div>
</div>


@endsection
@section('footerscripts')
  <script>
       $(".auto-complete-course").focus(function()
    {
      $(this).removeClass("error");
      $(this).attr("placeholder","");
    });
    function getquery(elm)
   {
      var query = $(elm).prev().val();
      if(query.length >= 1)
         {window.location.href = window.origin+"/search?q="+query;}
      $(elm).prev().attr("placeholder","Add Course to Search");
      $(elm).prev().addClass("error");
   }


var autoCompleteCourseUrl = "{{route('courseAutoComplete')}}";
$( function() {
                 
                  
                  $.widget( "custom.catcomplete", $.ui.autocomplete, {
                        _create: function() {
                        this._super();
                        this.widget().menu( "option", "items", "> :not(.ui-autocomplete-category)" );
                        },
                        _renderMenu: function( ul, items ) {
                              var that = this,
                              currentTopic = "";
                              console.log(items);
                              $.each( items, function( index, item ) {
                                    var li;
                                    
                                    if ( item.topic.name != currentTopic ) {
                                          ul.append( "<li class='ui-autocomplete-category'>" + item.topic.name + "</li>" );
                                          currentTopic = item.topic.name;
                                    }
                                    li = that._renderItemData( ul, item );
                                    if ( item.topic.name ) {
                                          li.attr( "aria-label", item.topic.name + " : " + item.label );
                                    }
                              });
                        }

                  } );
                  $( ".auto-complete-course.auto-redirect" ).catcomplete({
                        delay: 0,
                        source: autoCompleteCourseUrl,
                        select: function(event,ui)
                        {
                              location.href = ui.item.url;
                        }
                  });

                  $(".auto-complete-course").catcomplete({
                     source: function (request, response)
                     {
                           $.ajax(
                           {
                              global: false,
                              source: autoCompleteCourseUrl,
                              url: autoCompleteCourseUrl,
                              dataType: "json",
                              data:
                              {
                                 term: request.term
                              },
                              success: function (data)
                              {
                                 response(data);
                              }
                           });
                     },
                  });
                  
            } );
    </script>  
@endsection