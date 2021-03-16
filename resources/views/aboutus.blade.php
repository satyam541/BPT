@extends("layouts.master")

@section("content")

<!-- Start Banner section  -->
<section class="flex-container banner about-banner">
    <div class="container">
        @include("layouts.navbar")
        <div class="banner-container">
            <div class="banner-content">
                <h1>{!!$pageDetail->banner['header']->heading!!}</h1>
                <p>{!!$pageDetail->banner['header']->content!!}</p>
                    <div class="breadcrums">
                        <ul>
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li><img src="{{url('img/master/breadcrum-arrow.svg')}}" alt="arrow" class="white">
                            <img src="{{url('img/master/breadcrum-black.svg')}}" alt="arrow"class="black"></li>
                            <li><a href="">AboutUs</a></li>
                        </ul>
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
                @foreach ($pageDetail->intro as $item)
                <div class="about-item">
                    <div class="heading center-heading">
                        {{-- <h2>Who We <span> Are</span></h2> --}}
                        <h2>{!!$item->heading!!}</h2>
                    </div>
                    <p>{!!$item->content!!}</p>
                </div>
                
                @endforeach
                
            </div>
            <div class="about-image">
                <div class="values-content">
                <div class="heading center-heading">
                    {{-- <h2>Our <span>Values</span> </h2> --}}
                    <h2>{!!$pageDetail->intro_right['our_values']->heading!!}</h2>
                </div>
                <p>{!!$pageDetail->intro_right['our_values']->content!!}</p>
                </div>
                <span class="values-info">
                    <img src="{{url($pageDetail->intro_right['our_values']->getImagePath())}}" alt="{{$pageDetail->intro_right['our_values']->image_alt}}">
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
                <h2>{!!$pageDetail->overlay['what_makes_us_different']->heading!!}</h2>
            </div>
            <p>{!!$pageDetail->overlay['what_makes_us_different']->content!!}</p>
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
                {{-- <h2>What Our Clients Say <span> About Us</span></h2> --}}
                <h2>{!!$pageDetail->testimonials['heading']->heading!!}</h2>
            </div>
            <div class="testimonial-content owl-carousel">
                @foreach ($testimonials as $testimonial)
                <div class="testimonial-item">
                    <p>{!!$testimonial->content!!}</p>
                    <span>
                        <img src="{{$testimonial->getImagePath()}}" alt="clients" />
                    </span>
                    <h3>{!!$testimonial->author!!}</h3>
                    <!-- <p class="designation">{!!$testimonial->designation!!}</p> -->
                    <img src="{{url('img/aboutus/stars.svg')}}" alt="stars" class="stars">
                </div>
                @endforeach
                
            </div>
        </div>
    </div>
</section>
<!-- End testimonial section -->

<!-- Start contact-from Section -->
<section class="flex-container contact-form">
    <div class="container">
        <div class="contact-container">
            <form onsubmit="submitEnquiry(this)" class="form" id="contact-us">
                @csrf
                <input type="hidden" name="type" value="other"> 
                <input type="hidden" name="Url" id="url" value="{{Request::url()}}">
                <div class="heading center-heading">
                    <h2>Get In Touch <span>With Us Today</span> </h2>
                </div>
                <div class="form-input">
                    <div class="input-container">
                        <span><img src="{{url('img/contactus/name.svg')}}" alt="name" class="black">
                            <img src="{{url('img/contactus/name-red.svg')}}" alt="name-red" class="red"></span>
                        <input type="text" name="name" id="f-name" placeholder="First Name*" autocomplete="off">

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
                                <input type="text" name="phone" class="phonenumber">
                            </div>
                        </div>
                    </div>
                    <div class="input-container">
                        <span><img src="{{url('img/contactus/house.svg')}}" alt="house" class="black">
                            <img src="{{url('img/contactus/house-red.svg')}}" alt="house-red" class="red"></span>
                        <input type="text" name="address" id="adress" placeholder="Address" autocomplete="off">
                    </div>
                    <div class="input-container message">
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
                    <input type="checkbox" id="checkConsent" name="contactConsent">
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
                    <button class="btn-blue"  onclick="EnquiryFormSubmit('enquiry',this)">
                        Submit
                    </button >
                </div>
            </form>
            <div class="contact-info">
                <div class="heading white-heading">
                    <h2>{!!$pageDetail->contact_us['heading']->heading!!}</h2>
                    <p>{!!$pageDetail->contact_us['heading']->content!!}</p>
                </div>
                <div class="contact-list">
                <div class="item">
                        <span>
                            <img src="{{url('img/aboutus/about-call.svg')}}" alt="about-call">
                        </span>
                        <div class="item-info">
                            <h3>Phone:</h3>
                            <a href="{{'tel:'.$websiteDetail->contact_number}}">{!!$websiteDetail->contact_number!!}</a>
                        </div>
                    </div>
                    <div class="item">
                        <span>
                            <img src="{{url('img/aboutus/about-mail.svg')}}" alt="about-email">
                        </span>
                        <div class="item-info">
                            <h3>Email:</h3>
                            <a href="{{'mailTo:'.$websiteDetail->contact_email}}">{!!$websiteDetail->contact_email!!}</a>

                        </div>
                    </div>
                    <div class="item">
                        <span>
                            <img src="{{url('img/aboutus/about-address.svg')}}" alt="aboutaddress">
                        </span>
                        <div class="item-info">
                            <h3>Address:</h3>
                            <p>{!!$websiteDetail->address!!}</p>
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
                {{-- <h2>Why Choose Best Practice Training for <span>Your Tech Skills Needs?</span></h2> --}}
                <h2>{!!$pageDetail->tech_skills_needs['heading']->heading!!}</h2>
            </div>
            @php unset($pageDetail->tech_skills_needs['heading'])@endphp
            <div class="skills-list">
                @foreach ($pageDetail->tech_skills_needs as $item)
                <div class="skills-item">
                    <span>
                        <img src="{{url($item->getImagePath())}}" alt="{{$item->image_alt}}">
                    </span>
                    <h3>{!!$item->heading!!}</h3>
                    <p>{!!$item->content!!} </p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- End skills section -->

<!-- Start Clients Section -->
<section class="flex-container clients">
    <div class="container">
        <div class="heading center-heading">
            <h2>{!!$pageDetail->partners['heading']->heading!!}</h2>
            <span class="overlay"></span>
        </div>
        @php unset($pageDetail->partners['heading']) @endphp
        <div class="clients-container">
            @foreach ($pageDetail->partners as $item)
            <img src="{{url($item->getImagePath())}}" alt="{{$item->image_alt}}">
            @endforeach
        </div>
    </div>

</section>
<!-- End CLients Section -->

@endsection
