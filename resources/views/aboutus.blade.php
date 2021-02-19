@extends("layouts.master")

@section("content")

<!-- Start Banner section  -->
<section class="flex-container about-banner">
    <div class="container">
        @include("layouts.navbar")
        <div class="banner-container">
            <div class="banner-content">
                <h1>About Us</h1>
                <p>As a leading training provider in the industry, our main objectives are to deliver the highest
                    standard of training to you.As a leading training provider in the industry, our main objectives are
                    to deliver the highest standard of training to you.</p>
                <div class="breadcrums">
                    <div class="breadcrums">
                        <ul>
                            <li><a href="">Home</a></li>
                            <li><img src="{{url('img/master/breadcrum-arrow.svg')}}" alt="arrow"></li>
                            <li><a href="">About-Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Banner section  -->

<!-- Start aboutus section -->
<section class="flex-container about-us">
    <div class="container">
        <div class="about-container">
            <div class="about-content">
                <div class="about-item">
                    <div class="heading">
                        <h2>Who We <span> Are</span></h2>
                    </div>
                    <p>Best Practice Training is an independent provider of project management and IT service
                        management training courses. Since our formation in 2011, we have successfully delivered
                        training courses to both the public and private sectors throughout the UK and
                        internationally.</p>
                </div>
                <div class="about-item">
                    <div class="heading">
                        <h2>
                            What We <span> Aim To Do</span>
                        </h2>
                    </div>
                    <p>We aim to have enduring relationships with our customers. Best Practice Training provides
                        authorised certification from highly reputed certification bodies. What matter to us is
                        teaching to bring real and long-lasting benefit to your work. Our main objectives is to
                        provide the highest quality of training so that you can enhance your career in your
                        industry.</p>
                </div>
                <div class="about-item">
                    <div class="heading">
                        <h2>What Do <span> We Provide?</span> </h2>
                    </div>
                    <p>Best practice Training provides you with a large variety of professional courses to help
                        you develop your skills. We will help you to implement learned skills effectively in
                        your business. The variety of courses that we deliver range from Project Management,
                        Technical IT, Systems Architecture, Business Skills, Cyber Security and much more.
                    </p>
                </div>
            </div>
            <div class="about-image">
                <div class="values-content">
                <div class="heading">
                    <h2>Our <span>Values</span> </h2>
                </div>
                <p>Our main goal is to make a positive difference to your organisation. What you learn
                    should have a direct, lasting impact on your future at a business and personal level.
                    How do we achieve this?</p>
                </div>
                <span class="values-info">
                    <img src="{{url('img/aboutus/values-info.png')}}" alt="values-info">
                </span>
            </div>
        </div>
    </div>
</section>
<!-- End aboutuss section -->

<!-- Start difference section -->
<section class="flex-container difference">
    <div class="container">
        <div class="difference-container">
            <div class="difference-content">
            <div class="heading center-heading">
                <h2>What Makes Us Different?</h2>
            </div>
            <p>We pride ourselves on delivering training courses of the highest quality. We use interactive training
                    materials to ensure a hands-on approach for all delegates. Courses have typically less than ten
                    delegates to ensure that all delegates have the chance to participate and ask questions thereby
                    maximising their learning experience.</p>
            </div>
 
            <div class="difference-list">
                <div class="count">
                    <div class="circle">
                        <svg class="progress-ring first" width="95" height="95">
                            <circle class="circle-default" fill="white" r="43" cx="47.5" cy="47.5" />
                            <circle class="progress-ring__circle" fill="transparent" r="43" cx="47.5" cy="47.5" />
                        </svg>
                    </div>
                    <p class="txt-name">Industry average for pass rates for PRINCE2 Courses</p>
                </div>
                <div class="count">
                    <div class="circle">
                        <svg class="progress-ring second" width="95" height="95">
                            <circle class="circle-default" fill="white" r="43" cx="47.5" cy="47.5" />
                            <circle class="progress-ring__circle" fill="transparent" r="43" cx="47.5" cy="47.5" />
                        </svg>
                    </div>
                    <p class="txt-name">Industry standard for Agile Training Pass Rates </p>
                </div>
                <div class="count">
                    <div class="circle">
                        <svg class="progress-ring third" width="95" height="95">
                            <circle class="circle-default" fill="white" r="43" cx="47.5" cy="47.5" />
                            <circle class="progress-ring__circle" fill="transparent" r="43" cx="47.5" cy="47.5" />
                        </svg>
                    </div>
                    <p class="txt-name"> ITIL Foundation average pass rate in the training Industry.</p>
                </div>
                <div class="count">
                    <div class="circle">
                        <svg class="progress-ring fourth" width="95" height="95">
                            <circle class="circle-default" fill="white" r="43" cx="47.5" cy="47.5" />
                            <circle class="progress-ring__circle" fill="transparent" r="43" cx="47.5" cy="47.5" />
                        </svg>
                    </div>
                    <p class="txt-name">Lean Six Sigma training average pass rates in the industry.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End difference section -->


