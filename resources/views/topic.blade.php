@extends("layouts.master")
@section("content")


<!-- Start Banner Section -->
    <section class="flex-container banner topic-banner">
        <div class="container">
            @include("layouts.navbar")
            <div class="banner-container">
            <div class="banner-content">
                <h1>PRINCE2® Foundation And Practitioner </h1>
                    <p>It is widely used by the UK government as well as internationally and in private sector. PRINCE2® Foundation and Practitioner is a combined course which helps you to achieve both the PRINCE2® Foundation and PRINCE2® Practitioner certifications.</p>
                    <div class="breadcrums">
                        <ul>
                            <li><a href="">Home</a></li>
                            <img src="{{url('img/master/breadcrum-arrow.svg')}}" alt="breadcrums" class="white">
                            <img src="{{url('img/master/breadcrum-black.svg')}}" alt="breadcrums" class="black">
                            <li><a href="">PRINCE2® Foundation and Practitioner</a></li>
                        </ul>
                </div>
            </div>
                <div class="choose-list">
                    <div class="heading">
                        <h2>REASONS TO CHOOSE</h2>
                    </div>
                    <ul>
                        <li>The UK’s favourite project management methodology</li>
                        <li>The UK’s favourite project management methodology</li>
                        <li>The UK’s favourite project management methodology</li>
                        <li>The UK’s favourite project management methodology</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
<!-- End Banner Section -->


    <!-- Start topic-courses section -->
        <section class="flex-container topic-courses" id="topic-courses">
            <div class="container">
                <div class="courses-container">
                    <div class="explore-courses">
                        <div class="heading">
                            <h2>Popular Courses to <span>Explore</span></h2>
                        </div>
                        <div class="course-item">
                            <span>
                                <img src="{{url('img/topic/book-black.svg')}}" alt="book-black" class="book-black">
                                <img src="{{url('img/topic/white-book.svg')}}" alt="white-book" class="white-book">
                            </span>
                            <div class="course-name">
                                <h3>PRINCE2® Training Foundation & Practitioner</h3>
                                <img src="{{url('img/topic/right-arrow.svg')}}" alt="right-arrow" >
                            </div>
                        </div>
                        <div class="course-item">
                            <span>
                            <img src="{{url('img/topic/book-black.svg')}}" alt="book-black" class="book-black">
                                <img src="{{url('img/topic/white-book.svg')}}" alt="white-book" class="white-book">
                            </span>
                            <div class="course-name">
                                <h3>PRINCE2® Training Foundation & Practitioner</h3>
                                <img src="{{url('img/topic/right-arrow.svg')}}" alt="right-arrow" >
                            </div>
                        </div>
                        <div class="course-item">
                            <span>
                            <img src="{{url('img/topic/book-black.svg')}}" alt="book-black" class="book-black">
                                <img src="{{url('img/topic/white-book.svg')}}" alt="white-book" class="white-book">
                            </span>
                            <div class="course-name">
                                <h3>PRINCE2® Training Foundation & Practitioner</h3>
                                <img src="{{url('img/topic/right-arrow.svg')}}" alt="right-arrow" >
                            </div>
                        </div>
                        <div class="course-item">
                            <span>
                            <img src="{{url('img/topic/book-black.svg')}}" alt="book-black" class="book-black">
                                <img src="{{url('img/topic/white-book.svg')}}" alt="white-book" class="white-book">
                            </span>
                            <div class="course-name">
                                <h3>PRINCE2® Training Foundation & Practitioner</h3>
                                <img src="{{url('img/topic/right-arrow.svg')}}" alt="right-arrow" >
                            </div>
                        </div>
                    </div>
                    <div class="courses-info">
                        <h2>Number Of Delegates Buys Courses In A Week</h2>
                        <span>
                            <img src="{{url('img/topic/courses-info.png')}}" alt="courses-info">
                        </span>
                    </div>
                </div>
            </div>
        </section>
    <!-- End topic-courses section -->

<!-- Start Foundation Section -->
    <section class="flex-container foundation">
        <div class="container">
            <div class="foundation-container">
                <div class="heading">
                    <h2>PRINCE2 <span>Training</span></h2>
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
                    </ul>
                    <div class="tab-content" id="overview">
                        <div class="overview-content" id="showmorecontent">
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
                        </div>
                        <div class="buttons">
                            <a href="#showmorecontent" class="btn-blue showmorecontent">
                                <span class="text">Show More</span>
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
                </div>
            </div>
        </div>
    </section>
<!-- End Foundation Section -->


