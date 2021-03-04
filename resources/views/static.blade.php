@extends("layouts.master")
@section("content")

<!-- Start Banner Section -->
<section class="flex-container banner privacy-banner">
    <div class="container">
        @include("layouts.navbar")
        <div class="banner-container">
            <h1>{!!$pageDetail->banner['header']->heading!!}</h1>
            <p>{!!$pageDetail->banner['header']->content!!}</p>
            <div class="breadcrums">
                <ul>
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li><img src="{{url('img/master/breadcrum-arrow.svg')}}" alt="arrow" class="white"></li>
                    <li><img src="{{url('img/master/breadcrum-black.svg')}}" alt="arrow" class="black"></li>
                    <li><a href="">Privacy Policy</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Section -->

<!-- Start policy section -->
<section class="flex-container policy"> 
    <div class="container">
        <div class="policy-container">
        <div class="heading">
            <h2>{!!$pageDetail->container['heading']->heading!!}</h2>
        </div>
        {!!$pageDetail->container['heading']->content!!}
    </div>
    </div>
</section>
<!-- End policy section -->

@endsection