@extends("layouts.master")
@section("content")

<!-- Start Banner Section -->
<section class="flex-container banner onsite-banner">
    <div class="container">
        @include("layouts.navbar")
        <div class="banner-container">
            <h1>{!!$pageDetail->banner['header']->heading!!}</h1>
            <p>{!!$pageDetail->banner['header']->content!!}</p>
            <div class="breadcrums">
                <ul>
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li><img src="{{url('img/master/breadcrum-arrow.svg')}}" alt="arrow" class="white"></li>
                    <li><a href="">Onsite</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Section -->

<!-- Start Onsite Section -->
<section class="flex-container onsite-training">
    <div class="container">
        <div class="training-container">
            <div class="training-info">
                <div class="heading center-heading">
                    {{-- <h2>Let's Bring the Training <span>to You !</span></h2> --}}
                    <h2>{!!$pageDetail->main['heading']->heading!!}</h2>
                </div>
                <p>{!!$pageDetail->main['heading']->content!!}</p>
                <div class="buttons">
                    <a class="btn-blue open-popup enquiryJS" data-quote="Need More Information">
                        <img src="{{url('img/onsite/information.svg')}}" alt="information">Need More Information</a>
                </div>
            </div>
            <div class="delegate">
                <div class="heading center-heading">
                    <h2>{!!$pageDetail->main['heading']->page_tag_line!!}</h2>
                </div>
                <div class="trained-bg">
                    <h3>75%</h3>
                    <p>Trained Delegates Through Onsite Training</p>
                </div>
                <div class="training-map">
                    <img src="{{$pageDetail->main['heading']->getImagePath()}}" alt="training-map">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Onsite Section -->

<!-- Start Doorstep Section -->
<section class="flex-container doorstep">
    <div class="container">
        <div class="doorstep-container">
            <form class="form" onsubmit="submitEnquiry(this)" id="contact-us">
                @csrf
                <div class="heading center-heading white-heading">
                    <h2>Enquire for the Training At Your Doorstep</h2>
                </div>
                <div class="form-input">
                    <input type="hidden" name="type" value="onsite">
                    <input type="hidden" name="location" value="onsite">
                    <input type="hidden" name="Url" id="url" value="{{Request::url()}}">
                    <div class="input-container">
                        <span><img src="{{url('img/master/name-white.svg')}}" alt="name" class="black">
                            <img src="{{url('img/master/name-red.svg')}}" alt="name-red" class="red"></span>
                        <input type="text" name="f-name" id="f-name" placeholder="Name*" autocomplete="off">
                    </div>
                    <div class="input-container">
                        <span><img src="{{url('img/master/email-white.svg')}}" alt="email" class="black">
                            <img src="{{url('img/master/email-red.svg')}}" alt="email-red" class="red"></span>
                        <input type="text" name="email" id="email" placeholder="Email*" autocomplete="off">
                    </div>
                    <div class="input-container">
                        <span><img src="{{url('img/master/phone-callwhite.svg')}}" alt="phone-call" class="black">
                            <img src="{{url('img/master/phone-callred.svg')}}" alt="phonecall-red" class="red"></span>
                        <!-- <input type="number" name="phone" id="phone" placeholder="Phone Number*" autocomplete="off"> -->
                        <div class="phonecode-field">
                            <select class="country-code"></select>
                            <span class="prefix"></span>
                            <input type="number" class="telephone" placeholder="Phone Number*">
                            <div style="z-index:-1;width:0;height:0;pointer-events: none;">
                                <input type="number" name="Phone" class="phonenumber">
                            </div>
                        </div>
                    </div>
                    <div class="input-container">
                        <span><img src="{{url('img/master/house-white.svg')}}" alt="house" class="black">
                            <img src="{{url('img/master/house-red.svg')}}" alt="house-red" class="red"></span>
                        <input type="text" name="company" id="address" placeholder="Company" autocomplete="off">
                    </div>
                    <div class="input-container">
                        <span><img src="{{url('img/master/book-white.svg')}}" alt="book" class="black">
                            <img src="{{url('img/master/book-red.svg')}}" alt="book-red" class="red"></span>
                        <input type="text" name="course" id="course" placeholder="Course*" autocomplete="off">
                    </div>
                    <div class="input-container">
                        <span><img src="{{url('img/master/position-white.svg')}}" alt="position" class="black">
                            <img src="{{url('img/master/position-red.svg')}}" alt="position-red" class="red"></span>
                        <input type="number" name="delegate" id="delegate" placeholder="Number of Delegates*"
                            autocomplete="off">
                    </div>
                    <div class="input-container message">
                        <span><img src="{{url('img/master/house-white.svg')}}" alt="house" class="black">
                            <img src="{{url('img/master/house-red.svg')}}" alt="house-red" class="red"></span>
                        <textarea name="address" id="address" placeholder="Address"></textarea>
                    </div>
                    <div class="input-container message">
                        <span><img src="{{url('img/master/comment-white.svg')}}" alt="comment" class="black">
                            <img src="{{url('img/master/comment-red.svg')}}" alt="comment-red" class="red"></span>
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
                    <input name="contactConsent" type="checkbox" id="checkConsent">
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
                    <button onclick="EnquiryFormSubmit('enquiry',this)" class="btn-blue">
                        Submit
                    </button>
                </div>
            </form>
            <div class="info">
                <div class="heading">
                    {{-- <h2>Information at Your <span>Fingertips</span></h2> --}}
                    <h2>{!!$pageDetail->fingertips['heading']->heading!!}</h2>
                </div>
                <p>{!!$pageDetail->fingertips['heading']->content!!}</p>
                @php unset($pageDetail->fingertips['heading'])@endphp
                <div class="info-list">
                    @foreach ($pageDetail->fingertips as $item)
                    <div class="item">
                        <span>
                            <img src="{{$item->getIconPath()}}" alt="{{$item->image_alt}}">
                        </span>
                        <div class="item-info">
                            <h3>{!!$item->heading!!}</h3>
                            <p>{!!$item->content!!}</p>

                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Doorstep Section -->

<!-- Start Choose section -->
<section class="flex-container choose">
    <div class="container">
        <div class="choose-container">
            <div class="heading center-heading">
                {{-- <h2>Why Choose <span>Onsite Training</span></h2> --}}
                <h2>{!!$pageDetail->why_choose['heading']->heading!!}</h2>
            </div>
            @php unset($pageDetail->why_choose['heading'])@endphp
            <div class="choose-list">
                @foreach ($pageDetail->why_choose as $item)
                <div class="choose-item">
                    <span><img src="{{$item->getIconPath()}}" alt="{{$item->icon_alt}}"></span>
                    <p>{{$item->heading}}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- End Choose section -->

<!-- Start Solution section -->
<section class=" flex-container solution">
    <div class="container">
        <div class="solution-container">
            <div class="heading center-heading">
                {{-- <h2>Our High-Quality Tailor Made <span>Solutions Include</span></h2> --}}
                <h2>{!!$pageDetail->overlay['heading']->heading!!}</h2>
            </div>
            @php unset($pageDetail->overlay['heading'])@endphp
            <div class="solution-list">
                @foreach ($pageDetail->overlay as $item)
                <div class="solution-item">
                    <span><img src="{{$item->getIconPath()}}" alt="{{$item->icon_alt}}"></span>
                    <h3>{{$item->heading}}</h3>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- End Solution section -->

@endsection