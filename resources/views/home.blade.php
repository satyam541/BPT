@extends("layouts.master")

@section("content")

<section class="flex-container banner">
    
    <div class="container">
            @include("layouts.navbar")
            <div class="banner-container">
                <div class="banner-content">
                        <h1>
                            Whatever Your Training Needs, Find Your Ideal Course with Us
                        </h1>
                        <p>
                            Choose from over 200 courses which cover all aspects of business and personal training, including Project Management, IT Security, Business and many more. 
                            Our courses cater to every training need, from introductory crash courses to advanced and prestigious qualifications, all to the highest standard of quality.

                        </p>
                        <div class="search">
                            <input type="text" placeholder="Search your training course here....">
                            <button>
                                Search
                            </button>
                        </div>
                        <div class="buttons">
                                <a class="btn-blue">
                                    <img src="{{url('img/master/book.svg')}}" alt="book">
                                    Course catalogue
                                </a>
                        </div>
                </div>
                <div class="topic-list owl-carousel">
                    <ul>
                        <li>
                            <a>
                            <img src="{{url('img/master/open-book.svg')}}" alt="book">
                            <p>
                                PRINCE training
                                <span>prince training</span>
                            </p>
                            <img src="{{url('img/master/arrow.svg')}}" alt="arrow">
                            </a>
                        </li>
                        <li>
                            <a>
                            <img src="{{url('img/master/open-book.svg')}}" alt="book">
                            <p>
                                PRINCE training
                                <span>prince training</span>
                            </p>
                            <img src="{{url('img/master/arrow.svg')}}" alt="arrow">
                            </a>
                        </li>
                        <li>
                            <a>
                            <img src="{{url('img/master/open-book.svg')}}" alt="book">
                            <p>
                                PRINCE training
                                <span>prince training</span>
                            </p>
                            <img src="{{url('img/master/arrow.svg')}}" alt="arrow">
                            </a>
                        </li>
                        <li>
                            <a>
                            <img src="{{url('img/master/open-book.svg')}}" alt="book">
                            <p>
                                PRINCE training
                                <span>prince training</span>
                            </p>
                            <img src="{{url('img/master/arrow.svg')}}" alt="arrow">
                            </a>
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <a>
                            <img src="{{url('img/master/open-book.svg')}}" alt="book">
                            <p>
                                PRINCE training
                                <span>prince training</span>
                            </p>
                            <img src="{{url('img/master/arrow.svg')}}" alt="arrow">
                            </a>
                        </li>
                        <li>
                            <a>
                            <img src="{{url('img/master/open-book.svg')}}" alt="book">
                            <p>
                                PRINCE training
                                <span>prince training</span>
                            </p>
                            <img src="{{url('img/master/arrow.svg')}}" alt="arrow">
                            </a>
                        </li>
                        <li>
                            <a>
                            <img src="{{url('img/master/open-book.svg')}}" alt="book">
                            <p>
                                PRINCE training
                                <span>prince training</span>
                            </p>
                            <img src="{{url('img/master/arrow.svg')}}" alt="arrow">
                            </a>
                        </li>
                        <li>
                            <a>
                            <img src="{{url('img/master/open-book.svg')}}" alt="book">
                            <p>
                                PRINCE training
                                <span>prince training</span>
                            </p>
                            <img src="{{url('img/master/arrow.svg')}}" alt="arrow">
                            </a>
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <a>
                            <img src="{{url('img/master/open-book.svg')}}" alt="book">
                            <p>
                                PRINCE training
                                <span>prince training</span>
                            </p>
                            <img src="{{url('img/master/arrow.svg')}}" alt="arrow">
                            </a>
                        </li>
                        <li>
                            <a>
                            <img src="{{url('img/master/open-book.svg')}}" alt="book">
                            <p>
                                PRINCE training
                                <span>prince training</span>
                            </p>
                            <img src="{{url('img/master/arrow.svg')}}" alt="arrow">
                            </a>
                        </li>
                        <li>
                            <a>
                            <img src="{{url('img/master/open-book.svg')}}" alt="book">
                            <p>
                                PRINCE training
                                <span>prince training</span>
                            </p>
                            <img src="{{url('img/master/arrow.svg')}}" alt="arrow">
                            </a>
                        </li>
                        <li>
                            <a>
                            <img src="{{url('img/master/open-book.svg')}}" alt="book">
                            <p>
                                PRINCE training
                                <span>prince training</span>
                            </p>
                            <img src="{{url('img/master/arrow.svg')}}" alt="arrow">
                            </a>
                        </li>
                    </ul>
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
                <div class="course-name">
                    <span>
                        <img src="{{url('img/home/management.svg')}}" alt="management">
                    </span>
                    <div class="name">
                        <h3>
                            Project Management
                        </h3>
                        <p>
                            5 Topics
                        </p>
                        <p>
                            10 Courses
                        </p>
                    </div>
                    <a>
                        <img src="{{url('img/home/right-arrow.svg')}}" alt="right-arrow">
                    </a>
                </div>
                <div class="course-name">
                    <span>
                        <img src="{{url('img/home/analysis.svg')}}" alt="analysis">
                    </span>
                    <div class="name">
                        <h3>
                            Business Analysis
                        </h3>
                        <p>
                            5 Topics
                        </p>
                        <p>
                            10 Courses
                        </p>
                    </div>
                    <a>
                        <img src="{{url('img/home/right-arrow.svg')}}" alt="right-arrow">
                    </a>
                </div>
                <div class="course-name">
                    <span>
                        <img src="{{url('img/home/improvement.svg')}}" alt="improvement">
                    </span>
                    <div class="name">
                        <h3>
                        Business Improvement
                        </h3>
                        <p>
                            5 Topics
                        </p>
                        <p>
                            10 Courses
                        </p>
                    </div>
                    <a>
                        <img src="{{url('img/home/right-arrow.svg')}}" alt="right-arrow">
                    </a>
                </div>
                <div class="course-name">
                    <span>
                        <img src="{{url('img/home/it-service.svg')}}" alt="it-service">
                    </span>
                    <div class="name">
                        <h3>
                            IT Service Management
                        </h3>
                        <p>
                            5 Topics
                        </p>
                        <p>
                            10 Courses
                        </p>
                    </div>
                    <a>
                        <img src="{{url('img/home/right-arrow.svg')}}" alt="right-arrow">
                    </a>
                </div>
                <div class="course-name">
                    <span>
                        <img src="{{url('img/home/it-security.svg')}}" alt="it-security">
                    </span>
                    <div class="name">
                        <h3>
                        IT Security
                        </h3>
                        <p>
                            5 Topics
                        </p>
                        <p>
                            10 Courses
                        </p>
                    </div>
                    <a>
                        <img src="{{url('img/home/right-arrow.svg')}}" alt="right-arrow">
                    </a>
                </div>
                <div class="course-name">
                    <span>
                        <img src="{{url('img/home/protection.svg')}}" alt="protection">
                    </span>
                    <div class="name">
                        <h3>
                            Data Protection
                        </h3>
                        <p>
                            5 Topics
                        </p>
                        <p>
                            10 Courses
                        </p>
                    </div>
                    <a>
                        <img src="{{url('img/home/right-arrow.svg')}}" alt="right-arrow">
                    </a>
                </div>
                <div class="course-name">
                    <span>
                        <img src="{{url('img/home/applications.svg')}}" alt="applications">
                    </span>
                    <div class="name">
                        <h3>
                            Office Applications
                        </h3>
                        <p>
                            5 Topics
                        </p>
                        <p>
                            10 Courses
                        </p>
                    </div>
                    <a>
                        <img src="{{url('img/home/right-arrow.svg')}}" alt="right-arrow">
                    </a>
                </div>
                <div class="course-name">
                    <span>
                        <img src="{{url('img/home/skills.svg')}}" alt="skills">
                    </span>
                    <div class="name">
                        <h3>
                            Business Skills
                        </h3>
                        <p>
                            5 Topics
                        </p>
                        <p>
                            10 Courses
                        </p>
                    </div>
                    <a>
                        <img src="{{url('img/home/right-arrow.svg')}}" alt="right-arrow">
                    </a>
                </div>
                <div class="course-name">
                    <span>
                        <img src="{{url('img/home/database.svg')}}" alt="database">
                    </span>
                    <div class="name">
                        <h3>
                            Programming & Database
                        </h3>
                        <p>
                            5 Topics
                        </p>
                        <p>
                            10 Courses
                        </p>
                    </div>
                    <a>
                        <img src="{{url('img/home/right-arrow.svg')}}" alt="right-arrow">
                    </a>
                </div>
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
                <p>Call us for Professional, flexible and cost-effective Courses</p>
            </div>
            <div class="buttons">
                <a class="btn-white" href="tel: 02380001008">
                    <img src="{{url('img/master/call.svg')}}" alt="call">
                    02380001008
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
            </div>
            <div class="choose-list">
                <div class="item">
                    <img src="{{url('img/home/price.svg')}}" alt="price">
                    <h3>Best Price Guarantee</h3>
                    <p>You won’t find a better value in the marketplace. If you do find a lower price, send us the offer, and we’ll beat it.</p>
                </div>
                <div class="item">
                    <img src="{{url('img/home/run.svg')}}" alt="run">
                    <h3>Guaranteed to Run</h3>
                    <p>All our courses are 100% Guaranteed to Run on the dates provided, whether they are a classroom, virtual or in-house.</p>
                </div>
                <div class="item">
                    <img src="{{url('img/home/back.svg')}}" alt="back">
                    <h3>100% Money Back Guarantee</h3>
                    <p>We are so confident in our courses and the skills of our instructor that we offer a money-back guarantee if you do not pass the exam.</p>
                </div>
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
                    <img src="{{url('img/home/classroom.svg')}}" alt="classroom">
                    <h3>Classroom Training</h3>
                    <p>A variety of delivery methods are available depending on your learning preference.</p>
                    <a href="">Enquire Now</a>
                </div>
                <div class="item">
                    <img src="{{url('img/home/led.svg')}}" alt="led">
                    <h3>Online Instructor-Led</h3>
                    <p>A variety of delivery methods are available depending on your learning preference.</p>
                    <a href="">Enquire Now</a>
                </div>
                <div class="item">
                    <img src="{{url('img/home/paced.svg')}}" alt="paced">
                    <h3>Online Self-Paced</h3>
                    <p>A variety of delivery methods are available depending on your learning preference.</p>
                    <a href="">Enquire Now</a>
                </div>
                <div class="item">
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
                    <p>EVENTS</p>
                </div>
                <div class="item">
                    <img src="{{url('img/home/countries.svg')}}" alt="countries">
                    <div class="fact-count">
                    <h3 class="count-number" data-to="80" data-speed="3000">80</h3><span>+</span>
                    </div>
                    <p>COUNTRIES</p>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection