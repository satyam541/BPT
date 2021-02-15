@extends("layouts.master")
@section("content")

<!-- Start Banner Section -->
<section class="flex-container banner testimonial-banner">
    <div class="container">
        @include("layouts.navbar")
        <div class="banner-container">
            <h1>Testimonial</h1>
            <p>Choose from over 200 courses which cover all aspects of business and personal training, including Project Management, IT Security, Business and many more. Our courses cater to every training need, from introductory crash courses to advanced and prestigious qualifications, all to the highest standard of quality.</p>
            <div class="breadcrums">
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">> Testimonial</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Section -->

<!-- Start Experience Section -->
<section class="flex-container experience">
    <div class="container">
        <div class="experience-container">
            <div class="heading">
                <h2>Customer <span>Experience</span></h2>
                <p>Client knows best</p>
            </div>
            <p>Choose from over 200 courses which cover all aspects of business and personal training, including Project Management, IT Security, Business and many more. Our courses cater to every training need, from introductory crash courses to advanced and prestigious qualifications, all to the highest standard of quality.</p>
            <div class="experience-list">
                <div class="experience-content">
                    <div class="content">
                        <img src="{{url('img/testimonial/quotes.png')}}" alt="quotes" class="experience-img">
                        <p>Choose from over 200 courses which cover all aspects of business and personal training, including Project Management, IT Security, Business and many more. Our courses cater to every training need, from introductory crash courses to advanced and prestigious qualifications, all to the highest standard of quality.</p>
                    </div>
                    <div class="info">
                        <span>
                            <img src="{{url('img/testimonial/customer.svg')}}" alt="customer">
                        </span>
                        <div class="designation">
                            <h3>Harshul Hisham</h3>
                            <p>WEB DESIGNER</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Experience Section -->
@endsection