@extends("layouts.master")
@section("content")

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

@endsection