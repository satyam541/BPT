@extends("layouts.master")
@section("content")


<!-- Start Banner Section -->
    <section class="flex-container banner knowledge-banner">
        <div class="container">
            @include("layouts.navbar")
            <div class="banner-container">

              <div class="banner-content">

              <h1>Best Practice Training Knowledge Pass</h1>
                <p>Best Practice Training was founded with a vision to deliver the highest standard of training. Our Knowledge Pass is beneficial, as it allows you to do as many courses as you want over a time span of 12 months.</p>
                <div class="breadcrums">
                            <ul>
                                <li><a href="">Home</a></li>
                                <img src="{{url('img/master/breadcrum-arrow.svg')}}" alt="breadcrums" class="white">
                                <img src="{{url('img/master/breadcrum-black.svg')}}" alt="breadcrums" class="black">
                                <li><a href="">Knowledge Pass</a></li>
                            </ul>
                     </div>
                   

              </div>
              <div class="banner-info">
                     <img src="{{url('img/knowledge-pass/banner-info.png')}}" alt="banner-info">
                     </div>

            </div>

    
    </section>
<!-- End Banner Section -->

<!-- Start pass-clients section -->
    <section class="flex-container pass-clients">
        <div class="container">
            <div class="pass-container">
                <div class="pass-content">
                        <div class="heading">
                            <h2>Knowledge <span>Pass</span></h2>
                            <p> Save time, maximise budget, train more people</p>
                        </div>
                        <h3>What is a Knowledge Pass?</h3>
                        <p>A Knowledge Pass is a pre-paid training voucher, which offers you to book multiple training courses over a long period of 12 months. It provides you full control of your budget, and your chosen courses will be delivered to you at any location, online, virtually or onsite. You will also receive different discounts depending on how much you spend and what courses you buy
                        </p>
                        <p class="tagline"> Join leading brands in the new & best way to train...</p>  

                        <div class="buttons">
                            <a class="btn-blue  open-popup enquiryJS" data-type="knowledgepass" data-quote="Tell Us More" data-heading="Tell Us More">
                                <img src="{{url('img/knowledge-pass/pass-message.svg')}}" alt="pass-message">
                                Tell Us More
                            </a>
                        </div>
                </div>
                <div class="clients-pass">
                    <span><img src="{{url('img/knowledge-pass/google.svg')}}" alt="google"></span>        
                    <span><img src="{{url('img/knowledge-pass/ucas.svg')}}" alt="ucas"></span>        
                    <span><img src="{{url('img/knowledge-pass/samsung.svg')}}" alt="samsung"></span>       
                    <span><img src="{{url('img/knowledge-pass/mercedes.svg')}}" alt="mercedes"></span>       
                    <span> <img src="{{url('img/knowledge-pass/aston-martin.svg')}}" alt="aston-martin"></span>       
                    <span><img src="{{url('img/knowledge-pass/sky.svg')}}" alt="sky"></span>        
                </div>
            </div>
        </div>
    </section>
<!-- End pass-clients section -->


