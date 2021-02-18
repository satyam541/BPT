@extends("layouts.master")
@section("content")

<!-- Start Banner Section -->
<section class="flex-container onsite-banner">
    <div class="container">
        @include("layouts.navbar")
        <div class="banner-container">
            <h1>Best Practice Onsite Training </h1>
            <p>Onsite programmes are our speciality. Any of our courses can be delivered onsite at your offices or a venue of your choice. Best Practice training helps you to take flexible and cost-effective training at a location of your choice.  It helps in eliminating the costs of travel, hotel, venue, etc. and other expenses for the delegates.  </p>
            <div class="breadcrums">
                            <ul>
                                <li><a href="">Home</a></li>
                                <li><img src="{{url('img/master/breadcrum-arrow.svg')}}" alt="arrow"></li>
                                <li><a href="">Contact</a></li>
                            </ul>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Section -->

<!-- Start Banner Section -->
<section class="flex-container training">
    <div class="container">
        <div class="training-container">
            <div class="training-info">
                <div class="heading center-heading">
                    <h2>Let's Bring the Training <span>to You !</span></h2>
                </div>
                <p>Best Practice training helps you to take flexible and cost-effective training at a location of your choice. From a single team or department to everyone in the organisation, we will provide a consistent learning experience with real-world and mission-specific examples for ensuring project’s success. It helps in eliminating the costs of travel, hotel, venue, etc. and other expenses for the delegates. Our onsite training program ensures a comfortable learning environment at your workplace. Fill the following form and we will get back to you.Best Practice training helps you to take flexible and cost-effective training at a location of your choice. From a single team or department to everyone in the organisation, we will provide a consistent learning experience with real-world and mission-specific examples for ensuring project’s success. It helps in eliminating the costs of travel, hotel, venue, etc. and other expenses for the
                and other expenses for the  </p>
                <div class="buttons">
                <div class="btn-blue"><img src="{{url('img/onsite/information.svg')}}" alt="information">Need More information</div>
                    </div>
            </div>
            <div class="delegate">
                <div class="heading center-heading">
                    <h2>Number of Delegates Choose Onsite Training</h2>
                </div>
                <div class="training-map">
                <img src="{{url('img/onsite/training-map.png')}}" alt="training-map">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Section -->

<!-- Start contact Section -->
<section class="flex-container doorstep">
            <div class="container">
                <div class="doorstep-container">
                    <form class="form" id="contact-us">
                        <div class="heading center-heading white-heading">
                            <h2>World Class Training At Your Doorstep</h2>
                        </div>
                        <div class="form-input">
                            <div class="input-container">
                                <span><img src="{{url('img/onsite/name.svg')}}" alt="name" class="black">
                                <img src="{{url('img/onsite/name-red.svg')}}" alt="name-red" class="red"></span>
                                <input type="text" name="f-name" id="f-name" placeholder="First Name*"
                                    autocomplete="off">
                            </div>
                            <div class="input-container">
                                <span><img src="{{url('img/onsite/email.svg')}}" alt="email" class="black">
                                <img src="{{url('img/onsite/email-red.svg')}}" alt="email-red" class="red"></span>
                                <input type="text" name="email" id="email" placeholder="Email*" autocomplete="off">
                            </div>
                            <div class="input-container">
                                <span><img src="{{url('img/onsite/phone-call.svg')}}" alt="phone-call" class="black">
                                <img src="{{url('img/onsite/phone-callred.svg')}}" alt="phonecall-red" class="red"></span>
                                <!-- <input type="number" name="phone" id="phone" placeholder="Phone Number*" autocomplete="off"> -->
                                <div class="phonecode-field">
                                    <select class="country-code"></select>
                                    <span class="prefix"></span>
                                    <input type="number" class="telephone" placeholder="Phone Number*">
                                    <div style="z-index:-1;width:0;height:0;pointer-events: none;">
                                        <input type="text" name="Phone" class="phonenumber">
                                    </div>
                                </div>
                            </div>
                            <div class="input-container">
                                <span><img src="{{url('img/onsite/house.svg')}}" alt="house" class="black">
                                <img src="{{url('img/onsite/house-red.svg')}}" alt="house-red" class="red"></span>
                                <input type="text" name="address" id="adress" placeholder="Address"
                                    autocomplete="off">
                            </div>
                            <div class="input-container">
                                <span><img src="{{url('img/onsite/comment.svg')}}" alt="comment" class="black">
                                <img src="{{url('img/onsite/comment-red.svg')}}" alt="comment-red" class="red"></span>
                                <textarea placeholder="Message (Optional)" id="message" name="message"></textarea>
                            </div>
                        </div>
                        <div class="form-consent">
                            <p>The information you provide shall be processed by Best Practice Training Limited – a professional training organisation. Your data shall be used by a member of staff to contact you regarding your enquiry.
                            </p>
                        </div>
                        <div class="form-consent">
                            <p>Please click <a>here</a> for privacy policy. </p>
                        </div>
                        <div class="form-consent">
                            <input type="checkbox" id="checkConsent">
                            <label for="checkConsent">By submitting this enquiry I agree to be contacted in the most suitable manner (by phone or email) in order to respond to my enquiry.</label>
                        </div>
                        <div class="consent-error" style="display: none;">
                            <p>We cannot process your enquiry without contacting you, please tick to confirm you
                                consent to us contacting you about your enquiry</p>
                        </div>
                        <div class="form-consent">
                            <input type="checkbox" name="marketing_consent" id="allowconsent">
                            <label for="allowconsent">Click here to sign up to our email marketing, offers and discounts</label>
                        </div>
                        <div class="buttons">
                            <button class="btn-blue">
                                Submit
                            </button>
                        </div>
                    </form>
                    <div class="info">
                        <div class="heading">
                            <h2>Information at Your
                                <span>Fingertips</span></h2>
                        </div>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsum dicta numquam quibusdam alias sunt expedita voluptates optio, aperiam commodi quis, suscipit, quae ut et enim. Officia quaerat perferendis quis aliquam!</p>
                        <div class="info-list">
                            <div class="item">
                                    <span>  
                                    <img src="{{url('img/onsite/company.svg')}}" alt="company">
                                </span>
                                <div class="item-info">
                                    <h3>Explore Our Training Courses</h3>
                                    <p>See  what we have to offer. </p>

                                </div>
                            </div>
                            <div class="item">
                                    <span>
                                    <img src="{{url('img/onsite/practice.svg')}}" alt="call-blue">
                                    </span>
                                    <div class="item-info">
                                        <h3>Business Training Works</h3>
                                        <p>Learn about us.</p>
                                    </div>
                            </div>
                            <div class="item">
                                    <span>
                                        <img src="{{url('img/onsite/email.svg')}}" alt="email">
                                    </span>
                                    <div class="item-info">
                                        <h3>Start a Conversation</h3>
                                        <p>Contact us to connect.</p>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</section>
