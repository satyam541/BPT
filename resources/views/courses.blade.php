@extends("layouts.master")
@section("content")

<!-- Start Banner Section -->
<section class="flex-container banner courses-banner">
    <div class="container">
        @include("layouts.navbar")
        <div class="banner-container">
            <div class="banner-content">
                <h1>PRINCE2® Foundation And Practitioner </h1>
                <div class="breadcrums">
                    <ul>
                        <li><a href="javascript:void(0);">Home</a></li>
                        <img src="{{url('img/master/breadcrum-arrow.svg')}}" alt="breadcrums" class="white">
                        <img src="{{url('img/master/breadcrum-black.svg')}}" alt="breadcrums" class="black">
                        <li><a href="javascript:void(0)">PRINCE2® Training</a></li>
                        <img src="{{url('img/master/breadcrum-arrow.svg')}}" alt="breadcrums" class="white">
                        <img src="{{url('img/master/breadcrum-black.svg')}}" alt="breadcrums" class="black">
                        <li><a href="javascript:void(0)">PRINCE2® Foundation and Practitioner</a></li>
                    </ul>
                </div>
                <p>It is widely used by the UK government as well as internationally and in private sector. PRINCE2® Foundation and Practitioner is a combined course which helps you to achieve both the PRINCE2® Foundation and PRINCE2® Practitioner certifications.</p>
            </div>
            <div class="banner-points">
                <h2>Key Points</h2>
                <ul>
                    <li>Duration: 5 Days*</li>
                    <li>Certificate(s): Included</li>
                    <li>Exam(s): Included</li>
                    <li>Support: 24/7</li>
                </ul>
                <div class="buttons">
                    <a href="javascript:void(0);" class="btn-blue open-popup enquiryJS" data-quote="Enquire Now">
                    <img src="{{url('img/courses/email.svg')}}" alt="email">Enquire Now
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Section -->