<!-- Start testimonial section -->
<section class="flex-direction reviews">
    <div class="container">
        <div class="testimonial-container">
            <div class="heading center-heading">
                <h2>What Our Clients Say <span> About Us</span></h2>
            </div>
            <div class="testimonial-content owl-carousel">
                <div class="testimonial-item">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                        of type and scrambled it to maLorem Ipsum is simply dummy text of the printing and typesetting
                        industry. Lorem Ipsum has cke a type specimen bookunknown printer took a galley of type and
                        scramble</p>
                    <span>
                        <img src="{{url('img/aboutus/client.svg')}}" alt="clients" />
                    </span>
                    <h3>Harsul Hisham</h3>
                    <p class="designation">WEB DESIGNER</p>
                    <img src="{{url('img/aboutus/stars.svg')}}" alt="stars" class="stars">
                </div>
                <div class="testimonial-item">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                        of type and scrambled it to maLorem Ipsum is simply dummy text of the printing and typesetting
                        industry. Lorem Ipsum has cke a type specimen bookunknown printer took a galley of type and
                        scramble</p>
                    <span>
                        <img src="{{url('img/aboutus/client.svg')}}" alt="clients">
                    </span>
                    <h3>Harsul Hisham</h3>
                    <p class="designation">WEB DESIGNER</p>
                    <img src="{{url('img/aboutus/stars.svg')}}" alt="stars" class="stars">
                </div>
                <div class="testimonial-item">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                        of type and scrambled it to maLorem Ipsum is simply dummy text of the printing and typesetting
                        industry. Lorem Ipsum has cke a type specimen bookunknown printer took a galley of type and
                        scramble</p>
                    <span>
                        <img src="{{url('img/aboutus/client.svg')}}" alt="clients">
                    </span>
                    <h3>Harsul Hisham</h3>
                    <p class="designation">WEB DESIGNER</p>
                    <img src="{{url('img/aboutus/stars.svg')}}" alt="stars" class="stars">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End testimonial section -->

