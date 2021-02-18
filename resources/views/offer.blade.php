@extends("layouts.master")
@section("content")

<!-- Start Banner Section -->
<section class="flex-container offer-banner">
    <div class="container">
        @include("layouts.navbar")
        <div class="banner-container">
            <h1>Bundle Offer </h1>
            <p>It is widely used by the UK government as well as internationally and in private sector. PRINCE2® Foundation and Practitioner is a combined course which helps you to achieve both the PRINCE2® Foundation and PRINCE2® Practitioner certifications.  </p>
            <div class="breadcrums">
                <ul>
                    <li><a href="">Home</a></li>
                    <li><img src="{{url('img/master/breadcrum-arrow.svg')}}" alt="arrow"></li>
                    <li><a href="">Offer</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Section -->

@endsection