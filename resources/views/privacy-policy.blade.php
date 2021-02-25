@extends("layouts.master")
@section("content")

<!-- Start Banner Section -->
<section class="flex-container banner privacy-banner">
    <div class="container">
        @include("layouts.navbar")
        <div class="banner-container">
            <h1>Privacy Policy</h1>
            <p>We are committed to protect & safeguard your privacy.</p>
            <div class="breadcrums">
                <ul>
                    <li><a href="">Home</a></li>
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
            <h2>Privacy Policy</h2>
        </div>
        <h3>Who we are</h3>
        <p>Best Practice Training Limited (hereafter referred to as the “Company”, “we”, “us”, and “our”) provides professional training courses. The Company takes data protection very seriously and abide by the EU General Data Protection Regulation (GDPR). We encourage prospective clients to read the Company’s terms and conditions, prior to any purchases, in parallel to this privacy statement.</p>
        <h3>What data we collect?</h3>
        <p>We collect the following information from you through the use of enquiry and contact forms on the Website, and within Emails or telephone communications too:</p>
        <ul>
            <li><strong>Name and contact data:</strong>We collect your first and last name, email address, postal address, phone number, in order to respond sufficiently and appropriately to your enquiry to find a suitable course for you.</li>
            <li><strong>Billing data:</strong>We collect data necessary billing information to process your payment if you make a purchase. We do not store or retain any payment details once the purchase is complete.</li>
        </ul>
        <p>If you are progressing your career through the Company, Apprenticeship or further education we may collect addition personal information to secure funding or to satisfy statutory legal or Government scheme requirements. You will be informed on such occasions. We also store personal information from you when you communicate with us regarding the provision of services, including by email, postal mail or telephone. We collect certain information about the visitors of our Website. Please refer to Cookies policy for more details. We do not pass on training information to any other organisation, or your personal organisation, without the explicit consent of your employer, unless required by our examining institutes in the pursuit of service delivery, for example when registering an exam. If you do not wish to be contacted for any marketing purposes your consent can be removed by clicking “unsubscribe” on our formal marketing emails. An alternative is to log your request to unsubscribe by visiting our “Unsubscribe me” page.</p>
        </div>
    </div>
</section>
<!-- End policy section -->

@endsection