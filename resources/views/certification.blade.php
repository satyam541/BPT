@extends("layouts.master")
@section("content")

<!-- Start Banner Section -->
<section class="flex-container banner certification-banner">
    <div class="container">
        @include("layouts.navbar")
        <div class="banner-container">
            <h1>{!!$pageDetail->banner['heading']->heading!!}</h1>
            <p>{!!$pageDetail->banner['heading']->content!!}</p>
            <div class="breadcrums">
                <ul>
                    <li><a href="{{route('home')}}">Home</a></li>
                    <img src="{{url('img/master/breadcrum-arrow.svg')}}" alt="breadcrums" class="white">
                    <img src="{{url('img/master/breadcrum-black.svg')}}" alt="breadcrums" class="black">
                    <li><a href=""> Certifications</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Section -->

<!-- Start Certification-Course Section -->
<section class="flex-container certification-course">
    <div class="container">
        <div class="course-container">
            <div class="heading center-heading">
                <h2>Certifications</h2>
            </div>
            @foreach ($certifications as $certification)
            <div class="course-list">
                <div class="course-content" onclick="location.href = '{{ url('certification-details'.$certification->slug) }}';">
                    <a href="javascript:void(0);">{{$certification->name}}</a>
                    <div class="buttons">
                        <a href="{{url('certification-details'.$certification->slug)}}" class="btn-blue" >
                            <img src="{{url('img/certification/detail.svg')}}" alt="detail">Certification
                        </a>
                    </div>
                </div>
                
            </div>    
            @endforeach
            
        </div>
    </div>
</section>
<!-- End Certification-Course Section -->

<!-- Start Method Section -->
<section class="flex-container method">
    <div id="foreground"></div>
    <div class="container">
        <div class="method-container">
            <div class="heading center-heading white-heading">
                <h2>{!!$pageDetail->delivery_methods['heading']->heading!!}</h2>
            </div>
            <div class="method-list">
                @php unset($pageDetail->delivery_methods['heading'])  @endphp
                @foreach ($pageDetail->delivery_methods as $deliverymethod)
                <a class="method-content open-popup enquiryJS" data-quote="Enquire for - {{$deliverymethod->heading}}">
                    <span>
                        <img src="{{$deliverymethod->getImagePath()}}" alt="{{$deliverymethod->image_alt}}">
                    </span>
                    <p>{{$deliverymethod->heading}}</p>
                </a>    
                @endforeach
                
                
            </div>
        </div>
    </div>
</section>
<!-- End Method Section -->

<!-- Start Enquiry Section -->
<section class="flex-container enquiry">
    <div class="container">
        <div class="enquiry-container">
            <div class="enquiry-content">
                <div class="heading">
                    <h2>{!!$pageDetail->enquiry_content['content']->heading!!}</h2>
                </div>
                <p>{!!$pageDetail->enquiry_content['content']->content!!}</p>
                <div class="contact-list">
                    <div class="contact-content">
                        <div class="content">
                            <span>
                                <img src="{{url('img/certification/call-us.svg')}}" alt="call-us">
                            </span>
                            <p>Call Us:</p>
                        </div>
                        <a href="tel:{{websiteDetail()->contact_number}}">{{websiteDetail()->contact_number}}</a>
                    </div>
                    <div class="contact-content">
                        <div class="content">
                            <span>
                                <img src="{{url('img/certification/mail-black.svg')}}" alt="mail-black">
                            </span>
                            <p>Email Us:</p>
                        </div>
                        <a href="mailto:{{websiteDetail()->contact_email}}">{{websiteDetail()->contact_email}}</a>
                    </div>
                </div>
                <div class="buttons">
                    <a href="javascript:void(0);" class="btn-blue open-popup enquiryJS" data-quote="Enquire Now" data-type="other">
                        <img src="{{$pageDetail->enquiry_content['content']->getImagePath()}}" alt="{{$pageDetail->enquiry_content['content']->image_alt}}">Enquire Now
                    </a>
                </div>
            </div>
            <div class="enquiry-img">
                <img src="{{url('img/certification/enquiry-img.png')}}" alt="enquiry-img">
            </div>
        </div>
    </div>
</section>
<!-- Start Enquiry Section -->

@endsection