@extends("layouts.master")

@section("content")

<!-- Start Banner Section -->
<section class="flex-container banner blog-banner">
    <div class="container">
        @include("layouts.navbar")
        <div class="banner-container">
            <h1>Blog</h1>
            <p>Choose from over 200 courses which cover all aspects of business and
                personal training, including Project Management, IT Security, Business
                and many more. Our courses cater to every training need, from</p>
            <div class="breadcrums">
                <ul>
                    <li><a href="">Home</a></li>
                    <img src="{{url('img/master/breadcrum-arrow.svg')}}" alt="breadcrums" class="white">
                    <img src="{{url('img/master/breadcrum-black.svg')}}" alt="breadcrums" class="black">
                    <li><a href="">Blog</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Section -->


<!-- Start ideal section -->
<section class="flex-conatiner ideal">
    <div class="container">
        <div class="ideal-container">
            <div class="heading center-heading">
                <h2>Whatever Your Training Needs,<span> Find Your Ideal</span> </h2>
                <p>Choose from over 200 courses which cover all aspects of
                    business and personal training, including Project Management, IT Security, Business and many more.
                    Our courses cater to every training need, from introductory crash courses to advanced and</p>
            </div>
            <div class="clients-inner">
                <span class="image">
                    <img src="{{url('img/blog/amazon.svg')}}" alt="amazong">
                </span>
                <span class="image">
                    <img src="{{url('img/blog/twitter.svg')}}" alt="twitter">
                </span>
                <span class="image">
                    <img src="{{url('img/blog/google-service.svg')}}" alt="google-service">
                </span>
                <span class="image">
                    <img src="{{url('img/blog/google.svg')}}" alt="google">
                </span>
                <span class="image">
                    <img src="{{url('img/blog/google-plus.svg')}}" alt="google-plus">
                </span>
                <span class="image">
                    <img src="{{url('img/blog/facebook.svg')}}" alt="facebook">
                </span>
                <span class="image">
                    <img src="{{url('img/blog/linkedin.svg')}}" alt="linkedin">
                </span>
            </div>
        </div>
    </div>
</section>
<!-- End ideal section -->


<!-- start intro section  -->

<section class="flex-container intro">
    <div class="container">
        <div class="intro-container">
            <div class="intro-content">
                <span>
                    <img src="{{url('img/blog-detail/detail.png')}}" alt="detail">
                </span>
                <div class="intro-detail">
                    <div class="detail">
                        <p>
                            <img src="{{url('img/blog-detail/name.svg')}}" alt="name">
                            By Sarah Jordan
                        </p>
                        <p>
                            14 July, 2017
                        </p>
                        <p>
                            Web Developer
                        </p>
                    </div>
                    <h3>An Introduction To Agile Software Development</h3>
                    <p>In The State Of Utah At A Ski Resort, In February Of 2001, 17 Project Management Industry Experts Gathered For Two Days. And As A Result, They Conceived The Agile Software Development Manifesto.</p>
                    <p>In The State Of Utah At A Ski Resort, In February Of 2001, 17 Project Management Industry Experts Gathered For Two Days. And As A Result, They Conceived The Agile Software Development Manifesto.</p>
                    <div class="points">
                        <img src="{{url('img/blog-detail/list-detail.png')}}" alt="list-detail">
                        <ul>
                            <li>Extreme Programming</li>
                            <li>Crystal</li>
                            <li>Scrum</li>
                            <li>DSDM</li>
                            <li>FDD</li>
                            <li>Adaptive Software Development</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- End intro section -->

@endsection