@extends("layouts.master")

@section("content")

<!-- Start Banner section  -->
<section class="flex-container banner contact-banner">
            <div class="container">
            @include("layouts.navbar")
                <div class="banner-container">
                        <h1>{!!$pageDetail->banner['banner']->heading!!}</h1>
                        <p>{!!$pageDetail->banner['banner']->content!!}</p>
                        <div class="breadcrums">
                            <ul>
                                <li><a href="{{route('home')}}">Home</a></li>
                                <li><img src="{{url('img/master/breadcrum-arrow.svg')}}" alt="arrow" class="white"></li>
                                <li><a href="{{route('contactUs')}}">Contact</a></li>
                            </ul>
                        </div>
                </div>
            </div>
</section>
<!-- End Banner section  -->

<!-- Start contact Section -->
<section class="flex-container contact">
            <div class="container">
                <div class="contact-container">
                    {{-- <form class="form" id="contact-us"> --}}
                        <form class="form bestpracticetraining.com-hubspot" onsubmit="submitEnquiry(this)" id="contact-us">
                        
                        @csrf
                        <input type="hidden" name="type" value="contact"> 
                        <input type="hidden" name="Url" id="url" value="{{Request::url()}}">

                        <div class="heading center-heading">
                            <h2>Get in Touch <span>with Us Today</span> </h2>
                        </div>
                        <div class="form-input">
                            <div class="input-container">
                                <span><img src="{{url('img/contactus/name.svg')}}" alt="name" class="black">
                                <img src="{{url('img/contactus/name-red.svg')}}" alt="name-red" class="red"></span>
                                <input type="text" name="name" id="f-name" placeholder="Name*"
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
                                <div class="phonecode-field field-black">
                                    <select class="country-code"></select>
                                    <span class="prefix"></span>
                                    <input type="number" class="telephone" placeholder="Phone Number*" min=0>
                                    <div style="z-index:-1;width:0;height:0;pointer-events: none;">
                                        <input type="text" name="phone" class="phonenumber" tabindex="-1">
                                    </div>
                                </div>
                            </div>
                            <div class="input-container">
                                <span><img src="{{url('img/contactus/house.svg')}}" alt="house" class="black">
                                <img src="{{url('img/contactus/house-red.svg')}}" alt="house-red" class="red"></span>
                                <input type="text" name="address" id="adress" placeholder="Address"
                                    autocomplete="off">
                            </div>
                            <div class="input-container message">
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
                            <input type="checkbox" id="checkConsent" name="contactConsent">
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
                            <button class="btn-blue" onclick="EnquiryFormSubmit('enquiry',this)">Submit</button>
                            {{-- <button class="btn-blue">Submit</button> --}}
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
                                    <a href="{{'mailTo:'.$websiteDetail->contact_email}}">{!!$websiteDetail->contact_email!!}</a>

                                </div>
                            </div>
                            <div class="item">
                                    <span>
                                    <img src="{{url('img/contactus/call-blue.svg')}}" alt="call-blue">
                                    </span>
                                    <div class="item-info">
                                        <h3>Contact:</h3>
                                        <a href="{{'tel:'.$websiteDetail->contact_number}}">{!!$websiteDetail->contact_number!!}</a>
                                    </div>
                            </div>
                            <div class="item">
                                    <span>
                                        <img src="{{url('img/contactus/address.svg')}}" alt="address">
                                    </span>
                                    <div class="item-info">
                                        <h3>Address:</h3>
                                        <p>{!!$websiteDetail->address!!}</p>
                                    </div>
                            </div>
                        </div>
                            <div class="social">
                                <p>Sign Up with Social Platform</p>
                                <div class="media-list">
                                    @foreach ($socialmedias as $socialmedia)
                                    <a href="{{$socialmedia->link}}"><img src="{{url($socialmedia->getImagePath())}}" alt="linkedin"></a>    
                                    @endforeach
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
                        @foreach ($pageDetail->get_more_information as $information)
                            <div class="info-content">
                                <span style="background-image: url({{url($information->getImagePath())}})">
                                    <img src="{{url($information->getIconPath())}}" alt="talk"></span>
                                <div class="info-text">
                                    <h3>{!!$information->heading!!}</h3>
                                    <p>{!!$information->content!!}</p>
                                </div>
                            </div>
                        @endforeach
                        
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
                <h2>{!! heading_split($pageDetail->reach_us['heading']->heading)!!}</h2>
                <p>{!!$pageDetail->reach_us['heading']->content!!}</p>
            </div>
            <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3022.127368522814!2d-73.9710478674591!3d40.75922327013592!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c258e4af7dd635%3A0x430076ce7541fbb3!2s601%20Lexington%20Avenue!5e0!3m2!1sen!2sin!4v1614319478813!5m2!1sen!2sin" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
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
                            <h2>{!! heading_split($pageDetail->faq['heading']->heading) !!}</h2>
                        </div>
                        <div class="faq-list">
                            @php unset($pageDetail->faq['heading'])@endphp
                            @foreach ($pageDetail->faq as $faq)
                            <div class="faq-item">
                                <div class="ques">
                                    <h3>{{$faq->heading}}</h3>
                                    <span>
                                    <img src="{{url('img/contactus/arrow.svg')}}" alt="arrow">
                                    </span>
                                </div>
                                <div class="ans">
                                    <p>{{$faq->content}}</p>
                                </div>
                            </div> 
                            @endforeach

                        </div>
                    </div>
                    <div class="experience">
                        <div class="experience-info">
                            <h2>{{$pageDetail->faq['experience_us']->heading}}</h2>
                        </div>
                        <div class="platforms">
                            @foreach ($socialmedias as $socialmedia)
                            <a href="{{$socialmedia->link}}"><img src="{{url($socialmedia->getImagePath())}}" alt="linkedin"></a>    
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
</section>
<!-- End FAQ Section -->


@endsection