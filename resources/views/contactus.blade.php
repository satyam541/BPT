@extends("layouts.master")

@section("content")

<!-- Start Banner section  -->
<section class="flex-container banner">
            <div class="container">
                <div class="banner-container">
                    <div class="banner-content">
                        <h1>Contact Us</h1>
                        <p>Choose from over 200 courses which cover all aspects of business and personal training, including Project Management, IT Security, Business and many more. Our courses cater to every training need, from introductory crash courses to advanced and prestigious qualifications, all to the highest standard of quality.</p>
                    </div>
                </div>
            </div>
</section>
<!-- End Banner section  -->

<!-- Start Footer Section -->
<section class="flex-container contact" id="contact">
            <div class="container">
                <div class="contact-container">
                    <form class="form" id="prince2-other">
                        <div class="heading center-heading">
                            <h2>Get In Touch <span>With us Today</span> </h2>
                        </div>
                        <div class="form-input">
                            <div class="input-container">
                                <span><img src="{{url('img/contactus/name')}}" alt="name" class="black">
                                <img src="{{url('img/contactus/name-red')}}" alt="name-red" class="red"></span>
                                <input type="text" name="f-name" id="f-name" placeholder="First Name*"
                                    autocomplete="off">
                            </div>
                            <div class="input-container">
                                <span><img src="{{url('img/contactus/email')}}" alt="email" class="black">
                                <img src="{{url('img/contactus/email-red')}}" alt="email-red" class="red"></span>
                                <input type="text" name="email" id="email" placeholder="Email*" autocomplete="off">
                            </div>
                            <div class="input-container">
                                <span><img src="{{url('img/contactus/phone-call')}}" alt="phone-call" class="black">
                                <img src="{{url('img/contactus/phone-callred')}}" alt="phonecall-red" class="red"></span>
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
                                <span><img src="{{url('img/contactus/house')}}" alt="house" class="black">
                                <img src="{{url('img/contactus/house-red')}}" alt="house-red" class="red"></span>
                                <input type="text" name="address" id="adress" placeholder="Address"
                                    autocomplete="off">
                            </div>
                            <div class="input-container">
                                <span><img src="{{url('img/contactus/comment')}}" alt="comment" class="black">
                                <img src="{{url('img/contactus/comment-red')}}" alt="comment-red" class="red"></span>
                                <textarea placeholder="Message (Optional)" id="message" name="message"></textarea>
                            </div>
                        </div>
                        <div class="form-consent">
                            <p>The information you provide shall be processed by Pearce mayfield – a professional training organisation. Your data shall be used by a member of staff to contact you regarding your enquiry.
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
                        <p>If you have more questions or need any assistance while booking your PRINCE2® training, you can quickly access our 24/7 support using Email, Phone Number, or by filling this form.</p>
                        <div class="contact-list">
                            <div class="item">
                                    <span>  
                                    <img src="{{url('img/contactus/email-blue')}}" alt="email-blue">
                                </span>
                                <div class="item-info">
                                    <h3>Email:</h3>
                                    <a href="mailTo:info@prince2training.co.uk">info@prince2training.co.uk</a>

                                </div>
                            </div>
                            <div class="item">
                                    <span>
                                    <img src="{{url('img/contactus/call-blue')}}" alt="call-blue">
                                    </span>
                                    <div class="item-info">
                                        <h3>Contact:</h3>
                                        <a href="tel:01344 203999">01344 203999</a>
                                    </div>
                            </div>
                            <div class="item">
                                    <span>
                                        <img src="{{url('img/contactus/address')}}" alt="address">
                                    </span>
                                    <div class="item-info">
                                        <h3>Address:</h3>
                                        <p>Reflex, Cain Road, Bracknell, Berkshire RG12 1HL, United Kingdom</p>
                                    </div>
                            </div>
                            <div class="social">
                                <p>Sign Up With Social Platform</p>
                                <div class="media-list">
                                    <span><img src="{{url('img/contactus/google-plus')}}" alt="google-plus"></span>
                                    <span><img src="{{url('img/contactus/twitter')}}" alt="twitter"></span>
                                    <span><img src="{{url('img/contactus/instagram')}}" alt="instagram"></span>
                                    <span><img src="{{url('img/contactus/linkedin')}}" alt="linkedin"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</section>
<!-- End Footer Section --> 

<!-- Start informaton section -->
<section class="flex-container information">
            <div class="container">
                <div class="information-container">
                    <div class="heading center-heading">
                        <h2>Get More information</h2>
                    </div>
                    <div class="info-list">
                        <div class="info-content">
                            <img src="{{url('img/contactus/talk')}}" alt="talk">
                            <div class="info-text">
                                <h3>Talk to Us</h3>
                                <p>Choose from over 200 courses which cover all aspects of business and personal training, including Project Management, IT Security, Business and many more. Our courses cater to every training need, from introductory crash courses to advanced and prestigious qualifications, all to the highest standard of quality.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</section>
<!-- End footer section -->

@endsection