<!-- Start contact-from Section -->
<section class="flex-container contact-form">
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
                        <input type="text" name="f-name" id="f-name" placeholder="First Name*" autocomplete="off">
                    </div>
                    <div class="input-container">
                        <span><img src="{{url('img/contactus/email.svg')}}" alt="email" class="black">
                            <img src="{{url('img/contactus/email-red.svg')}}" alt="email-red" class="red"></span>
                        <input type="text" name="email" id="email" placeholder="Email*" autocomplete="off">
                    </div>
                    <div class="input-container">
                        <span><img src="{{url('img/contactus/phone-call.svg')}}" alt="phone-call" class="black">
                            <img src="{{url('img/contactus/phone-callred.svg')}}" alt="phonecall-red"
                                class="red"></span>
                        <!-- <input type="number" name="phone" id="phone" placeholder="Phone Number*" autocomplete="off"> -->
                        <div class="phonecode-field field-black">
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
                        <input type="text" name="address" id="adress" placeholder="Address" autocomplete="off">
                    </div>
                    <div class="input-container">
                        <span><img src="{{url('img/contactus/comment.svg')}}" alt="comment" class="black">
                            <img src="{{url('img/contactus/comment-red.svg')}}" alt="comment-red" class="red"></span>
                        <textarea placeholder="Message (Optional)" id="message" name="message"></textarea>
                    </div>
                </div>
                <div class="form-consent">
                    <p>The information you provide shall be processed by Best Practice Training Limited – a professional
                        training organisation. Your data shall be used by a member of staff to contact you regarding
                        your enquiry.
                    </p>
                </div>
                <div class="form-consent">
                    <p>Please click <a>here</a> for privacy policy. </p>
                </div>
                <div class="form-consent">
                    <input type="checkbox" id="checkConsent">
                    <label for="checkConsent">By submitting this enquiry I agree to be contacted in the most suitable
                        manner (by phone or email) in order to respond to my enquiry.</label>
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
                <div class="heading white-heading">
                    <h2>Contact Us</h2>
                    <p>If you have some questions, please feel free to contact us.</p>
                </div>
                <div class="contact-list">
                    <div class="item">
                        <span>
                            <img src="{{url('img/aboutus/about-mail.svg')}}" alt="about-email">
                        </span>
                        <div class="item-info">
                            <h3>Email:</h3>
                            <a href="mailTo:info@bestpratice.co.uk">info@bestpratice.co.uk</a>

                        </div>
                    </div>
                    <div class="item">
                        <span>
                            <img src="{{url('img/aboutus/about-call.svg')}}" alt="about-call">
                        </span>
                        <div class="item-info">
                            <h3>Phone:</h3>
                            <a href="tel:02380001008">023 8000 1008</a>
                        </div>
                    </div>
                    <div class="item">
                        <span>
                            <img src="{{url('img/aboutus/about-address.svg')}}" alt="aboutaddress">
                        </span>
                        <div class="item-info">
                            <h3>Address:</h3>
                            <p>Wessex House, Upper
                                Market Street, Eastleigh,
                                Hampshire, SO50 9FD.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End contact-from Section -->

<!-- Start skills section -->
<section class="flex-container skills">
    <div class="container">
        <div class="skills-container">
            <div class="heading center-heading">
                <h2>Why Choose Best Practice Training for <span>Your Tech Skills Needs?</span></h2>
            </div>
            <div class="skills-list">
                <div class="skills-item">
                    <span>
                        <img src="{{url('img/aboutus/skills-verification.svg')}}" alt="varification">
                    </span>
                    <h3>Comprehensive curriculum, high pass rates</h3>
                    <p>Whether you're looking for an individual course or a full certification programme, we offer a
                        complete range of business and IT training, including official </p>
                </div>
                <div class="skills-item">
                    <span>
                        <img src="{{url('img/aboutus/skills-lesson.svg')}}" alt="lesson">
                    </span>
                    <h3>Virtual training and UK-wide learning centres</h3>
                    <p>We offer top-quality virtual classroom and online courses so you can train wherever you are, yet
                        get the best learning experience.We also have 20 learning centres </p>
                </div>
                <div class="skills-item">
                    <span>
                        <img src="{{url('img/aboutus/skills-team.svg')}}" alt="teams">
                    </span>
                    <h3>Award-winning training teams</h3>
                    <p>Our learning professionals are among the best in the world, each with extensive experience and a
                        proven track record of delivering the skills that transform performance.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End skills section -->

<!-- Start Clients Section -->
<section class="flex-container clients">
    <div class="container">
        <div class="heading center-heading">
            <h2>Our Clients</h2>
            <span class="overlay"></span>
        </div>
        <div class="clients-container">
            <img src="{{url('img/aboutus/nhs.svg')}}" alt="nhs">
            <img src="{{url('img/aboutus/imperial.svg')}}" alt="imperial">
            <img src="{{url('img/aboutus/hdh.svg')}}" alt="hdh">
            <img src="{{url('img/aboutus/banco.svg')}}" alt="banco">
            <img src="{{url('img/aboutus/deloitte.svg')}}" alt="deloitte">
            <img src="{{url('img/aboutus/cardiff.svg')}}" alt="cardiff">
        </div>
    </div>

</section>
<!-- End CLients Section -->

@endsection
