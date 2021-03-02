@extends("layouts.master")
@section("content")

<!-- Start Banner Section -->
<section class="flex-container banner privacy-banner">
    <div class="container">
        @include("layouts.navbar")
        <div class="banner-container">
            <h1>Privacy Policy</h1>
            <p>We are committed to protect & safeguard your privacy.</p>
            <div class="breadcrums">
                <ul>
                    <li><a href="">Home</a></li>
                    <li><img src="{{url('img/master/breadcrum-arrow.svg')}}" alt="arrow" class="white"></li>
                    <li><img src="{{url('img/master/breadcrum-black.svg')}}" alt="arrow" class="black"></li>
                    <li><a href="">Privacy Policy</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Section -->

<!-- Start policy section -->
<section class="flex-container policy"> 
    <div class="container">
        <div class="policy-container">
        <div class="heading">
            <h2>Privacy Policy</h2>
        </div>
        <h3>Who we are</h3>
        <p>Best Practice Training Limited (hereafter referred to as the “Company”, “we”, “us”, and “our”) provides professional training courses. The Company takes data protection very seriously and abide by the EU General Data Protection Regulation (GDPR). We encourage prospective clients to read the Company’s terms and conditions, prior to any purchases, in parallel to this privacy statement.</p>
        <h3>What data we collect?</h3>
        <p>We collect the following information from you through the use of enquiry and contact forms on the Website, and within Emails or telephone communications too:</p>
        <ul>
            <li><strong>Name and contact data:</strong>We collect your first and last name, email address, postal address, phone number, in order to respond sufficiently and appropriately to your enquiry to find a suitable course for you.</li>
            <li><strong>Billing data:</strong>We collect data necessary billing information to process your payment if you make a purchase. We do not store or retain any payment details once the purchase is complete.</li>
        </ul>
        <p>If you are progressing your career through the Company, Apprenticeship or further education we may collect addition personal information to secure funding or to satisfy statutory legal or Government scheme requirements. You will be informed on such occasions. We also store personal information from you when you communicate with us regarding the provision of services, including by email, postal mail or telephone. We collect certain information about the visitors of our Website. Please refer to Cookies policy for more details. We do not pass on training information to any other organisation, or your personal organisation, without the explicit consent of your employer, unless required by our examining institutes in the pursuit of service delivery, for example when registering an exam. If you do not wish to be contacted for any marketing purposes your consent can be removed by clicking “unsubscribe” on our formal marketing emails. An alternative is to log your request to unsubscribe by visiting our “Unsubscribe me” page.</p>
        </div>
    </div>
</section>
<!-- End policy section -->

<!-- Start budget section -->
<section class="flex-container budget">
    <div class="container">
        <div class="budget-container">
            <div class="heading center-heading">
                <h2>Compare Budget Allocations</h2>
            </div>
            <p class="headline">Receive these exclusive benefits depending on your chosen budget.</p>
            <div class="budget-table">
            <table>
                <tr>
                    <th>Features</th>
                    <th>Bronze</th>
                    <th>Silver</th>
                    <th>Gold</th>
                </tr>
                <tr>
                    <td>
                    <p>Dedicated account manager</p>
                    <p>Your direct point of contact for all your training requirements</p>
                    </td>
                    <td><img src="{{url('img/privacy-policy/tick.svg')}}" alt="tick"></td>
                    <td><img src="{{url('img/privacy-policy/tick.svg')}}" alt="tick"></td>
                    <td><img src="{{url('img/privacy-policy/tick.svg')}}" alt="tick"></td>
                </tr>
                <tr>
                    <td>
                    <p>Fixed discount percentages</p>
                    <p>Discount rates will vary based upon investment level</p>
                    </td>
                    <td><img src="{{url('img/privacy-policy/tick.svg')}}" alt="tick"></td>
                    <td><img src="{{url('img/privacy-policy/tick.svg')}}" alt="tick"></td>
                    <td><img src="{{url('img/privacy-policy/tick.svg')}}" alt="tick"></td>
                </tr>
                <tr>
                    <td>
                    <p>Free eLearning licences</p>
                    <p>Depending on your budget investment, you will be able to enrol a number of users on eLearning courses</p>
                    </td>
                    <td>20 Users</td>
                    <td>10 Users</td>
                    <td>5 Users</td>
                </tr>
                <tr>
                    <td>
                    <p>Free courses</p>
                    <p>Depending on your budget investment, you will be able to enrol a number of delegates on courses</p>
                    </td>
                    <td>12 Delegates</td>
                    <td>7 Delegates</td>
                    <td>3 Delegates</td>
                </tr>
                <tr>
                    <td>
                    <p>Become a partner</p>
                    <p>You'll be added to our clients and we'll provide you with a testimonial. You will also receive exclusive offers and training updates</p>
                    </td>
                    <td><img src="{{url('img/privacy-policy/tick.svg')}}" alt="tick"></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                    </td>
                    <td><div class="buttons"><a class="btn-blue"><img src="{{url('img/privacy-policy/call-us.svg')}}" alt="call-us">Enquire Now</a></div></td>
                    <td><div class="buttons"><a class="btn-blue"><img src="{{url('img/privacy-policy/call-us.svg')}}" alt="call-us">Enquire Now</a></div></td>
                    <td><div class="buttons"><a class="btn-blue"><img src="{{url('img/privacy-policy/call-us.svg')}}" alt="call-us">Enquire Now</a></div></td>
                </tr>
            </table>
        </div>
        </div>
    </div>
</section>
<!-- End budget section -->

