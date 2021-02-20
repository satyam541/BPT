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

<!-- Start Role Section -->
<section class="flex-container role">
    <div class="container">
        <div class="role-container">
            <div class="role-list">
                <div class="role-content">
                    <div class="content">
                        <span>
                            <img src="{{url('img/master/conferencing.svg')}}" alt="conferencing">
                        </span>
                        <h2>Video Conferencing</h2>
                    </div>
                    <p>Using the best web conferencing software to facilitate learner-teacher-learner communication.</p>
                </div>
                <div class="role-content">
                    <div class="content">
                        <span>
                            <img src="{{url('img/master/whiteboards.svg')}}" alt="whiteboards">
                        </span>
                        <h2>Digital Whiteboards</h2>
                    </div>
                    <p>Offering real -time demonstrations and diagrams.Offering real -time demonstrations and diagrams.</p>
                </div>
                <div class="role-content">
                    <div class="content">
                        <span>
                            <img src="{{url('img/master/messaging.svg')}}" alt="messaging">
                        </span>
                        <h2>Instant Messaging</h2>
                    </div>
                    <p>Allowing typed conversations on lower bandwidths.Offering real -time demonstrations and diagrams.</p>
                </div>
                <div class="role-content">
                    <div class="content">
                        <span>
                            <img src="{{url('img/master/control.svg')}}" alt="control">
                        </span>
                        <h2>Participation Controls</h2>
                    </div>
                    <p>Enabling students to participate in discussions, mute their surroundings or virtually "raise" their hands.  </p>
                </div>
            </div>
            <div class="role-img">
                <h2>The Role of Virtual Classrooms in Future Learning</h2>
                <span>
                    <img src="{{url('img/master/future.png')}}" alt="future">
                </span>
            </div>
        </div>
    </div>
</section>
<!-- End Role Section -->

@endsection