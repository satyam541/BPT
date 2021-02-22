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

<!-- Start empty section -->
<section class="flex-container empty">
    <div class="container">
        <div class="empty-container">
            <div class="empty-content">
            <span><img src="{{url('img/emptycart/cart-img.svg')}}" alt="cart-img"></span>
            <h3>Your Cart Is Empty</h3>
            <p>Fill it with some training courses - take a look at our catalogue.</p>
            <div class="buttons">
                <a class="btn-blue">Have a Look<img src="{{url('img/emptycart/right-arrow.svg')}}" alt="right-arrow"></a>
            </div>
        </div>
        </div>
    </div>
</section>

@endsection