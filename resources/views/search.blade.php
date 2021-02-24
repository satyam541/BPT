@extends("layouts.master")
@section("content")

<!-- Start Banner Section -->
<section class="flex-container banner search-banner">
    <div class="container">
        @include("layouts.navbar")
        <div class="banner-container">
            <h1>Search</h1>
            <p>Let us know your requirements. Rest we will manage for you.</p>
            <div class="search">
                            <input type="text" class="auto-complete-course auto-redirect" placeholder="Search your course here....">
                            <button>
                                Search
                            </button>
                        </div>
            <div class="breadcrums">
                <ul>
                    <li><a href="">Home</a></li>
                    <li><img src="{{url('img/master/breadcrum-arrow.svg')}}" alt="arrow" class="white"></li>
                    <li><a href="">Search</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Section -->

<!-- Start search section-->
<section class="search">
    <div class="container">
        <div class="search-container">
            <div class="heading">
                <h2>Most Searched <span>Courses</span></h2>
            </div>
            <div class="search-list">
                <div class="search-info">
                    <span><img src="{{url('img/search/alarm-clock.svg')}}" alt="alarm-clock">
                    284 Times in last week </span>
                    <h3>PRINCE2® Training</h3>
                    <p>Choose from over 200 courses which cover all aspects of business and personal training</p>

                </div>
                <div class="search-info">
                    <span><img src="{{url('img/search/alarm-clock.svg')}}" alt="alarm-clock">
                    284 Times in last week </span>
                    <h3>PRINCE2® Training</h3>
                    <p>Choose from over 200 courses which cover all aspects of business and personal training</p>

                </div>
                <div class="search-info">
                    <span><img src="{{url('img/search/alarm-clock.svg')}}" alt="alarm-clock">
                    284 Times in last week </span>
                    <h3>PRINCE2® Training</h3>
                    <p>Choose from over 200 courses which cover all aspects of business and personal training</p>

                </div>
                <div class="search-info">
                    <span><img src="{{url('img/search/alarm-clock.svg')}}" alt="alarm-clock">
                    284 Times in last week </span>
                    <h3>PRINCE2® Training</h3>
                    <p>Choose from over 200 courses which cover all aspects of business and personal training</p>

                </div>
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
                <h2>31 Results Found For "V"</h2>
            </div>
            <div class="result-content">
            <div class="result-list">
                <div class="result-info">
                    <div class="heading">
                        <h2>Value Stream Mapping - <span>Lean Training</span></h2>
                    </div>
                    <p>Choose from over 200 courses which cover all aspects of business and personal training, including Project Management, IT Security, Business and many more. Our courses cater to every training need, from introductory crash courses to advanced and prestigious qualifications, all to the highest standard of quality.</p>
                    <div class="buttons">
                        <a class="btn-blue"><img src="{{url('img/search/call-us.svg')}}" alt="call-us">Enquire Now</a>
                        <a class="btn-white"><img src="{{url('img/search/white-arrow.svg')}}" alt="white-arrow">Course Details</a>
                    </div>
                </div>
                <div class="result-info">
                    <div class="heading">
                        <h2>Value Stream Mapping - <span>Lean Training</span></h2>
                    </div>
                    <p>Choose from over 200 courses which cover all aspects of business and personal training, including Project Management, IT Security, Business and many more. Our courses cater to every training need, from introductory crash courses to advanced and prestigious qualifications, all to the highest standard of quality.</p>
                    <div class="buttons">
                        <a class="btn-blue"><img src="{{url('img/search/call-us.svg')}}" alt="call-us">Enquire Now</a>
                        <a class="btn-white"><img src="{{url('img/search/white-arrow.svg')}}" alt="white-arrow">Course Details</a>
                    </div>
                </div>
                <div class="result-info">
                    <div class="heading">
                        <h2>Value Stream Mapping - <span>Lean Training</span></h2>
                    </div>
                    <p>Choose from over 200 courses which cover all aspects of business and personal training, including Project Management, IT Security, Business and many more. Our courses cater to every training need, from introductory crash courses to advanced and prestigious qualifications, all to the highest standard of quality.</p>
                    <div class="buttons">
                        <a class="btn-blue"><img src="{{url('img/search/call-us.svg')}}" alt="call-us">Enquire Now</a>
                        <a class="btn-white"><img src="{{url('img/search/white-arrow.svg')}}" alt="white-arrow">Course Details</a>
                    </div>
                </div>
            </div>
            <div class="filter">
                <div class="filter-info">
                    <h2>Filter</h2>
                    <div class="search-catagories">
                        <p>Categories</p>
                        <ul>
                            <li><input type="checkbox"><label for="">284 Times in last week</label></li>
                            <li><input type="checkbox"><label for="">284 Times in last week</label></li>
                            <li><input type="checkbox"><label for="">284 Times in last week</label></li>
                            <li><input type="checkbox"><label for="">284 Times in last week</label></li>
                            <li><input type="checkbox"><label for="">284 Times in last week</label></li>
                        </ul>
                    </div>
                    <div class="search-catagories">
                        <p>Categories</p>
                        <ul>
                            <li><input type="checkbox"><label for="">284 Times in last week</label></li>
                            <li><input type="checkbox"><label for="">284 Times in last week</label></li>
                            <li><input type="checkbox"><label for="">284 Times in last week</label></li>
                            <li><input type="checkbox"><label for="">284 Times in last week</label></li>
                            <li><input type="checkbox"><label for="">284 Times in last week</label></li>
                        </ul>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>

@endsection