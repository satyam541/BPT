@extends("layouts.master")

@section("content")

<!-- Start Banner section  -->
<section class="flex-container contact-banner">
            <div class="container">
            @include("layouts.navbar")
                <div class="banner-container">
                    <div class="banner-content">
                        <h1>Contact Us</h1>
                        <p>Choose from over 200 courses which cover all aspects of business and personal training, including Project Management, IT Security, Business and many more. Our courses cater to every training need, from introductory crash courses to advanced and prestigious qualifications, all to the highest standard of quality.</p><div class="breadcrums">
                    <ul>
                    <li><a href="">Home </a></li>
                    <li><a href=""> > Contact </a></li>
                    </ul>
        </div>
                    </div>
                </div>
            </div>
</section>
<!-- End Banner section  -->

<!-- Start contact Section -->
<section class="flex-container contact">
            <div class="container">
                <div class="contact-container">
                    <form class="form" id="contact-us">
                        <div class="heading center-heading">
                            <h2>Get In Touch <span>With Us Today</span> </h2>
                        </div>
                        <div class="form-input">
                            <div class="input-container">
                                <span><img src="{{url('img/contactus/name.svg')}}" alt="name" class="black">
                                <img src="{{url('img/contactus/name-red.svg')}}" alt="name-red" class="red"></span>
                                <input type="text" name="f-name" id="f-name" placeholder="First Name*"
                                    autocomplete="off">
                            </div>
                            <div class="input-container">
                                <span><img src="{{url('img/contactus/email.svg')}}" alt="email" class="black">
                                <img src="{{url('img/contactus/email-red.svg')}}" alt="email-red" class="red"></span>
                                <input type="text" name="email" id="email" placeholder="Email*" autocomplete="off">
                            </div>
                            <div class="input-container">
                                <span><img src="{{url('img/contactus/phone-call.svg')}}" alt="phone-call" class="black">
                                <img src="{{url('img/contactus/phone-callred.svg')}}" alt="phonecall-red" class="red"></span>
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
                                <span><img src="{{url('img/contactus/house.svg')}}" alt="house" class="black">
                                <img src="{{url('img/contactus/house-red.svg')}}" alt="house-red" class="red"></span>
                                <input type="text" name="address" id="adress" placeholder="Address"
                                    autocomplete="off">
                            </div>
                            <div class="input-container">
                                <span><img src="{{url('img/contactus/comment.svg')}}" alt="comment" class="black">
                                <img src="{{url('img/contactus/comment-red.svg')}}" alt="comment-red" class="red"></span>
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
                    <div class="contact-info">
                        <div class="heading center-heading white-heading">
                            <h2>Contact Us</h2>
                        </div>
                        <div class="contact-list">
                            <div class="item">
                                    <span>  
                                    <img src="{{url('img/contactus/email-blue.svg')}}" alt="email-blue">
                                </span>
                                <div class="item-info">
                                    <h3>Email:</h3>
                                    <a href="mailTo:info@bestpratice.co.uk">info@bestpratice.co.uk</a>

                                </div>
                            </div>
                            <div class="item">
                                    <span>
                                    <img src="{{url('img/contactus/call-blue.svg')}}" alt="call-blue">
                                    </span>
                                    <div class="item-info">
                                        <h3>Contact:</h3>
                                        <a href="tel:02380001008">023 8000 1008</a>
                                    </div>
                            </div>
                            <div class="item">
                                    <span>
                                        <img src="{{url('img/contactus/address.svg')}}" alt="address">
                                    </span>
                                    <div class="item-info">
                                        <h3>Address:</h3>
                                        <p>Wessex House, Upper 
                                            Market Street, Eastleigh, 
                                            Hampshire, SO50 9FD.</p>
                                    </div>
                            </div>
                        </div>
                            <div class="social">
                                <p>Sign Up With Social Platform</p>
                                <div class="media-list">
                                    <a href="javascript:void"><img src="{{url('img/contactus/google-plus.svg')}}" alt="google-plus"></a>
                                    <a href="javascript:void"><img src="{{url('img/contactus/twitter.svg')}}" alt="twitter"></a>
                                    <a href="javascript:void"><img src="{{url('img/contactus/instagram.svg')}}" alt="instagram"></a>
                                    <a href="javascript:void"><img src="{{url('img/contactus/linkedin.svg')}}" alt="linkedin"></a>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
</section>
<!-- End contact Section --> 

