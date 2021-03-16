@extends("layouts.master")
@section("content")
<!-- Start Banner Section -->
<section class="flex-container banner thanks-banner">
    <div class="container">
        @include("layouts.navbar")
        <div class="banner-container">
            <h1>{!!$pageDetail->banner['heading']->heading!!}</h1>
            <p>{!!$pageDetail->banner['heading']->content!!}</p>
            <div class="breadcrums">
                <ul>
                    <li><a href="{{route('home')}}">Home</a></li>
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
                        <h2>{!!$pageDetail->success['success_content']->heading!!}</h2>
                        <p>{!!$pageDetail->success['success_content']->content!!}</p>
                    <div class="info">
                            <a href="tel:{{websiteDetail()->contact_number}}"><strong>Call Us: </strong> {{websiteDetail()->contact_number}}</a>
                            <a href="mailto:{{websiteDetail()->contact_email}}"><strong>Email: </strong> {{websiteDetail()->contact_email}}</a>
                    </div>
                    </div>
                </div>
            </div>
            <div class="success-contact">
                <h2>{!!$pageDetail->success['success_contact']->heading!!}</h2>
                <p>{!!$pageDetail->success['success_contact']->content!!}</p>
                <div class="contact-main">
                    <span>
                        <img src="{{url('img/thanks/phone-white.svg')}}" alt="phone">
                    </span>
                    <div class="contact-content">
                        <h3>Phone</h3>
                        <p>{{websiteDetail()->contact_number}}</p>
                    </div>
                </div>
                <div class="contact-main">
                    <span>
                        <img src="{{url('img/thanks/pin.svg')}}" alt="pin">
                    </span>
                    <div class="contact-content">
                        <h3>Address</h3>
                        <p>{{websiteDetail()->address}}</p>
                    </div>
                </div>
                <div class="social-media">
                    <h2>Follow Us</h2>
                    @php
                    $socialmedialinks = socialmedialinks();
                    @endphp
                    <a href="{{ $socialmedialinks->where('website','Facebook')->first()->link ?? ''}}">
                        <img src="{{url('img/master/facebook.svg')}}" alt="facebook">
                    </a>
                    <a href="{{ $socialmedialinks->where('website','Twitter')->first()->link ?? ''}}">
                        <img src="{{url('img/master/twitter.svg')}}" alt="twitter">
                    </a>
                    <a href="{{ $socialmedialinks->where('website','Google')->first()->link ?? ''}}">
                        <img src="{{url('img/master/google-plus.svg')}}" alt="google-plus">
                    </a>
                    <a href="{{ $socialmedialinks->where('website','Linkedin')->first()->link ?? ''}}">
                        <img src="{{url('img/master/linked-in.svg')}}" alt="linked-in">
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Form-Success Section -->

@endsection