<!-- Start Foundation Section -->
<section class="flex-container foundation">
    <div class="container">
        <div class="foundation-container">
            <div class="heading">
                <h2>PRINCE2® Foundation <span>And Practitioner</span></h2>
            </div>
            <div class="tabs-container">
                <ul class="tab-links">
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

                    <li class="tab-click" data-target="faq">
                        <span class="image">
                            <img src="{{url('img/courses/faq.svg')}}" alt="faq">
                        </span>
                        <p class="tab">
                        FAQs
                        </p>
                        <div class="number">03</div>
                    </li>

                    <li class="tab-click" data-target="included">
                        <span class="image">
                            <img src="{{url('img/courses/included.svg')}}" alt="included">
                        </span>
                        <p class="tab">
                        What's Included
                        </p>
                        <div class="number">04</div>
                    </li>
                </ul>
                <div class="tab-content" id="overview">
                    <h2>Course Overview</h2>
                    <p>PRINCE2 2017 is now available! This PRINCE2 Foundation and Practitioner is a combined training course based on the 2017 syllabus, which enables delegates to attain the full certification all at once. Both the Foundation and Practitioner exam is included with this PRINCE2 training course. PRINCE2® is a product or process based approach used for management of almost all types of projects. This PeopleCert accredited training course introduces delegates to various project management methodologies and provides a thorough understanding of roles, principles, processes and themes that form the structure of PRINCE2®.</p>
                    <ul>
                        <li>Holding PRINCE2® Foundation and Practitioner certification allows you to excel in your career and make use of upcoming opportunities.</li>
                        <li>Learn thoroughly about the importance of this methodology and other related theoretical concepts in the Foundation level and then its practical applications in the Practitioner level.</li>
                        <li>By considering the factors involved in any project like costs, timescales, quality, scope, risk and benefits allows the project manager to address planning, monitoring and deploying projects by making use of PRINCE2® framework and themes.</li>
                    </ul>
                    <h2>PRINCE2 Foundation and Practitioner Training Course Structure</h2>
                    <p>The duration of the training course is five days.</p>
                    <p>The training course is split into two sections:</p>
                    <p>During the first three days, delegates will prepare for and complete the PRINCE2 Foundation exam.</p>
                    <p>During the final two days, delegates will prepare for and complete the PRINCE2 Practitioner exam.</p>
                    <div class="buttons">
                        <a href="javascript:void(0);" class="btn-blue">
                            Show More
                        </a>
                    </div>
                </div>

                <div class="tab-content" id="faq">
                    <div class="heading">
                        <h2>Frequently Asked <span>Questions</span></h2>
                    </div>
                    <div class="faq-list">
                        <div class="faq-item">
                            <div class="ques">
                            <h3>What is Tableau? </h3>
                            <span>
                            </span>
                            </div>
                            <div class="ans">
                            <p>Tableau software is the fastest adopted data visualisation tool whose purpose is to help users to
                                see raw data and converts into an exact format.</p>
                            </div>
                        </div>
                        <div class="faq-item">
                            <div class="ques">
                            <h3>What are the benefits of Tableau for data visualisation?</h3>
                            <span>
                            </span>
                            </div>
                            <div class="ans">
                            <p>There are various benefits of Tableau for data visualisation, such as high performance, easy usage,
                                unique visualisation capabilities, multiple data source connections, mobile-friendly, and more.</p>
                            </div>
                        </div>
                        <div class="faq-item">
                            <div class="ques">
                            <h3>What is the scope of Tableau software?</h3>
                            <span>
                            </span>
                            </div>
                            <div class="ans">
                            <p>Nowadays, Tableau software is developing as the trend for professionals in Business Intelligence.
                                Tableau experience is necessary for the data visualisation tool as it is gaining more popularity in
                                all kinds of businesses.</p>
                            </div>
                        </div>
                        <div class="faq-item">
                            <div class="ques">
                            <h3>What will you learn in The Knowledge Academy's Tableau course?</h3>
                            <span>
                            </span>
                            </div>
                            <div class="ans">
                            <p>In Tableau Training course, you will learn various basic and advanced concepts such as introduction
                                to Tableau software, features and benefits, data analysis and extraction, Tableau desktop role, and
                                how to use joins in this software.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-content" id="included">
                    <div class="heading center-heading">
                        <h2>What's Included <span>Us</span></h2>
                    </div>
                    <div class="included-list">
                            <div class="included-content">
                                <span>
                                    <img src="{{url('img/courses/exam.svg')}}" alt="exam">
                                </span>
                                <h3>Exam Included</h3>
                            </div>
                            <div class="included-content">
                                <span>
                                    <img src="{{url('img/courses/tutor.svg')}}" alt="tutor">
                                </span>
                                <h3>Tutor Support</h3>
                            </div>
                            <div class="included-content">
                                <span>
                                    <img src="{{url('img/courses/points.svg')}}" alt="points">
                                </span>
                                <h3>Key Learning Points</h3>
                            </div>
                            <div class="included-content">
                                <span>
                                    <img src="{{url('img/courses/certificate.svg')}}" alt="certificate">
                                </span>
                                <h3>Certificates</h3>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Foundation Section -->

<!-- Start Unable Section -->
<section class="flex-container unable">
    <div class="container">
        <div class="unable-container">
            <h2>Unable to Spare Entire Days Training?</h2>
            <p>We offer the option to learn virtually over consecutive half-days, whilst maintaining your quality day-to-day working commitments. We offer the option to learn virtually over consecutive half-days, whilst maintaining your quality day-to-day working commitments. We offer the option to learn virtually over consecutive half-days, whilst maintaining your quality day-to-day working commitments.</p>
            <div class="buttons">
                <a href="javascript:void(0);" class="btn-blue open-popup enquiryJS" data-quote="Have a Question?">
                    <img src="{{url('img/master/arrow.svg')}}" alt="arrow">Have a Question?
                </a>
            </div>
        </div>
    </div>
</section>
<!-- End Unable Section -->

