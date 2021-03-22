<div class="navbar" id="fixheader">
    <div class="container">
        <a href="{{route('home')}}" class="bpt-logo">
            <img src="{{url('img/master/bpt-logo-blue.svg')}}" alt="bptlogo">
        </a>
        <div class="menu" id="menuToggle" onclick="toggleMenu()">
            <img src="{{url('img/master/menu.svg')}}" alt="menu">
        </div>
        <div class="menu-links">
            <a href="javascript:void(0)" class="menu-toggle" onclick="toggleMenu()">
                <img src="{{url('img/master/back.svg')}}" alt="back"> Back
            </a>
            <ul class="menu-list">
                <li class="links-li course-link">
                    <a href="{{route('catalogue')}}" class="link mobile"><i class="fa fa-book"></i>Courses</a>
                    <a class="link desktop" id="menucourses">Courses<img src="{{url('img/master/upward-arrow.svg')}}" alt="upward-arrow"></a>
                    <span></span>
                </li>
                <li class="links-li">
                    <a href="{{route('certification')}}" class="link"><i class="fa fa-money"></i>Certifications</a>
                    <span></span>
                </li>
                <li class="links-li">
                    <a href="{{route('onsite')}}" class="link"><i class="fa fa-building"></i>Onsite</a>
                    <span></span>
                </li>
                <li class="links-li">
                    <a href="{{route('locations')}}" class="link"><i class="fa fa-map"></i>Locations</a>
                    <span></span>
                </li>
                <li class="links-li about-link" id="aboutdropdown" >
                    <a href="{{route('aboutUs')}}" class="link mobile"><i class="fa fa-address-card"></i>About Us</a>
                    <a href="javascript:void(0)"  class="link desktop">About<img src="{{url('img/master/upward-arrow.svg')}}" alt="upward-arrow"></a>
                    <span></span>
                    <ul>
                        <li><a href="{{route('aboutUs')}}"><i class="fa fa-address-card"></i>About Us</a></li>
                        <li><a href="{{route('blog')}}"><i class="fa fa-clipboard"></i>Blogs</a></li>
                        <li><a href="{{route('testimonials')}}"><i class="fa fa-comments"></i>Testimonials</a></li>
                        <li><a href="{{route('knowledgepass')}}"><i class="fa fa-ticket"></i>Knowlegde Pass</a></li>
                    </ul>   
                </li>
                <li class="links-li">
                    <a href="{{route('contactUs')}}" class="link"><i class="fa fa-address-book"></i>Contact Us</a>
                    <span></span> 
                </li>
                <li class="links-li">
                    <a href="{{route('bundleOffer')}}" class="link"><i class="fa fa-magic"></i>Offers</a>
                    <span></span> 
                </li>
                
                <li class="links-li">
                    <a class="search" id="search">
                        <img src="{{url('img/master/search.svg')}}" alt="search">
                    </a>
                    <a class="cart" href="{{route('cart')}}">
                        <img src="{{url('img/master/cart.svg')}}" alt="cart">
                       <p>{{cart()->count()}}</p>
                    </a>
                    <a class="cart country-select" id="flag">
                    <div class="flag {{ strtolower(country()->country_code) }}"></div>
                        <!-- <img src="{{url('img/flag/uk.svg')}}" alt="cart" class="flag"> -->
                    </a>
                </li>

            </ul>
            <ul class="top-bar">
                <li>
                    <span>
                        <img src="{{url('img/master/call-us.svg')}}" alt="call us">
                    </span>
                    <div class="info">
                        <p>Call Us:</p>
                        <a href="tel:{{websiteDetail()->contact_number}}">{{websiteDetail()->contact_number}}</a>
                    </div>
                </li>
                <li>
                    <span>
                        <img src="{{url('img/master/email.svg')}}" alt="email">
                    </span>
                    <div class="info">
                        <p>Send Us Mail:</p>
                        <a href="mailto:{{websiteDetail()->contact_email}}">{{websiteDetail()->contact_email}}</a>
                    </div>
                </li>

                <li class="buttons">
                    <a data-type="top" class="btn-blue open-popup enquiryJS" data-heading="Get a Quote" data-quote="Get a Quote">
                        <img src="{{url('img/master/quote.svg')}}" alt="quote">
                        Get a Quote
                    </a>
                </li>
            </ul>
        </div>
        <ul class="country-list country-select" id="country-list">                                        
            @foreach (countries() as $country)
            <li class="country preferred pointer @if($country->id == country()->id) active @endif " data-country-code="{{$country->id}}">
                <div class="flag {{ strtolower($country->id) }}"></div>
                <span class="country-names">{{ $country->name }}</span>
            </li>
            @endforeach
        </ul>
        <div class="dropdown-menu" id="dropdown-menu">
            @php
            $menu_data = menu_data();
            $categories = $menu_data['categories'];
            $topicData = $menu_data['topics'];
            $courseData = $menu_data['courses'];
            @endphp
            <div class="dropdown-list">
                <div class="category-menu">
                    <h3>Categories</h3>
                    @foreach($categories as $category)
                    <a data-target="category_{{$category->id}}">
                        <span><img src="{{$category->getIconPath()}}" alt="analytics" class="white">
                            <img src="{{$category->getImagePath()}}" alt="analytics-blue" class="blue">
                        </span>
                        <p>{{$category->name}}</p>
                    </a>
                    @endforeach
                </div>
                <div class="topic-menu">
                    <div class="course-content">
                        <h3>Topic</h3>
                        @foreach ($topicData as $category_id=>$topics) 
                        <div class="course" id="category_{{$category_id}}">
                            @foreach ($topics->take(8) as $topic)
                            <a href="{{$topic->url}}" data-target="topic_{{$topic->id}}">
                                <span>
                                    <img src="{{url('img/master/test.svg')}}" alt="test" class="blue">
                                    <img src="{{url('img/master/test-white.svg')}}" alt="test-white" class="white">
                                </span>
                                    <p>{{$topic->name}}</p>
                            </a>
                            @endforeach
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="course-menu">
                    <div class="menu-content">
                        <h3>Courses</h3>
                        @foreach ($courseData as $topic_id=>$courses) 
                        <div class="menu-info" id="topic_{{$topic_id}}">
                            @foreach ($courses->take(8) as $course)
                            <a href="{{$course->url}}">
                                {{$course->name}}
                            </a>
                            @endforeach
                        </div>
                        @endforeach
                    </div>
                    <div class="buttons">
                        <a href="{{route('catalogue')}}" class="btn-blue">View All Courses<img src="{{url('img/master/black-arrow.svg')}}" alt="black-arrow"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="pop-search" id="pop-search">
    <form class="search-form" onsubmit="getquery(this)">
    <span class="search-cross"><img src="{{url('img/master/cross.svg')}}" alt="name"></span>
    <h2>Search our courses and solutions</h2>
            <div class="search">
                <input type="text" placeholder="Search your course here...."  autocomplete="off" class="auto-complete-course auto-redirect">
                <button  onclick="getquery(this)">
                    Search<img src="{{ url('img/master/search-icon.svg') }}" alt="search-icon">
                </button>
            </div>
            <p>Or select from our popular topics</p>
            <ul>
                @foreach (topicPopular()->take(10) as $popularTopic)
                            <li><a href="{{$popularTopic->url}}">{{$popularTopic->name}}</a> </li>
                 @endforeach
                
            </ul>     
    </form>
</div>