<!-- Start topic-delivery section -->

    <section class="flex-container topic-delivery">
        <div class="container">
            <div class="delivery-container">
                <div class="delivery-content">
                <div class="heading white-heading">
                    <h2>Delivery Methods</h2>
                </div>
                <p>Choose from over 200 courses which cover all aspects of business and personal training, including Project Management, IT Security, Business and many more. Our agency can only be as strong as our people & because of this, our team have designed game changing products.</p>
                </div>
                <div class="delivery-list">
                    <a class="list">
                        <span>
                        <img src="{{url('img/topic/classroom.svg')}}" alt="classroom" class="black-icon">
                        <img src="{{url('img/topic/classroom-white.svg')}}" alt="classroom" class="white-icon">
                        </span>
                        Classroom Training
                    </a>
                    <a class="list">
                        <span>
                        <img src="{{url('img/topic/led.svg')}}" alt="led" class="black-icon">
                        <img src="{{url('img/topic/led-white.svg')}}" alt="led" class="white-icon">
                        </span>
                        Online Instructor-Led
                    </a>
                    <a class="list">
                        <span>
                        <img src="{{url('img/topic/paced.svg')}}" alt="paced" class="black-icon">
                        <img src="{{url('img/topic/paced-white.svg')}}" alt="paced" class="white-icon">
                        </span>
                        Online/Self-Paced
                    </a>
                    <a class="list">
                        <span>
                        <img src="{{url('img/topic/onsite.svg')}}" alt="onsite" class="black-icon">
                        <img src="{{url('img/topic/onsite-white.svg')}}" alt="onsite" class="white-icon">
                        </span>
                        Onsite Training
                    </a>
                </div>
            </div>
        </div>
    </section>

<!-- End topic-delivery section -->


<!-- Start topic-choose section -->
    <section class="flex-container topic-choose">
        <div class="container">
            <div class="choose-container">
                <div class="choose-content">
                        <div class="heading">
                           <h2>Why Will You <span>Choose Us?</span></h2>  
                        </div>
                        <p>Our agency can only be as strong as our people & because of this, our team have designed game changing products.</p>
                        <p>Intime is a design studio founded in London. Nowadays, we’ve grown and expanded our services, and have become a multinational firm, offering a variety of services and solutions Worldwide.</p>
                    <div class="choose-progress">
                        <div class="count">
                            <div class="circle">
                                <svg class="progress-ring topic-first" width="95" height="95">
                                    <circle class="circle-default" fill="white" r="43" cx="47.5" cy="47.5" />
                                    <circle class="progress-ring__circle" fill="transparent" r="43" cx="47.5" cy="47.5" />
                                </svg>
                            </div>
                                <p class="txt-name">Business strategy growth</p>
                        </div>     
                        <div class="count">
                            <div class="circle">
                                <svg class="progress-ring topic-second" width="95" height="95">
                                    <circle class="circle-default" fill="white" r="43" cx="47.5" cy="47.5" />
                                    <circle class="progress-ring__circle" fill="transparent" r="43" cx="47.5" cy="47.5" />
                                </svg>
                            </div>
                            <p class="txt-name">Finance valuable ideas</p>
                        </div>
                    </div>
                    <div class="buttons">
                        <a class="btn-blue">
                            <img src="{{url('img/topic/topic-email.svg')}}" alt="topic-email">
                            Enquire Now
                        </a>
                    </div>
                </div>
                <div class="choose-image">
                    <div class="years">
                        <h3>10+</h3>
                        <p>YEARS OF EXPERIENCES</p>
                    </div>
                    <span>
                        <img src="{{url('img/topic/choose-image.png')}}" alt="choose-image">
                    </span>
                </div>
            </div>
        </div>
    </section>
<!-- End topic choose section -->


<!-- Start experiences section -->
    <section class="flex-container experiences">
        <div class="container">
            <div class="experiences-container">
                <div class="heading center-heading white-heading">
                    <h2>
                         A Totally Innovative Corporate Learning Experience <br/> For Your Workforce
                    </h2>
                </div>
                <div class="experiences-list">
                        <div class="experiences-item">
                            <span>
                                <img src="{{url('img/topic/topic-search.svg')}}" alt="topic-search">
                            </span>

                            <h3>
                            Learning Experience Platform
                            </h3>

                            <p>
                            Choose from over 200 courses which cover all aspects of business and personal training, including Project  Management, IT Security, Business and many more.
                            </p>
                        </div>
                        <div class="experiences-item">
                            <span>
                                <img src="{{url('img/topic/premium.svg')}}" alt="premium">
                            </span>

                            <h3>
                            Premium training catalogue
                            </h3>

                            <p>
                            Choose from over 200 courses which cover all aspects of business and personal training, including Project  Management, IT Security, Business and many more.
                            </p>
                        </div>
                        <div class="experiences-item">
                            <span>
                                <img src="{{url('img/topic/engaging.svg')}}" alt="engaging">
                            </span>

                            <h3>
                            Engaging Trainings
                            </h3>

                            <p>
                            Choose from over 200 courses which cover all aspects of business and personal training, including Project  Management, IT Security, Business and many more.
                            </p>
                        </div>
                </div>
            </div>
            <a class="top-arrow smoothscroll" data-href="#topic-courses" >
                <img src="{{url('../img/topic/top-arrow.svg')}}" alt="top-arrow">
            </a>
        </div>
    </section>
