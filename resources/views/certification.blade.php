@extends("layouts.master")
@section("content")

<!-- Start Banner Section -->
<section class="flex-container banner certification-banner">
    <div class="container">
        @include("layouts.navbar")
        <div class="banner-container">
            <h1>Technical IT Certifications</h1>
            <p>BPT was founded over 20 years ago with one simple mission: Finding the most trusted training courses around, at the most competitive prices. We recognise that the training marketplace is crowded.BPT was founded over 20 years ago with one simple mission.BPT was founded over 20 years ago with one simple mission.</p>
            <div class="breadcrums">
                <ul>
                    <li><a href="">Home</a></li>
                    <img src="{{url('img/master/breadcrum-arrow.svg')}}" alt="breadcrums" class="white">
                    <img src="{{url('img/master/breadcrum-black.svg')}}" alt="breadcrums" class="black">
                    <li><a href="">Technical IT Certifications</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Section -->

@endsection