<!-- Start Training Section -->
<section class="flex-container training">
    <div class="container">
        <div class="training-container">
            <div class="heading center-heading">
                <h2>PRINCE2® Foundation And Practitioner <span>Training Calender</span></h2>
            </div>
            <div class="filter-top">
                <div class="heading">
                    <h2>Filters</h2>
                </div>
                <form class="form">
                    <div class="select-dropdown">
                        <p>Select Your Course:</p>
                        <select name="course">
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="select-dropdown">
                        <p>Choose a Location:</p>
                        <select name="course">
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="select-dropdown">
                        <p>Select a Delivery Format:</p>
                        <select name="course">
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="buttons">
                <a href="javascript:void(0);" class="btn-blue">Explore Now</a>
            </div>
        </div>
    </div>
</section>
<!-- End Training Section -->

<!-- Start Virtual Section -->
<section class="flex-container virtual">
    <div class="container">
        <div class="virtual-container">
            <div class="virtual-list">
                <div class="virtual-content">
                    <div class="content">
                        <span>
                            <img src="{{url('img/courses/conference.svg')}}" alt="conference">
                        </span>
                        <h2>Video Conferencing</h2>
                    </div>
                    <p>Using the best web conferencing software to facilitate learner-teacher-learner communication.</p>
                </div>
                <div class="virtual-content">
                    <div class="content">
                        <span>
                            <img src="{{url('img/courses/whiteboard.svg')}}" alt="whiteboard">
                        </span>
                        <h2>Digital Whiteboards</h2>
                    </div>
                    <p>Offering real -time demonstrations and diagrams.Offering real -time demonstrations and diagrams.</p>
                </div>
                <div class="virtual-content">
                    <div class="content">
                        <span>
                            <img src="{{url('img/courses/messaging.svg')}}" alt="messaging">
                        </span>
                        <h2>Instant Messaging</h2>
                    </div>
                    <p>Allowing typed conversations on lower bandwidths.Offering real -time demonstrations and diagrams.</p>
                </div>
                <div class="virtual-content">
                    <div class="content">
                        <span>
                            <img src="{{url('img/courses/control.svg')}}" alt="control">
                        </span>
                        <h2>Participation Controls</h2>
                    </div>
                    <p>Enabling students to participate in discussions, mute their surroundings or virtually "raise" their hands.  </p>
                </div>
            </div>
            <div class="virtual-img">
                <h2>The Role of Virtual Classrooms in Future Learning</h2>
                <span>
                    <img src="{{url('img/courses/future.png')}}" alt="future">
                </span>
            </div>
        </div>
    </div>
</section>
<!-- End Virtual Section -->

<!-- Start Work Section -->
<section class="flex-container work">
    <div class="container">
        <div class="work-container">
            <div class="work-content">
                <div class="heading">
                    <h2>How It <span>Works?</span></h2>
                    <p>FIND COURSES</p>
                </div>
                <p>Choose from over 200 courses which cover all aspects of business and personal training, including Project Management, IT Security, Business and many more.Our courses cater to every training need, from introductory crash courses to advanced</p>
            </div>
            <div class="work-list">
                <div class="content">
                    <span>
                        <img src="{{url('img/courses/search.svg')}}" alt="search">
                    </span>
                    <h3>Search Courses</h3>
                    <p>Choose from over 200 courses which cover all aspects of business and personal training, including</p>
                </div>
                <div class="content">
                    <span>
                        <img src="{{url('img/courses/details.svg')}}" alt="details">
                    </span>
                    <h3>View Course Details</h3>
                    <p>Choose from over 200 courses which cover all aspects of business and personal training, including</p>
                </div>
                <div class="content">
                    <span>
                        <img src="{{url('img/courses/book.svg')}}" alt="book">
                    </span>
                    <h3>Book Course</h3>
                    <p>Choose from over 200 courses which cover all aspects of business and personal training, including</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Work Section -->