<!-- Start knowledge section -->
<section class="flex-container knowledge">
    <div class="container">
        <div class="knowledge-container">
            <div class="pass-info">
                <div class="heading">
                    <h2>Your guide to booking a Knowledge Pass</h2>
                </div>
                <p>"The quality of training provided has been good with very good feedback from delegates. They use good quality venues and think about meeting our needs in their selection."
                    </p>
                    <p>The quality of training provided has been good with very good feedback from delegates. </p>
                    <p>They use good quality venues and think about meeting our needs in their selection. " The quality of training provided has been good with very good feedback from delegates. They use good quality venues and think about meeting our needs in their selection.</p>
                    <div class="buttons">
                    <a class="btn-blue"><img src="{{url('img/privacy-policy/message.svg')}}" alt="arrow">Need More Info</a>
                    </div>
            </div>
            <div class="booking-list">
                    <div class="booking-info">
                        <span><img src="{{url('img/privacy-policy/hand.svg')}}" alt="hand"></span>
                        <h3>Confirm the amount</h3>
                        <p>Through the use of Avenoire you can easily manage training requests, eliminating the need for collating spreadsheets</p>
                    </div>
                    <div class="booking-info">
                        <span><img src="{{url('img/privacy-policy/platform.svg')}}" alt="platform"></span>
                        <h3>Your Online platform is live</h3>
                        <p>Through the use of Avenoire you can easily manage training requests, eliminating the need for collating spreadsheets</p>
                    </div>
                    <div class="booking-info">
                        <span><img src="{{url('img/privacy-policy/online-booking.svg')}}" alt="online-booking"></span>
                        <h3>Start booking your courses</h3>
                        <p>Through the use of Avenoire you can easily manage training requests, eliminating the need for collating spreadsheets</p>
                    </div>
                    <div class="booking-info">
                        <span><img src="{{url('img/privacy-policy/form.svg')}}" alt="form"></span>
                        <h3>Sign the booking form</h3>
                        <p>Through the use of Avenoire you can easily manage training requests, eliminating the need for collating spreadsheets</p>
                    </div>
                    <div class="booking-info">
                        <span><img src="{{url('img/privacy-policy/data.svg')}}" alt="data"></span>
                        <h3>Your dedicated account is opened</h3>
                        <p>Through the use of Avenoire you can easily manage training requests, eliminating the need for collating spreadsheets</p>
                    </div>
                    <div class="booking-info">
                        <span><img src="{{url('img/privacy-policy/conversation.svg')}}" alt="conversation"></span>
                        <h3>Caroline, cornwall Council</h3>
                        <p>Through the use of Avenoire you can easily manage training requests, eliminating the need for collating spreadsheets</p>
                    </div>
            </div>
        </div>
    </div>
</section>
<!-- End knowledge section -->

<!-- Start study section -->
<section class="flex-container study">
    <div class="container">
        <div class="study-container">
            <div class="heading center-heading">
                <h2>Case <span>Studies</span></h2>
            </div>
            <div class="study-list">
                <div class="study-info">
                    <h2>Consistent Quality</h2>
                    <p>The Knowledge Academy is in year 2 of a 3-year rolling contract, where PRINCE2 training is delivered for 60 Masters students in Management each Summer as part of their degree. The fact that The Knowledge Academy is trusted as a supplier of PRINCE2 training to those paying for Masters degrees is proof in itself that we are a respected and established supplier. More importantly, it is proof of the substantial benefits of the course that it is considered an essential part of the training of Masters students, and that City University of London should continue to procure large numbers of courses year upon year.</p>
                </div>
                <div class="study-info">
                    <h2>Consistent Quality</h2>
                    <p>The Knowledge Academy is in year 2 of a 3-year rolling contract, where PRINCE2 training is delivered for 60 Masters students in Management each Summer as part of their degree. The fact that The Knowledge Academy is trusted as a supplier of PRINCE2 training to those paying for Masters degrees is proof in itself that we are a respected and established supplier. More importantly, it is proof of the substantial benefits of the course that it is considered an essential part of the training of Masters students, and that City University of London should continue to procure large numbers of courses year upon year.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End study section -->

<!-- Start requirement section -->
<section class="flex-container requirement">
    <div class="container">
        <div class="requirement-container">
            <div class="heading center-heading">
                <h2>Calculate your Requirements</h2>
            </div>
            <p class="headline">Not sure what your budget should be? Use our training calculator to figure out how much you need to spend. Simply select how many of each course you think you will need for your staff and we will tell you the estimated cost.</p>
            <table>
                <tr>
                    <th>Select a course category</th>
                    <th># of Delegates</th>
                    <th>Total</th>
                </tr>
                <tr>
                    <td>Business Skills (17 Course(s))</td>
                    <td>0</td>
                    <td>£0</td>
                </tr>
                <tr>
                    <td>Popular Business Skills courses</td>
                    <td>Delegates</td>
                    <td>Price</td>
                    <td>Total</td>
                </tr>
                <tr>
                    <td>Exceptional Customer Service Training</td>
                    <td></td>
                    <td>£1295</td>
                    <td>£0</td>
                </tr>
                <tr>
                    <td>Exceptional Customer Service Training</td>
                    <td></td>
                    <td>£1295</td>
                    <td>£0</td>
                </tr>
                <tr>
                    <td>Business Skills (17 Course(s))</td>
                    <td>0</td>
                    <td>£0</td>
                </tr>
                <tr>
                    <td>Summary  |  1 Courses Selected</td>
                </tr>
            </table>
        </div>
    </div>
</section>

@endsection