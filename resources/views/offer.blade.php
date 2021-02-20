@extends("layouts.master")
@section("content")

<!-- Start Banner Section -->
<section class="flex-container banner offer-banner">
    <div class="container">
        @include("layouts.navbar")
        <div class="banner-container">
            <h1>Bundle Offer </h1>
            <p>It is widely used by the UK government as well as internationally and in private sector. PRINCE2® Foundation and Practitioner is a combined course which helps you to achieve both the PRINCE2® Foundation and PRINCE2® Practitioner certifications.  </p>
            <div class="breadcrums">
                <ul>
                    <li><a href="">Home</a></li>
                    <li><img src="{{url('img/master/breadcrum-arrow.svg')}}" alt="arrow" class="white"></li>
                    <li><a href="">Offer</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Section -->

<!-- Start bundle section -->
<section class="flex-container bundle">
    <div class="container">
        <div class="bundle-container">
            <div class="range">
                <div class="heading">
                    <h2>We Offer a Wide Range <span>of Bundles</span></h2>
                </div>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. 
                </p>
                <p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                <div class="bundle-list">
                <div class="project-bundle">
                    <span><img src="{{url('img/offer/project-bundle.svg')}}" alt="project-bundle"></span>
                    <h3>Our Project Management Bundles</h3>
                </div>
                <div class="project-bundle">
                    <span><img src="{{url('img/offer/project-bundle.svg')}}" alt="project-bundle"></span>
                    <h3>Our Business Analysis Bundles</h3>
                </div>
                <div class="project-bundle">
                    <span><img src="{{url('img/offer/project-bundle.svg')}}" alt="project-bundle"></span>
                    <h3>Our ITIL Bundles</h3>
                </div>
                <div class="project-bundle">
                    <span><img src="{{url('img/offer/project-bundle.svg')}}" alt="project-bundle"></span>
                    <h3>Our IT Security Bundles</h3>
                </div>
                </div>
                <div class="buttons">
                    <a class="btn-blue"><img src="{{url('img/offer/enquire.svg')}}" alt="enquire">Need Help</a>
                </div>
                </div>
                <div class="top-bundles">
                    <div class="heading">
                        <h2>Sale of Top bundles</h2>
                    </div>
                    <div class="bundles-info">
                    <img src="{{url('img/offer/top-bundles.svg')}}" alt="top-bundles">
                    </div>
            </div>
        </div>
    </div>
</section>
<!-- End bundle section -->

<!-- Start management section -->
<section class="flex-container management">
    <div class="container">
    <div class="management-container">
        <div class="heading center-heading">
            <h2>Our Project <span>Management Bundles</span></h2>
        </div>
        <div class="management-bundles">
            <div class="bundle-info">
                <h3>PRINCE2® & Agile Bundle </h3>
                <span>Up to 15% off with this bundle</span>
                <ul>
                    <li>Courses included</li>
                    <li>PRINCE2® Foundation & Practitioner</li>
                    <li>AgilePM® Foundation & Practitioner</li>
                </ul>
                <div class="buttons">
                    <a class="btn-blue">
                            <img src="{{url('img/offer/email.svg')}}" alt="email">
                            Get a Quote
                    </a>
                </div>
            </div>
            <div class="bundle-info">
                <h3>PRINCE2® & Agile Bundle </h3>
                <span>Up to 15% off with this bundle</span>
                <ul>
                    <li>Courses included</li>
                    <li>PRINCE2® Foundation & Practitioner</li>
                    <li>AgilePM® Foundation & Practitioner</li>
                </ul>
                <div class="buttons">
                    <a class="btn-blue">
                            <img src="{{url('img/offer/email.svg')}}" alt="email">
                            Get a Quote
                    </a>
                </div>
            </div>
            <div class="bundle-info">
                <h3>PRINCE2® & Agile Bundle </h3>
                <span>Up to 15% off with this bundle</span>
                <ul>
                    <li>Courses included</li>
                    <li>PRINCE2® Foundation & Practitioner</li>
                    <li>AgilePM® Foundation & Practitioner</li>
                </ul>
                <div class="buttons">
                    <a class="btn-blue">
                            <img src="{{url('img/offer/email.svg')}}" alt="email">
                            Get a Quote
                    </a>
                </div>
            </div>
            <div class="bundle-info">
                <h3>PRINCE2® & Agile Bundle </h3>
                <span>Up to 15% off with this bundle</span>
                <ul>
                    <li>Courses included</li>
                    <li>PRINCE2® Foundation & Practitioner</li>
                    <li>AgilePM® Foundation & Practitioner</li>
                </ul>
                <div class="buttons">
                    <a class="btn-blue">
                            <img src="{{url('img/offer/email.svg')}}" alt="email">
                            Get a Quote
                    </a>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- End management section -->

<!-- Start recommend section -->
<section class="flex-container recommend">
    <div class="container">
        <div class="recommend-container">
            <div class="heading center-heading white-heading">
                <h2>Stay in Touch</h2>
            </div>
            <div class="recommend-info">
            <p>Get personalized course recommendations, track subjects and courses with reminders and more Get personalized course recommendations, </p>
                                <input type="text" name="email" id="email" placeholder="Your Email Address"
                                    autocomplete="off">
                            <div class="buttons">
                                <a class="btn-blue"><img src="{{url('img/offer/email.svg')}}" alt="email">
                                Enquire Now</a>
                            </div>
    </div>
        </div>
    </div>
</section>
<!-- End recommend section -->

<!-- Start new-bundle section -->
<section class="flex-container new-bundle">
    <div class="container">
        <div class="new-bundle-container">
    <div class="inform-us">
            <div class="Inform-content">
                <p>Need more information on Bundles? We're a click away</p>
                <div class="inform-list">
                    <div class="inform-item">
                    <span>
                        <img src="{{url('img/master/call-us.svg')}}" alt="call us">
                    </span>
                    <div class="info">
                        <p>Call Us:</p>
                        <a>023 8000 1008</a>
                    </div>
                    </div>
                <div class="inform-item">
                    <span>
                        <img src="{{url('img/master/email.svg')}}" alt="email">
                    </span>
                    <div class="info">
                        <p>Send Us Mail:</p>
                        <a>info@thebestpracticetraining.com</a>
                    </div>
                    </div>
                </div>
                    </div>
    </div>
    <div class="latest-bundles">
        <div class="heading">
        <h2>New Bundles To Begin 2021</h2>
        </div>
        <p>Enquire now and be the first to grab the opportunity</p>
        <p>Enquire now and be the first to grab the opportunity Wanted to buy number of courses in a single package? We offer in-hand developed bundle of trending courses to provide you with the best way to gain necessary knowledge and skills required for succeeding in your career. We value your precious time and money. 
        </p>
        <p>Enquire now and be the first to grab the opportunity Wanted to buy number of courses in a single package? We offer in-hand developed bundle of trending courses to provide you with the best way to gain necessary knowledge and skills required for succeeding in your career. We value your precious time and money. 
        </p>
            <div class="buttons">
        <a class="btn-blue"><img src="{{url('img/offer/email.svg')}}" alt="email">Have any Question</a>
            </div>
    </div>
        </div>
    </div>
</section>

@endsection