<!-- Start informaton section -->
<section class="flex-container information">
            <div class="container">
                <div class="information-container">
                    <div class="heading center-heading">
                        <h2>Get More Information</h2>
                    </div>
                    <div class="info-list">
                        <div class="info-content">
                            <span><img src="{{url('img/contactus/chat.svg')}}" alt="talk"></span>
                            <div class="info-text">
                                <h3>Talk to Us</h3>
                                <p>Choose from over 200 courses which cover all aspects of business and personal training, including Project Management, IT Security,</p>
                            </div>
                        </div>
                        <div class="info-content">
                            <span><img src="{{url('img/contactus/enquire-now.svg')}}" alt="team"></span>
                            <div class="info-text">
                                <h3>Enquire Now</h3>
                                <p>Choose from over 200 courses which cover all aspects of business and personal training, including Project Management,.</p>
                            </div>
                        </div>
                        <div class="info-content">
                            <span><img src="{{url('img/contactus/chat-support.svg')}}" alt="support"></span>
                            <div class="info-text">
                                <h3>Talk to Us</h3>
                                <p>Choose from over 200 courses which cover all aspects of business and personal training, including Project Management, IT Security,</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</section>
<!-- End information section -->

<!-- Start locate section -->
<section class="flex-container locate">
    <div class="container">
        <div class="locate-container">
            <div class="heading center-heading">
                <h2>Where to <span>Reach Us</span></h2>
                <p>Locate Our Office Destination On Google Map</p>
            </div>
            <div class="map">
            <img src="{{url('img/contactus/map.png')}}" alt="map">
            </div>
        </div>
    </div>
</section>
<!-- End locate section -->

<!-- Start FAQ Section -->
<section class="flex-container faq">
            <div class="container">
                <div class="faq-container">
                    <div class="faq-content">
                        <div class="heading center-heading">
                            <h2>Frequently Asked <span>Questions</span></h2>
                        </div>
                        <div class="faq-list">
                            <div class="faq-item">
                                <div class="ques">
                                    <h3>What is Microsoft Azure?</h3>
                                    <span>
                                    <img src="{{url('img/contactus/arrow.svg')}}" alt="arrow">
                                    </span>
                                </div>
                                <div class="ans">
                                    <p>Microsoft Azure is a cloud computing service developed by Microsoft, allowing users to build, manage, and deploy applications on a massive network using their own choice of tools and frameworks.</p>
                                </div>
                            </div>
                            <div class="faq-item">
                                <div class="ques">
                                    <h3>What is Microsoft Azure?</h3>
                                    <span>
                                    <img src="{{url('img/contactus/arrow.svg')}}" alt="arrow">
                                    </span>
                                </div>
                                <div class="ans">
                                    <p>Microsoft Azure is a cloud computing service developed by Microsoft, allowing users to build, manage, and deploy applications on a massive network using their own choice of tools and frameworks.</p>
                                </div>
                            </div>
                            <div class="faq-item">
                                <div class="ques">
                                    <h3>What is Microsoft Azure?</h3>
                                    <span>
                                    <img src="{{url('img/contactus/arrow.svg')}}" alt="arrow">
                                    </span>
                                </div>
                                <div class="ans">
                                    <p>Microsoft Azure is a cloud computing service developed by Microsoft, allowing users to build, manage, and deploy applications on a massive network using their own choice of tools and frameworks.</p>
                                </div>
                            </div>
                            <div class="faq-item">
                                <div class="ques">
                                    <h3>What is Microsoft Azure?</h3>
                                    <span>
                                    <img src="{{url('img/contactus/arrow.svg')}}" alt="arrow">
                                    </span>
                                </div>
                                <div class="ans">
                                    <p>Microsoft Azure is a cloud computing service developed by Microsoft, allowing users to build, manage, and deploy applications on a massive network using their own choice of tools and frameworks.</p>
                                </div>
                            </div>
                            <div class="faq-item">
                                <div class="ques">
                                    <h3>What is Microsoft Azure?</h3>
                                    <span>
                                    <img src="{{url('img/contactus/arrow.svg')}}" alt="arrow">
                                    </span>
                                </div>
                                <div class="ans">
                                    <p>Microsoft Azure is a cloud computing service developed by Microsoft, allowing users to build, manage, and deploy applications on a massive network using their own choice of tools and frameworks.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="experience">
                        <div class="experience-info">
                            <h2>Share your Experience With Us</h2>
                        </div>
                        <div class="platforms">
                            <a href="javascript:void"><img src="{{url('img/contactus/linkedin.svg')}}" alt="linkedin"></a>
                            <a href="javascript:void"><img src="{{url('img/contactus/instagram.svg')}}" alt="instagram"></a>
                            <a href="javascript:void"><img src="{{url('img/contactus/twitter.svg')}}" alt="twitter"></a>
                            <a href="javascript:void"><img src="{{url('img/contactus/google-plus.svg')}}" alt="google-plus"></a>
                        </div>
                    </div>
                </div>
            </div>
</section>
<!-- End FAQ Section -->


@endsection