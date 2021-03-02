@extends("layouts.master")
@section("content")
<!-- Start Banner Section -->
<section class="flex-container banner thanks-banner">
    <div class="container">
        @include("layouts.navbar")
        <div class="banner-container">
            <h1>Thanks</h1>
            <p>'We have just updated our website. So, if you didn't find your ideal course or have any query? Contact Us'</p>
            <div class="breadcrums">
                <ul>
                    <li><a href="">Home</a></li>
                    <li><img src="{{url('img/master/breadcrum-arrow.svg')}}" alt="arrow" class="white"></li>
                    <li><a href="">Thanks</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Section -->

<!-- Start Form-Success Section -->
<section class="flex-container form-success">
    <div class="container">
        <div class="success-container">
            <div class="success">
                <div class="success-content">
                    <div class="content">
                        <h2>Thank You For Your Enquiry.</h2>
                        <p>Our representative will get in touch with you shortly.</p>
                    <div class="info">
                            <a href="tel:023 8000 1008"><strong>Call Us: </strong> 023 8000 1008</a>
                            <a href="mailto:enquirie@bestpracticetraining.com"><strong>Email: </strong> enquirie@bestpracticetraining.com</a>
                    </div>
                    </div>
                </div>
            </div>
            <div class="success-contact">
                <h2>Contact Us</h2>
                <p>If you have some questions, Please feel free to contact us.</p>
                <div class="contact-main">
                    <span>
                        <img src="{{url('img/thanks/phone-white.svg')}}" alt="phone">
                    </span>
                    <div class="contact-content">
                        <h3>Phone</h3>
                        <p>023 8000 1008</p>
                    </div>
                </div>
                <div class="contact-main">
                    <span>
                        <img src="{{url('img/thanks/pin.svg')}}" alt="pin">
                    </span>
                    <div class="contact-content">
                        <h3>Address</h3>
                        <p>Wessex House, Upper Market Street, Eastleigh, Hampshire, SO50 9FD.</p>
                    </div>
                </div>
                <div class="social-media">
                    <h2>Follow Us</h2>
                    <a href="{{ socialmedialinks()->where('website','Facebook')->first()->link ?? ''}}">
                        <img src="{{url('img/master/facebook.svg')}}" alt="facebook">
                    </a>
                    <a href="{{ socialmedialinks()->where('website','Twitter')->first()->link ?? ''}}">
                        <img src="{{url('img/master/twitter.svg')}}" alt="twitter">
                    </a>
                    <a href="{{ socialmedialinks()->where('website','Google')->first()->link ?? ''}}">
                        <img src="{{url('img/master/google-plus.svg')}}" alt="google-plus">
                    </a>
                    <a href="{{ socialmedialinks()->where('website','Linkedin')->first()->link ?? ''}}">
                        <img src="{{url('img/master/linked-in.svg')}}" alt="linked-in">
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Form-Success Section -->

@endsection