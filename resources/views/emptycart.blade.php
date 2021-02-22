@extends("layouts.master")
@section("content")

<!-- Start Banner Section -->
<section class="flex-container banner cart-banner">
    <div class="container">
        @include("layouts.navbar")
        <div class="banner-container">
            <h1>Cart</h1>
            <p>BPT was founded over 20 years ago with one simple mission: Finding the most trusted training courses around, at the most competitive prices. We recognise that the training marketplace is crowded.</p>
            <div class="breadcrums">
                <ul>
                    <li><a href="">Home</a></li>
                    <li><img src="{{url('img/master/breadcrum-arrow.svg')}}" alt="arrow" class="white"></li>
                    <li><a href="">Cart</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Section -->

@endsection