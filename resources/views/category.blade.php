@extends("layouts.master")
@section("content")

<!-- Start Banner Section -->
<section class="flex-container banner certification-banner">
    <div class="container">
        @include("layouts.navbar")
        <div class="banner-container">
            <h1>{!!$category->name!!}</h1>
            <p>{!!$category->tag_line!!}</p>
            <div class="breadcrums">
                <ul>
                    <li><a href="{{route('home')}}">Home</a></li>
                    <img src="{{url('img/master/breadcrum-arrow.svg')}}" alt="breadcrums" class="white">
                    <img src="{{url('img/master/breadcrum-black.svg')}}" alt="breadcrums" class="black">
                    <li><a href="">{!!$category->name!!}</a></li>
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
                <h2>{!!$category->name!!}</h2>
            </div>
            <div class="course-list">
                @foreach ($category->topics as $topic)
                <div class="course-content">
                    <a href="javascript:void(0);">{{$topic->name}}</a>
                    <div class="buttons">
                        <a href="{{ url('training-courses' . $topic->reference) }}" class="btn-blue" data-quote="{{$topic->name}}">
                            <img src="{{url('img/certification/detail.svg')}}" alt="detail">Topic Detail
                        </a>
                    </div>
                </div>    
                @endforeach
            </div>
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
                <h2>{!!$pageDetail->method_list['heading']->heading!!}</h2>
            </div>
            @php unset($pageDetail->method_list['heading']) @endphp
            <div class="method-list">
                @foreach ($pageDetail->method_list as $method)
                <a class="method-content open-popup enquiryJS" data-quote="Enquire for - {{$method->heading}}">
                    <span>
                        <img src="{{$method->getImagePath()}}" alt="{{$method->image_alt}}">
                    </span>
                    <p>{{$method->heading}}</p>
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
                    <h2>{!!heading_split($pageDetail->enquiry['heading']->heading)!!}</h2>
                </div>
                <p>{!!$pageDetail->enquiry['heading']->content!!}</p>
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
                    <a href="javascript:void(0);" class="btn-blue open-popup enquiryJS" data-quote="Enquire Now">
                        <img src="{{url('img/certification/enquire.svg')}}" alt="enquire">Enquire Now
                    </a>
                </div>
            </div>
            <div class="enquiry-img">
                <img src="{{$pageDetail->enquiry['heading']->getImagePath()}}" alt="{{$pageDetail->enquiry['heading']->image_alt}}">
            </div>
        </div>
    </div>
</section>
<!-- Start Enquiry Section -->

@endsection