<!-- Start Language Section -->
<section class="flex-container language">
    <div class="container">
        <div class="language-container">
            <div class="language-img">
                <div class="info">
                <h2>PRINCE2® Foundation And Practitioner</h2>
                </div>
                <div class="price">
                    <span class="rate">£2495</span>
                    <span class="offer">£2495</span>
                    <div class="buy">
                        <span>
                            <img src="{{url('img/courses/stopwatch.svg')}}" alt="stopwatch">
                        </span>
                        <h3>23 hours left at this price!</h3>
                    </div>
                    <div class="buttons">
                        <a href="javascript:void(0);" class="btn-blue open-popup enquiryJS" data-quote="Buy Now">
                            <img src="{{url('img/courses/buy.svg')}}" alt="buy">
                            Buy Now
                        </a>
                    </div>
                </div>
            </div>
            <div class="language-content">
                <div class="heading">
                    <h2>Amazing Courses To Learn <span>Language Better</span></h2>
                </div>
                <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections</p>
                <div class="language-list">
                    <div class="content">
                        <span>
                            <img src="{{url('img/courses/skilled.svg')}}" alt="skilled">
                        </span>
                        <h3>Skilled Trainers</h3>
                    </div>
                    <div class="content">
                        <span>
                            <img src="{{url('img/courses/affordable.svg')}}" alt="affordable">
                        </span>
                        <h3>Affordable Courses</h3>
                    </div>
                    <div class="content">
                        <span>
                            <img src="{{url('img/courses/flexible.svg')}}" alt="flexible">
                        </span>
                        <h3>Efficient & Flexible</h3>
                    </div>
                    <div class="content">
                        <span>
                            <img src="{{url('img/courses/access.svg')}}" alt="access">
                        </span>
                        <h3>Lifetime Access</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Language Section -->

<!-- Start Skill Section -->
<section class="flex-container skill">
    <div class="container">
        <div class="skill-container">
            <div class="heading">
                <h2>Learn a New Skill From <span>Online Courses</span></h2>
            </div>
            <div class="skill-list">
                <div class="skill-content">
                    <h3>Learn The Latest Skills</h3>
                    <p>Like business analytics, graphic design, Python, and more.</p>
                    <div class="buttons">
                        <a href="javascript:void(0);" class="btn-blue open-popup enquiryJS" data-quote="Enquire Now">
                            <img src="{{url('img/courses/email.svg')}}" alt="email">
                            Enquire Now
                        </a>
                    </div>
                </div>
                <div class="skill-content">
                    <h3>100k Online Courses</h3>
                    <p>In high-demand fields like IT, AI and cloud engineering.</p>
                    <div class="buttons">
                        <a href="javascript:void(0);" class="btn-blue open-popup enquiryJS" data-quote="Enquire Now">
                            <img src="{{url('img/courses/email.svg')}}" alt="email">
                            Enquire Now
                        </a>
                    </div>
                </div>
                <div class="skill-content">
                    <h3>Earn a Certificate</h3>
                    <p>From a leading university in business, computer science, and more.</p>
                    <div class="buttons">
                        <a href="javascript:void(0);" class="btn-blue open-popup enquiryJS" data-quote="Enquire Now">
                            <img src="{{url('img/courses/email.svg')}}" alt="email">
                            Enquire Now
                        </a>
                    </div>
                </div>
                <div class="skill-content">
                    <h3>Up Your Skill</h3>
                    <p>With on-demand training and development programs.</p>
                    <div class="buttons">
                        <a href="javascript:void(0);" class="btn-blue open-popup enquiryJS" data-quote="Enquire Now">
                            <img src="{{url('img/courses/email.svg')}}" alt="email">
                            Enquire Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Skill Section -->

