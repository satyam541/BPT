@extends("layouts.master")
@section("content")


<!-- Start Banner Section -->
    <section class="flex-container banner knowledge-banner">
        <div class="container">
            @include("layouts.navbar")
            <div class="banner-container">
            </div>
        </div>
    </section>
<!-- End Banner Section -->

<!-- Start benefits section -->
<section class="flex-container benefit">
    <div class="container">
        <div class="benefit-container">
            <div class="heading center-heading white-heading">
                <h2>The Benefits</h2>
            </div>
            <div class="benefit-list">
                <div class="benefit-info">
                    <span><img src="{{url('img/knowledge-pass/save-money.svg')}}" alt="save-money"></span>
                    <h3>Saving Money</h3>
                </div>
                <div class="benefit-info">
                    <span><img src="{{url('img/knowledge-pass/saving-time.svg')}}" alt="saving-time"></span>
                    <h3>Saving Time</h3>
                </div>
                <div class="benefit-info">
                    <span><img src="{{url('img/knowledge-pass/12-month.svg')}}" alt="saving-time"></span>
                    <h3>12 Month Budget</h3>
                </div>
                <div class="benefit-info">
                    <span><img src="{{url('img/knowledge-pass/reduced-admin.svg')}}" alt="reduced-admin"></span>
                    <h3>Reduced Invoicing and Administration</h3>
                </div>
                <div class="benefit-info">  
                    <span><img src="{{url('img/knowledge-pass/training-analysis.svg')}}" alt="training-analyis"></span>
                    <h3>Training Needs Analysis</h3>
                </div>
                <div class="benefit-info">  
                    <span><img src="{{url('img/knowledge-pass/discount-percentages.svg')}}" alt="discount-discounts"></span>
                    <h3>Higher Discount Percentages</h3>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End benefits section -->



@endsection