<!-- Start requirement section -->
<!-- <section class="flex-container requirement">
    <div class="container">
        <div class="requirement-container">
            <div class="heading center-heading white-heading">
                <h2>Calculate your Requirements</h2>
            </div>
            <p class="headline">Not sure what your budget should be? Use our training calculator to figure out how much you need to spend. Simply select how many of each course you think you will need for your staff and we will tell you the estimated cost.</p>
           <div class="chart">
               <div class="chart-title">
                   <h3>
                       Select a course category
                   </h3>
                   <h3># of Delegates</h3>
                   <h3>Total</h3>
               </div>
               <div class="course-list">
                  
                   @foreach($topics  as $topic)
                    <div class="course-content panelJS">
                        <div class="course-name panel-titleJS">
                                <p>
                                    {{-- Business Skills (17 courses (s)) --}}
                                    {{$topic->name ."(" .$topic->courses->count(). " courses (s))" }}
                                </p>
                                <span class="amount" data-amount="0" data-course="0">0</span>
                                <span class="ks2" data-price="0">0</span>
                                <span class="image">
                                <img src="{{url('../img/knowledge-pass/blue-arrow.svg')}}" class="blue" alt="blue-arrow">
                                <img src="{{url('../img/knowledge-pass/white-arrow.svg')}}" class="white" alt="blue-arrow">
                                </span>
                        </div>
                        <div class="description">
                        <div class="course-detail bold">
                                <p>
                                Popular Courses
                                </p> 
                                <p>Delegates</p>  
                                <p>
                                    <span >
                                        Price
                                    </span>
                                    <span>
                                        Total
                                    </span>
                                </p>

                        </div>
                     
                        @foreach($topic->courses as $course)
                        <div class="course-detail  coursedataJS">
                                <p>
                                  {{$course->name}}
                                </p> 
                                <span class="select">
                                <select name="" class="quantityJS">
                                    @for($i = 0;$i<=100;$i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                                </span>
                                <p>
                                    @php
                                        $price = $course->schedule->max('event_price');
                                    @endphp
                                    <span  class="price" data-price="{{$price}}">
                                        £ {{$price}}
                                    </span>
                                    <span   class="total" data-price="0">
                                        £ 0
                                    </span>
                                </p>

                        </div>
                        @endforeach
             
                        </div>

                    </div>
                    @endforeach
               
               </div>
               <div class="summary panel-footerJS">
                   <p>Summary</p>
                   <p ><span class="totalAmountJS">0 </span> course selected</p>
               </div>

           </div>
        </div>
    </div>
</section> -->
<!-- End requirement section -->

<!-- Start spending section -->
    <!-- <section class="flex-contanier spending">
        <div class="container">
            <div class="spending-container">
                <div class="heading center-heading">
                    <h2>Currently Spending <span id="totalPriceJS">£ 0</span></h2>
                </div>
                <div class="spending-list">
                    <div class="item  BronzePassJS">
                        <h3  class="spendMoreJS" data-price="£10,000">Spend £10,000 more to be eligible for Bronze discount of 10%</h3>

                        <ul>
                            <li>
                                <p class="title">Normal price:</p>
                                <p class="prize normalPriceJS">£0</p>
                            </li>
                            <li>
                                <p class="title">Knowledge Pass price:</p>
                                <p class="prize passPriceJS">£0</p>
                            </li>
                            <li>
                                <p class="title">Saving:</p>
                                <p class="prize savingPriceJS">£0</p>
                            </li>
                            <li>
                                <p class="title">Remaining Spend:</p>
                                <p class="prize remainingPriceJS">£0</p>
                            </li>
                        </ul>
                    </div>
                    <div class="item SilverPassJS">
                        <h3  class="spendMoreJS" data-price="£20,000">Spend £20,000 more to be eligible for Silver discount of 25%</h3>

                        <ul>
                            <li>
                                <p class="title">Normal price:</p>
                                <p class="prize normalPriceJS">£0</p>
                            </li>
                            <li>
                                <p class="title">Knowledge Pass price:</p>
                                <p class="prize passPriceJS">£0</p>
                            </li>
                            <li>
                                <p class="title">Saving:</p>
                                <p class="prize savingPriceJS">£0</p>
                            </li>
                            <li>
                                <p class="title">Remaining Spend:</p>
                                <p class="prize remainingPriceJS">£0</p>
                            </li>
                        </ul>
                    </div>
                    <div class="item GoldPassJS">
                        <h3  class="spendMoreJS" data-price="£50000">Spend £50,000 more to be eligible for Gold discount of 50%</h3>

                        <ul>
                            <li>
                                <p class="title">Normal price:</p>
                                <p class="prize normalPriceJS">£0</p>
                            </li>
                            <li>
                                <p class="title">Knowledge Pass price:</p>
                                <p class="prize passPriceJS">£0</p>
                            </li>
                            <li>
                                <p class="title">Saving:</p>
                                <p class="prize savingPriceJS">£0</p>
                            </li>
                            <li>
                                <p class="title">Remaining Spend:</p>
                                <p class="prize remainingPriceJS">£0</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="buttons">
                    <a class="btn-blue open-popup enquiryJS" data-type="knowledgepass" data-quote="Send Us Your Requirement" data-heading="Send Us Your Requirement">
                        <img src="{{url('../img/knowledge-pass/requirements.svg')}}" alt="requirements">
                        Send Us Your Requirement
                    </a>
                </div>
            </div>
        </div>
    </section> -->
<!-- End spending section -->

<!-- Start right section -->
<section class="flex-container why-right">
    <div class="container">
        <div class="right-container">
            <div class="heading center-heading">
                <h2>Why a Knowledge Pass is Right <span>for you?</span></h2>
                <p>Receive these exclusive benefits depending on your chosen budget.</p>
            </div>
            <div class="right-list">
                <div class="right-item">
                    <span>
                        <h3>01</h3>
                        <img src="{{url('img/knowledge-pass/saving.svg')}}" alt="saving">
                    </span>
                    <div class="content">
                        <h2>Saving Money</h2>
                        <p>Buying courses together lets you save money and get the most out of your budget.</p>
                    </div>
                </div>
                <div class="right-item">
                    <span>
                        <h3>02</h3>
                        <img src="{{url('img/knowledge-pass/time.svg')}}" alt="time">
                    </span>
                    <div class="content">
                        <h2>Saving Time</h2>
                        <p>Keep a record with your personalised dashboard of spends and utilisation.</p>
                    </div>
                </div>
                <div class="right-item">
                    <span>
                        <h3>03</h3>
                        <img src="{{url('img/knowledge-pass/budget.svg')}}" alt="budget">
                    </span>
                    <div class="content">
                        <h2>12 Months Annualised Budget</h2>
                        <p>Your courses can be booked at your convenience for over 12 months and can be split between departments.</p>
                    </div>
                </div>
                <div class="right-item">
                    <span>
                        <h3>04</h3>
                        <img src="{{url('img/knowledge-pass/invoicing.svg')}}" alt="invoicing">
                    </span>
                    <div class="content">
                        <h2>Invoicing and Administration Reduced</h2>
                        <p>We'll book and handle everything for you</p>
                    </div>
                </div>
                <div class="right-item">
                    <span>
                        <h3>05</h3>
                        <img src="{{url('img/knowledge-pass/analysis.svg')}}" alt="analysis">
                    </span>
                    <div class="content">
                        <h2>Training Needs Analysis</h2>
                        <p>Your Knowledge Pass includes exclusive access to our Avenoire training needs analysis tool</p>
                    </div>
                </div>
                <div class="right-item">
                    <span>
                        <h3>06</h3>
                        <img src="{{url('img/knowledge-pass/progress.svg')}}" alt="progress">
                    </span>
                    <div class="content">
                        <h2>Track Progress and Feedback</h2>
                        <p>While using Avenoire, your personalised dashboard lets you keep track of spend and utilisation</p>
                    </div>
                </div>
                <div class="right-item">
                    <span>
                        <h3>07</h3>
                        <img src="{{url('img/knowledge-pass/manage.svg')}}" alt="manage">
                    </span>
                    <div class="content">
                        <h2>Easily Manage Training Requests</h2>
                        <p>By using Avenoire, you can easily manage training requests, eliminating the need for collating spreadsheets</p>
                    </div>
                </div>
                <div class="right-item">
                    <span>
                        <h3>08</h3>
                        <img src="{{url('img/knowledge-pass/transparency.svg')}}" alt="transparency">
                    </span>
                    <div class="content">
                        <h2>Full Transparency</h2>
                        <p>Know exactly where you're spending your money</p>
                    </div>
                </div>
                <div class="right-item">
                    <span>
                        <h3>09</h3>
                        <img src="{{url('img/knowledge-pass/alerts.svg')}}" alt="alerts">
                    </span>
                    <div class="content">
                        <h2>Alerts and Notifications</h2>
                        <p>Monthly spend reports, budget utilisation notifications, booking request alerts, feedback report notifications</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End right section -->


<!-- Start benefits section -->
<section class="flex-container benefit">
    <div class="container">
        <div class="benefit-container">
            <div class="heading center-heading white-heading">
                <h2>Knowledge Pass Platform Features</h2>
            </div>
            <div class="benefit-list">
                <div class="benefit-info">
                    <span><img src="{{url('img/knowledge-pass/training.svg')}}" alt="training"></span>
                    <h3>Determining Training Requirements</h3>
                </div>
                <div class="benefit-info">
                    <span><img src="{{url('img/knowledge-pass/managing.svg')}}" alt="managing"></span>
                    <h3>Managing Budgets</h3>
                </div>
                <div class="benefit-info">
                    <span><img src="{{url('img/knowledge-pass/booking.svg')}}" alt="booking"></span>
                    <h3>Booking Training</h3>
                </div>
                <div class="benefit-info">
                    <span><img src="{{url('img/knowledge-pass/tracking.svg')}}" alt="tracking"></span>
                    <h3>Tracking ROIs</h3>
                </div>
                <!-- <div class="benefit-info">  
                    <span><img src="{{url('img/knowledge-pass/training-analysis.svg')}}" alt="training-analyis"></span>
                    <h3>Training Needs Analysis</h3>
                </div>
                <div class="benefit-info">  
                    <span><img src="{{url('img/knowledge-pass/discount-percentages.svg')}}" alt="discount-discounts"></span>
                    <h3>Higher Discount Percentages</h3>
                </div> -->
            </div>
        </div>
    </div>
</section>
<!-- End benefits section -->


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
                    <th><h3>Gold</h3>
                    <span>£50,000+</span>
                    </th>
                    <th><h3>Silver</h3>
                    <span>£20,000+</span>
                    </th>
                    <th><h3>Bronze</h3>
                    <span>£10,000+</span>
                    </th>
                <tr>
                    <td>
                    <p>Dedicated account manager</p>
                    <p>Your direct point of contact for all your training requirements</p>
                    </td>
                    <td><img src="{{url('img/knowledge-pass/tick.svg')}}" alt="tick"></td>
                    <td><img src="{{url('img/knowledge-pass/tick.svg')}}" alt="tick"></td>
                    <td><img src="{{url('img/knowledge-pass/tick.svg')}}" alt="tick"></td>
                </tr>
                <tr>
                    <td>
                    <p>Fixed discount percentages</p>
                    <p>Discount rates will vary based upon investment level</p>
                    </td>
                    <td><img src="{{url('img/knowledge-pass/tick.svg')}}" alt="tick"></td>
                    <td><img src="{{url('img/knowledge-pass/tick.svg')}}" alt="tick"></td>
                    <td><img src="{{url('img/knowledge-pass/tick.svg')}}" alt="tick"></td>
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
                    <td><img src="{{url('img/knowledge-pass/tick.svg')}}" alt="tick"></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                    </td>
                    <td>
                        <div class="buttons">
                            <a class="btn-blue open-popup enquiryJS" data-type="knowledgepass" data-quote="Enquire Now" data-heading="Enquire Now">
                                <img src="{{url('img/knowledge-pass/call-us.svg')}}" alt="call-us">
                                Enquire Now
                            </a>
                        </div>
                    </td>
                    <td><div class="buttons"><a class="btn-blue open-popup enquiryJS" data-type="knowledgepass" data-quote="Enquire Now" data-heading="Enquire Now"><img src="{{url('img/knowledge-pass/call-us.svg')}}" alt="call-us">Enquire Now</a></div></td>
                    <td><div class="buttons"><a class="btn-blue open-popup enquiryJS" data-type="knowledgepass" data-quote="Enquire Now" data-heading="Enquire Now"><img src="{{url('img/knowledge-pass/call-us.svg')}}" alt="call-us">Enquire Now</a></div></td>
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
                    <h2>Your Guide to Booking a Knowledge Pass</h2>
                </div>
                <p>Best Practice Training provides high-quality training that helps you to enhance your skillset. We provide numerous services for our valuable customers. One of them is “Knowledge Pass”. If you aren't sure about the course and date, a Knowledge Pass will be the best option as it enables you to book any course, at any time in the upcoming 12 months. Our learning services are specially designed to keep your goals and requirements at the forefront. For booking your Knowledge Pass, you need to follow the given below steps:
                    </p>
                    <p><strong>Confirm the Amount:</strong> Confirm the budget amount alongside the list of features depending on the budget level.</p>
                    <p><strong>Your Online Platform is Live:</strong> You can now access your platform.</p>
                    <p><strong>Start Booking your Courses:</strong> Book your courses quickly and easily</p>
                    <p><strong>Sign the Booking form:</strong> Once you've confirmed your training requirements, sign the booking form.</p>
                    <p><strong>Your Dedicated Account is Opened:</strong> Knowledge Pass account has been opened by us.</p>
                    <div class="buttons">
                    <a class="btn-blue  open-popup enquiryJS" data-type="knowledgepass" data-quote="Need More Info" data-heading="Need More Info"><img src="{{url('img/knowledge-pass/message.svg')}}" alt="arrow">Need More Info</a>
                    </div>
            </div>
            <div class="booking-list">
                    <div class="booking-info">
                        <span><img src="{{url('img/knowledge-pass/hand.svg')}}" alt="hand"></span>
                        <h3>Confirm the Amount</h3>
                        <p>Through the use of Avenoire you can easily manage training requests, eliminating the need for collating spreadsheets</p>
                    </div>
                    <div class="booking-info">
                        <span><img src="{{url('img/knowledge-pass/platform.svg')}}" alt="platform"></span>
                        <h3>Your Online Platform is Live</h3>
                        <p>Through the use of Avenoire you can easily manage training requests, eliminating the need for collating spreadsheets</p>
                    </div>
                    <div class="booking-info">
                        <span><img src="{{url('img/knowledge-pass/online-booking.svg')}}" alt="online-booking"></span>
                        <h3>Start Booking your Courses</h3>
                        <p>Through the use of Avenoire you can easily manage training requests, eliminating the need for collating spreadsheets</p>
                    </div>
                    <div class="booking-info">
                        <span><img src="{{url('img/knowledge-pass/form.svg')}}" alt="form"></span>
                        <h3>Sign the Booking Form</h3>
                        <p>Through the use of Avenoire you can easily manage training requests, eliminating the need for collating spreadsheets</p>
                    </div>
                    <div class="booking-info">
                        <span><img src="{{url('img/knowledge-pass/data.svg')}}" alt="data"></span>
                        <h3>Your Dedicated Account is Opened</h3>
                        <p>Through the use of Avenoire you can easily manage training requests, eliminating the need for collating spreadsheets</p>
                    </div>
                    <div class="booking-info">
                        <span><img src="{{url('img/knowledge-pass/conversation.svg')}}" alt="conversation"></span>
                        <h3>Caroline, Cornwall Council</h3>
                        <p>Through the use of Avenoire you can easily manage training requests, eliminating the need for collating spreadsheets</p>
                    </div>
            </div>
        </div>
    </div>
</section>
<!-- End knowledge section -->

<!-- Start study section -->
<!-- <section class="flex-container study">
    <div class="container">
        <div class="study-container">
            <div class="heading center-heading">
                <h2>Case <span>Studies</span></h2>
            </div>
            <div class="study-list">
                <div class="study-content">
                    <h2>Consistent Quality</h2>
                    <p>Best Practice Training has a rolling contract of 2-3 years providing training for PRINCE2 to Management candidates each Summer as part of their degree. We deliver PRINCE2 training to those individuals paying for Master degrees, and it shows that we are a respected and established provider. Furthermore, the essential benefits of the PRINCE2 course is an integral part of the Master candidate's training, and we expect that 'The City University of London' would continue to procure more courses year by year. Moreover, Best Practice Training also provides Business Analysis courses and Agile Training courses for this university.</p>
                </div>
                <div class="study-content">
                    <h2>We Take Feedback Seriously</h2>
                    <p>Obtaining feedback from onsite training of project management course indicating that individuals have passed the exam successfully. On the other hand, some didn't get that much clarification and real-life examples and methodologies they can implement in their day-to-day life or in a job role. Having this feedback, we arranged a phone call with a trainer prior to the next planned session and striking the right balance between real-world implementation and exam preparation of the course. This process is used for all upcoming sessions. Since 2014, The University of St. Andrews purchases courses from us due to the quality and positive impact of these project management courses.</p>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- End study section -->



@endsection
@section('footerScripts')
<script>
var symbol = '£';
</script>
<script src="url('scripts/knowledgepass.js')"></script>
@endsection