<!-- Start Related Section -->
<div class="flex-container related">
    <div class="container">
        <div class="related-container">
            <div class="heading center-heading white-heading">
                <h2>Explore Related Courses</h2>
            </div>
            <div class="related-list">
                <div class="related-content">
                    <span>
                        <img src="{{url('img/courses/related-book.svg')}}" alt="related-book">
                    </span>
                    <h3>MOV® Training</h3>
                </div>
                <div class="related-content">
                    <span>
                        <img src="{{url('img/courses/related-book.svg')}}" alt="related-book">
                    </span>
                    <h3>Scrum Training</h3>
                </div>
                <div class="related-content">
                    <span>
                        <img src="{{url('img/courses/related-book.svg')}}" alt="related-book">
                    </span>
                    <h3>CISA Training </h3>
                </div>
                <div class="related-content">
                    <span>
                        <img src="{{url('img/courses/related-book.svg')}}" alt="related-book">
                    </span>
                    <h3>Linux Training Courses</h3>
                </div>
                <div class="related-content">
                    <span>
                        <img src="{{url('img/courses/related-book.svg')}}" alt="related-book">
                    </span>
                    <h3>Primavera Training Courses</h3>
                </div>
                <div class="related-content">
                    <span>
                        <img src="{{url('img/courses/related-book.svg')}}" alt="related-book">
                    </span>
                    <h3>Agile Project Management Training</h3>
                </div>
                <div class="related-content">
                    <span>
                        <img src="{{url('img/courses/related-book.svg')}}" alt="related-book">
                    </span>
                    <h3>P3O® Training</h3>
                </div>
                <div class="related-content">
                    <span>
                        <img src="{{url('img/courses/related-book.svg')}}" alt="related-book">
                    </span>
                    <h3>APMP Training</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Related Section -->

<!-- Start Popular-Location Section -->
<section class="flex-container popular-location">
    <div class="popular-container">
        <div class="popular-content">
            <h2>Largest  Location</h2>
            <p>Southampton is the largest city located in England. The city is situated 69 miles south-west of London and 15 miles west north-west of Portsmouth. Southampton is the main port and neigh bouring city.</p>
            <div class="buttons">
            <a href="javascript:void(0);" class="btn-blue open-popup enquiryJS" data-quote="Learn More">
                <img src="{{url('img/courses/learn.svg')}}" alt="learn">
                Learn More
            </a>
            </div>
        </div>
        <div class="location-content">
            <div class="heading">
                <h2>Find The Most Convenient <span>Location For You</span></h2>
            </div>
            <div class="location-list">
                <div class="content">
                    <span class="image">
                        <img src="{{url('img/courses/travel.svg')}}" alt="travel">
                    </span>
                    <h3>London</h3>
                    <span class="arrow">
                        <img src="{{url('img/courses/dashed-arrow.svg')}}" alt="dashed-arrow">
                    </span>
                </div>
                <div class="content">
                    <span class="image">
                        <img src="{{url('img/courses/travel.svg')}}" alt="travel">
                    </span>
                    <h3>Birminghamon</h3>
                    <span class="arrow">
                        <img src="{{url('img/courses/dashed-arrow.svg')}}" alt="dashed-arrow">
                    </span>
                </div>
                <div class="content">
                    <span class="image">
                        <img src="{{url('img/courses/travel.svg')}}" alt="travel">
                    </span>
                    <h3>Manchester</h3>
                    <span class="arrow">
                        <img src="{{url('img/courses/dashed-arrow.svg')}}" alt="dashed-arrow">
                    </span>
                </div>
                <div class="content">
                    <span class="image">
                        <img src="{{url('img/courses/travel.svg')}}" alt="travel">
                    </span>
                    <h3>Cardiff</h3>
                    <span class="arrow">
                        <img src="{{url('img/courses/dashed-arrow.svg')}}" alt="dashed-arrow">
                    </span>
                </div>
                <div class="content">
                    <span class="image">
                        <img src="{{url('img/courses/travel.svg')}}" alt="travel">
                    </span>
                    <h3>Bristol</h3>
                    <span class="arrow">
                        <img src="{{url('img/courses/dashed-arrow.svg')}}" alt="dashed-arrow">
                    </span>
                </div>
                <div class="content">
                    <span class="image">
                        <img src="{{url('img/courses/travel.svg')}}" alt="travel">
                    </span>
                    <h3>Leeds</h3>
                    <span class="arrow">
                        <img src="{{url('img/courses/dashed-arrow.svg')}}" alt="dashed-arrow">
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Popular-Location Section -->

@endsection