<!-- End experiences section -->


<!-- Start explore section -->
    <section class="flex-container explore" id="explore">
        <div class="container">
            <div class="explore-container">
                <div class="heading center-heading">
                    <h2>Other Topics to <span>Explore</span></h2>
                </div>
                <div class="explore-list">
                    <div class="explore-item"> 
                        <div class="numbers">
                            <img src="{{url('img/topic/topic-book.svg')}}" alt="topic-book">
                            <p>377
                                <span>Courses</span>
                            </p>
                        </div>
                        <h3>Physical Science and Engineering</h3>
                    </div>
                    <div class="explore-item"> 
                        <div class="numbers">
                            <img src="{{url('img/topic/topic-book.svg')}}" alt="topic-book">
                            <p>377
                                <span>Courses</span>
                            </p>
                        </div>
                        <h3>Physical Science and Engineering</h3>
                    </div>
                    <div class="explore-item"> 
                        <div class="numbers">
                            <img src="{{url('img/topic/topic-book.svg')}}" alt="topic-book">
                            <p>377
                                <span>Courses</span>
                            </p>
                        </div>
                        <h3>Physical Science and Engineering</h3>
                    </div>
                    <div class="explore-item"> 
                        <div class="numbers">
                            <img src="{{url('img/topic/topic-book.svg')}}" alt="topic-book">
                            <p>377
                                <span>Courses</span>
                            </p>
                        </div>
                        <h3>Physical Science and Engineering</h3>
                    </div>
                    <div class="explore-item"> 
                        <div class="numbers">
                            <img src="{{url('img/topic/topic-book.svg')}}" alt="topic-book">
                            <p>377
                                <span>Courses</span>
                            </p>
                        </div>
                        <h3>Physical Science and Engineering</h3>
                    </div>
                    <div class="explore-item"> 
                        <div class="numbers">
                            <img src="{{url('img/topic/topic-book.svg')}}" alt="topic-book">
                            <p>377
                                <span>Courses</span>
                            </p>
                        </div>
                        <h3>Physical Science and Engineering</h3>
                    </div>
                    <div class="explore-item"> 
                        <div class="numbers">
                            <img src="{{url('img/topic/topic-book.svg')}}" alt="topic-book">
                            <p>377
                                <span>Courses</span>
                            </p>
                        </div>
                        <h3>Physical Science and Engineering</h3>
                    </div>
                    <div class="explore-item"> 
                        <div class="numbers">
                            <img src="{{url('img/topic/topic-book.svg')}}" alt="topic-book">
                            <p>377
                                <span>Courses</span>
                            </p>
                        </div>
                        <h3>Physical Science and Engineering</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- End explore section -->


<!-- Start goals section  -->
    <section class="flex-container goals">
        <div class="container">
            <div class="goals-container">
                <div class="goal-image">
                    <div class="heading">
                        <h2>Achieve Your Goals <span>with BPT</span></h2>
                    </div>
                    <p>The Knowledge Academy is a World's Leading Association for training professionals. The knowledge Academy provides training in 490+ location in 221+ countries, covering 3000 subjects with four delivery method Classroom, Live Classroom (Virtual),The Knowledge Academy is a World's Leading Association for training professionals. The knowledge Academy provides training in 490+ location in 221+ countries, covering 3000 subjects with four delivery method Classroom, Live Classroom (Virtual),</p>

                    <span class="image">
                        <img src="{{url('img/topic/goals.png')}}" alt="goals">
                    </span>
                </div>
                <div class="goals-list">
                    <div class="goal-item">
                        <span class="item-image">
                            <img src="{{url('img/topic/skills.svg')}}" alt="skills">
                        </span>
                        <div class="goal-content">
                            <h3>
                            Learn The Latest Skills
                            </h3>
                            <p>Choose from over 200 courses which cover all aspects of business and personal training, including Project Management,</p>
                        </div>
                    </div>
                    <div class="goal-item">
                        <span class="item-image">
                            <img src="{{url('img/topic/carrer.svg')}}" alt="career">
                        </span>
                        <div class="goal-content">
                            <h3>
                            Get Ready For A Career
                            </h3>
                            <p>Choose from over 200 courses which cover all aspects of business and personal training, including Project Management,</p>
                        </div>
                    </div>
                    <div class="goal-item">
                        <span class="item-image">
                            <img src="{{url('img/topic/degree.svg')}}" alt="degree">
                        </span>
                        <div class="goal-content">
                            <h3>
                            Earn A Degree
                            </h3>
                            <p>Choose from over 200 courses which cover all aspects of business and personal training, including Project Management,</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- End goals section  -->

<!-- Start Popular-Location Section -->
    <section class="flex-container popular-location">
        <div class="container">
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
        </div>
    </section>
<!-- End Popular-Location Section -->



@endsection