<!-- End contact Section --> 

<!-- Start choose section -->
<section class="flex-container choose">
    <div class="container">
        <div class="choose-container">
            <div class="heading center-heading">
                <h2>Why Choose <span>Onsite Training</span></h2>
            </div>
            <div class="choose-list">
                <div class="choose-item">
                    <span><img src="{{url('img/onsite/budget.svg')}}" alt="budget"></span>
                    <p>Maximise your training budget</p>
                </div>
                <div class="choose-item">
                    <span><img src="{{url('img/onsite/solid.svg')}}" alt="solid"></span>
                    <p>Tailored learning experience</p>
                </div>
                <div class="choose-item">
                    <span><img src="{{url('img/onsite/monitor.svg')}}" alt="monitor"></span>
                    <p>Monitor your employees' progress</p>
                </div>
                <div class="choose-item">
                    <span><img src="{{url('img/onsite/group.svg')}}" alt="group"></span>
                    <p>Team building opportunity</p>
                </div>
                <div class="choose-item">
                    <span><img src="{{url('img/onsite/save-money.svg')}}" alt="save-money"></span>
                    <p>Save on travel costs</p>
                </div>
                <div class="choose-item">
                    <span><img src="{{url('img/onsite/elastic.svg')}}" alt="elastic"></span>
                    <p>Maximum flexibility</p>
                </div>
                <div class="choose-item">
                    <span><img src="{{url('img/onsite/page.svg')}}" alt="page"></span>
                    <p>Ensure employees gain qualifications</p>
                </div>
                <div class="choose-item">
                    <span><img src="{{url('img/onsite/statistics.svg')}}" alt="statistics"></span>
                    <p>Make your business more efficient</p>
                </div>
                
                
            </div>
        </div>
    </div>
</section>
<!-- End choose section -->

<!-- Start solution section -->
<section class=" flex-container solution">
    <div class="container">
        <div class="solution-container">
            <div class="heading center-heading">
                <h2>Our High-Quality Tailor Made <span>Solutions Include</span></h2>
            </div>
            <div class="solution-list">
                <div class="solution-item">
                    <span><img src="{{url('img/onsite/customize.svg')}}" alt="customize"></span>
                    <h3>Customised Courses</h3>
                </div>
                <div class="solution-item">
                    <span><img src="{{url('img/onsite/location.svg')}}" alt="location"></span>
                    <h3>Flexible Location</h3>
                </div>
                <div class="solution-item">
                    <span><img src="{{url('img/onsite/presentation.svg')}}" alt="presentation"></span>
                    <h3>Experienced Trainer</h3>
                </div>
                <div class="solution-item">
                    <span><img src="{{url('img/onsite/test.svg')}}" alt="test"></span>
                    <h3>Exam Included</h3>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End solution section -->

@endsection