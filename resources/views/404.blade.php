@extends("layouts.master")
@section("content")

<!-- Start Banner Section -->
<section class="flex-container banner error-banner">
    <div class="container">
        @include("layouts.navbar")
        <div class="banner-container">
            <h1>404</h1>
            <p>'We have just updated our website. So, if you didn't find your ideal course or have any query? Contact Us'</p>
            <div class="breadcrums">
                <ul>
                    <li><a href="">Home</a></li>
                    <li><img src="{{url('img/master/breadcrum-arrow.svg')}}" alt="arrow" class="white"></li>
                    <li><a href="">404</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Section -->

<!-- Start error sectipn -->
<section class="flex-container error">
    <div class="container">
        <div class="error-container">
            <div class="page-error">
                <div class="heading">
                    <h2>Page Not Error 404 : Page Not Found</h2>
                </div>
                <p>The page you are looking for might have been removed had its name changed or is temporarily unavailable.</p>
                <div class="buttons">
                    <a class="btn-blue"><img src="{{url('img/404/call.svg')}}" alt="call">Contact Us</a>
                </div>
            </div>
            <div class="error-image">
                <img src="{{url('img/404/error.svg')}}" alt="error">
            </div>
        </div>
    </div>
</section>
@endsection