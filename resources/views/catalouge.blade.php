@extends("layouts.master")
@section("content")

<!-- Start Banner Section -->
<section class="flex-container banner catalouge-banner">
    <div class="container">
        @include("layouts.navbar")
        <div class="banner-container">
            <div class="banner-text">
                <h1>Course Library</h1>
                <p>BPT was founded over 20 years ago with one simple mission: Finding the most trusted training courses around, at the most competitive prices. We recognise that the training marketplace is crowded.BPT was founded over 20 years ago with one simple mission.BPT was founded over 20 years ago with one simple mission.</p>
                <div class="breadcrums">
                    <ul>
                        <li><a href="javascript:void(0);">Home</a></li>
                        <img src="{{url('img/master/breadcrum-arrow.svg')}}" alt="breadcrums">
                        <li><a href="">Category</a></li>
                    </ul>
                </div>
            </div>
            <div class="banner-testi">
                <div class="testi-list owl-carousel">
                    <div class="testi-content white">
                        <span>
                            <img src="{{url('img/catalouge/homework-white.svg')}}" alt="homework">
                        </span>
                        <h3>Prince2 Foundation</h3>
                        <div class="buttons">
                            <a href="javascript:void(0);" class="btn-white open-popup enquiryJS" data-quote="View Detail">
                                <img src="{{url('img/catalouge/view-black.svg')}}" alt="view">View Detail
                            </a>
                        </div>
                    </div>
                    <div class="testi-content black">
                        <span>
                            <img src="{{url('img/catalouge/homework-black.svg')}}" alt="homework">
                        </span>
                        <h3>Prince2 Foundation</h3>
                        <div class="buttons">
                            <a href="javascript:void(0);" class="btn-blue open-popup enquiryJS" data-quote="View Detail">
                                <img src="{{url('img/catalouge/view-white.svg')}}" alt="view">View Detail
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Section -->

@endsection