<div class="navbar" id="fixheader">
    <div class="container">
        <a href="{{route('home')}}" class="bpt-logo">
            <img src="{{url('img/master/bpt-logo.svg')}}" alt="bptlogo">
        </a>
        <div class="menu" id="menuToggle" onclick="toggleMenu()">
            <img src="{{url('img/master/menu.svg')}}" alt="menu">
        </div>
        <div class="menu-links">
            <a href="javascript:void(0)" class="menu-toggle" onclick="toggleMenu()">
                <img src="{{url('img/master/back.svg')}}" alt="back"> Back
            </a>
            <ul>
                <li class="links-li">
                    <a data-href="{{route('catalouge')}}" class="link" id="menucourses">Courses</a>
                    <span></span>
                </li>
                <li class="links-li">
                    <a data-href="#overview" class="link">Certification</a>
                    <span></span>
                </li>
                <li class="links-li">
                    <a href="{{route('onsite')}}" data-href="#choose" class="link">Onsite</a>
                    <span></span>
                </li>
                <li class="links-li">
                    <a href="{{route('blog')}}" data-href="#blog" class="link">Blogs</a>
                    <span></span>
                </li>
                <li class="links-li">
                    <a href="{{route('aboutUs')}}" data-href="#faq" class="link">About</a>
                    <span></span>
                </li>
                <li class="links-li">
                    <a href="{{route('locations')}}" data-href="#azure-other" class="link">Locations</a>
                    <span></span>
                </li>
                <li class="links-li">
                    <a class="search" id="search">
                        <img src="{{url('img/master/search.svg')}}" alt="search">
                    </a>
                    <a class="cart">
                        <img src="{{url('img/master/cart.svg')}}" alt="cart">
                    </a>
                    <a class="cart" id="flag">
                        <img src="{{url('img/flag/uk.svg')}}" alt="cart">
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
                    <a data-type="top" class="btn-blue open-popup enquiryJS">
                        <img src="{{url('img/master/quote.svg')}}" alt="quote">
                        Get a Quote
                    </a>
                </li>
            </ul>
        </div>
        <ul class="country-list">
            <li>
                <a href="javascript:void:(0);">
                    <img src="{{url('img/flag/uk.svg')}}" alt="flag">
                    <p>London</p>
                </a>
            </li>
            <li>
                <a href="javascript:void:(0);">
                    <img src="{{url('img/flag/uk.svg')}}" alt="flag">
                    <p>London</p>
                </a>
            </li>
            <li>
                <a href="javascript:void:(0);">
                    <img src="{{url('img/flag/uk.svg')}}" alt="flag">
                    <p>London</p>
                </a>
            </li>
            <li>
                <a href="javascript:void:(0);">
                    <img src="{{url('img/flag/uk.svg')}}" alt="flag">
                    <p>London</p>
                </a>
            </li>
            <li>
                <a href="javascript:void:(0);">
                    <img src="{{url('img/flag/uk.svg')}}" alt="flag">
                    <p>London</p>
                </a>
            </li>
        </ul>
        <div class="dropdown-menu">
            @php
            $menu_data = menu_data();
            $categories = $menu_data['categories'];
            $topicData = $menu_data['topics'];
            $courseData = $menu_data['courses'];
            @endphp
            <div class="dropdown-list">
                <div class="topic-info">
                    <h3>Categories</h3>
                    @foreach($categories as $category)
                    <a data-target="category_{{$category->id}}">
                        <span><img src="{{url('img/master/analytics.svg')}}" alt="analytics" class="white">
                            <img src="{{url('img/master/analytics-blue.svg')}}" alt="analytics-blue" class="blue">
                        </span>
                        {{$category->name}}
                    </a>
                    @endforeach
                </div>
                <div class="course-list">
                    <div class="course-content">
                        <h3>Topic</h3>
                        @foreach ($topicData as $category_id=>$topics) 
                        <div class="course" id="category_{{$category_id}}">
                            @foreach ($topics->take(8) as $topic)
                            <a data-target="topic_{{$topic->id}}">
                                <span>
                                    <img src="{{url('img/master/test.svg')}}" alt="test"></span>
                                    {{$topic->name}}
                            </a>
                            @endforeach
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="menu-list">
                    <div class="menu-content">
                        <h3>Courses</h3>
                        @foreach ($courseData as $topic_id=>$courses) 
                        <div class="menu-info" id="topic_{{$topic_id}}">
                            @foreach ($courses->take(8) as $course)
                            <a href="{{$course->url}}">{{$course->name}}</a>
                            @endforeach
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="pop-search" id="pop-search">
    <span class="search-cross"><img src="{{url('img/master/cross.svg')}}" alt="name"></span>
    <form class="search-form">
        <div class="search">
            <input type="text" placeholder="Search your course here...." autocomplete="off">
            <button>
                Search
            </button>
        </div>
    </form>
</div>
