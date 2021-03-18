@extends("layouts.master")
@section("content")

<!-- Start Banner Section -->
<section class="flex-container banner error-banner">
    <div class="container">
        @include("layouts.navbar")
        <div class="banner-container">
            <h1>{!!$pageDetail->banner['header']->heading!!}</h1>
            <p>{!!$pageDetail->banner['header']->content !!}</p>
            <div class="breadcrums">
                <ul>
                    <li><a href="{{route('home')}}">Home</a></li>
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
                    <h2>{!!$pageDetail->error['heading']->heading!!}</h2>
                </div>
                <p>{!!$pageDetail->error['heading']->content !!}</p>
                <div class="buttons">
                    <a href="{{route('home')}}" class="btn-blue"><img src="{{url('img/404/home.svg')}}" alt="home">Browse More</a>
                </div>
            </div>
            <div class="error-image">
                <img src="{{url('img/404/error.svg')}}" alt="error">
            </div>
        </div>
    </div>
</section>
@endsection