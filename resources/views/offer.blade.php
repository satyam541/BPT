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
            <div class="heading white-heading">
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
        <div class="new-container">
    <div class="info-us">
    <img src="{{url('img/offer/inform-bg.png')}}" alt="inform-bg">
            <div class="info-content">
                <p>Need more information on Bundles? We're a click away</p>
                <div class="info-list">
                    <div class="info-list">
                    <span>
                        <img src="{{url('img/offer/telephone.svg')}}" alt="call us">
                    </span>
                    <div class="info">
                        <p>Call Us:</p>
                        <a>023 8000 1008</a>
                    </div>
                    </div>
                <div class="info-list">
                    <span>
                        <img src="{{url('img/offer/mail.svg')}}" alt="mail">
                    </span>
                    <div class="info">
                        <p>Email Us:</p>
                        <a>info@thebestpractice.co.uk</a>
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
        <a class="btn-blue"><img src="{{url('img/offer/question.svg')}}" alt="question">Have any Question?</a>
            </div>
    </div>
        </div>
    </div>
</section>
<!-- End new-bundle section -->

<!-- Start pass section -->
<section class="flex-container pass">
    <div class="container">
        <div class="pass-container">
            <div class="heading center-heading white-heading">
                <h2>Our Passes</h2>
            </div>
            <div class="pass-list">
                <div class="pass-content">
                    <div class="pass-heading">
                        <span><img src="{{url('img/offer/id-card.svg')}}" alt="id-card"></span>
                        <h3>FlexiPass</h3>
                    </div>
                    <p>A pre-paid training voucher that enables the delegates to book and attend the training program anywhere within the time period of 6 months. Having agreed with your training provider on the financial issues involved, you will be provided an account to book your course. Besides, you will also come to know about the performance of others through various reports you receive. </p>
                    <div class="buttons">
                    <a class="btn-blue"><img src="{{url('img/offer/quote.svg')}}" alt="quote">Enquire For The FlexiPass</a>
                    </div>
                </div>
                <div class="pass-content">
                    <div class="pass-heading">
                        <span><img src="{{url('img/offer/id-card.svg')}}" alt="id-card"></span>
                        <h3>Knowledge Pass</h3>
                    </div>
                    <p>You can use your training budget more effectively with the Knowledge Pass. After setting budget, you can book any course in your preferred location within 12 months. This pass is best suited for the audience who have flexible requirements for the business. To get the knowledge pass, you can contact one of our speacialist learning consultant to set up your account so that you can book course throughout the year.</p>
                    <div class="buttons">
                    <a class="btn-blue"><img src="{{url('img/offer/quote.svg')}}" alt="quote">Enquire For The Knowledge Pass</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End pass section -->

@endsection