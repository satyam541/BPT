@extends("layouts.master")
@section("content")
<!-- Start Banner Section -->
<section class="flex-container banner testimonial-banner">
    <div class="container">
        @include("layouts.navbar")
        <div class="banner-container">
            <h1>Testimonial</h1>
            <p>{{$pageDetail->banner['banner']->content}}</p>
            {{-- <p>Choose from over 200 courses which cover all aspects of business and personal training, including Project Management, IT Security, Business and many more. Our courses cater to every training need, from introductory crash courses to advanced and prestigious qualifications, all to the highest standard of quality.</p> --}}
            <div class="breadcrums">
                <ul>
                    <li><a href="">Home</a></li>
                    <li><img src="{{url('img/master/breadcrum-arrow.svg')}}" alt="arrow" class="white"></li>
                    <li><a href="">Testimonial</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Section -->

<!-- Start Customers Section -->
<section class="flex-container customers">
    <div class="container">
        <div class="customers-container">
            <div class="heading">
                <h2>Customer <span>Experience</span></h2>
                <p>Client knows best</p>
            </div>
            <p>{!!$pageDetail->customer_experience['review']->content!!}</p>
            {{-- <p>Choose from over 200 courses which cover all aspects of business and personal training, including Project Management, IT Security, Business and many more. Our courses cater to every training need, from introductory crash courses to advanced and prestigious qualifications, all to the highest standard of quality.</p> --}}
            <div class="customers-list">
                @foreach($testimonials as $testimonial)
                <div class="customers-content">
                    <div class="content">
                        <img src="{{url('img/testimonial/quotes.png')}}" alt="quotes" class="customers-img">
                        {!! $testimonial->content !!}
                        {{-- <p>Choose from over 200 courses which cover all aspects of business and personal training, including Project Management, IT Security, Business and many more. Our courses cater to every training need, from introductory crash courses to advanced and prestigious qualifications, all to the highest standard of quality.</p> --}}
                    </div>
                    <div class="info">
                        <span>
                            <img src="{{url('img/testimonial/customer.svg')}}" alt="customer">
                        </span>
                        <div class="designation">
                            <h3> {!! $testimonial->author !!} </h3>
                            <h3> {!! $testimonial->designation !!}</h3>
                        </div>
                    </div>
                </div>
                {{-- <div class="customers-content">
                    <div class="content">
                        
                        <img src="{{url('img/testimonial/quotes.png')}}" alt="quotes" class="customers-img">
                       
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
                <div class="customers-content">
                    <div class="content">
                        <img src="{{url('img/testimonial/quotes.png')}}" alt="quotes" class="customers-img">
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
                <div class="customers-content">
                    <div class="content">
                        <img src="{{url('img/testimonial/quotes.png')}}" alt="quotes" class="customers-img">
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
                <div class="customers-content">
                    <div class="content">
                        <img src="{{url('img/testimonial/quotes.png')}}" alt="quotes" class="customers-img">
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
                <div class="customers-content">
                    <div class="content">
                        <img src="{{url('img/testimonial/quotes.png')}}" alt="quotes" class="customers-img">
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
                    {{-- @endforeach --}}
                {{-- </div>  --}}
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- End Customers Section -->

<!-- Start Services Section -->
<section class="flex-container services">
    <div class="container">
        <div class="services-container">
            <span class="phone">
                <img src="{{url('img/testimonial/call.svg')}}" alt="call">
            </span>
            <div class="heading">
                <h2>Do You Still Have a Question <span>Regarding Our Services?</span></h2>
                {{-- <h2>{!!$pageDetail->overlay['regarding_our_services']->heading!!}</h2> --}}

                <p>{!!$pageDetail->overlay['regarding_our_services']->content!!}</p>

                {{-- <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration.</p> --}}
            </div>
            <div class="buttons">
                    <a class="btn-blue open-popup enquiryJS" data-quote="Contact Us">
                        <img src="{{url('img/testimonial/call-white.svg')}}" alt="call">Contact Us
                    </a>
                </div>
        </div>
    </div>
</section>
<!-- End Services Section -->

<!-- Start Testimonial Section -->
<section class="flex-container testimonial">
    <div class="container">
        <div class="testimonial-container">
            <div class="heading center-heading white-heading">
                <h2>{!!$pageDetail->testimonial['people_tell_ it _the_best']->heading!!}</h2>

                {{-- <h2>People Tell it the Best</h2> --}}
                <p>Client Quotes</p>
            </div>
            <div class="testimonial-list owl-carousel">
                @foreach($testimonials as $testimonial)
                <div class="testimonial-info">
                    <span>
                        <img src="{{url('img/testimonial/client.svg')}}" alt="client">
                    </span>
                    <p> {!! $testimonial->content !!} </p>

                    {{-- <p class="review">Choose from over 200 courses which cover all aspects of business and personal training, including Project Management, IT Security, Business and many more. Our courses cater to every training need, from introductory crash courses to advanced and prestigious qualifications, all to the highest standard of quality.</p> --}}
                    <h3> {!! $testimonial->author !!} </h3>
                    <h3> {!! $testimonial->designation !!}</h3>
                </div>
                {{-- <div class="testimonial-info">
                    <span>
                        <img src="{{url('img/testimonial/client.svg')}}" alt="client">
                    </span>
                    <p class="review">Choose from over 200 courses which cover all aspects of business and personal training, including Project Management, IT Security, Business and many more. Our courses cater to every training need, from introductory crash courses to advanced and prestigious qualifications, all to the highest standard of quality.</p>
                    <h3>Christan Perry</h3>
                    <h4>Web Developer</h4>
                </div> --}}
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- End Testimonial Section -->

<!-- Start Facts Section -->
<section class="flex-container fact">
    <div class="container">
        <div class="fact-container">
            <div class="heading center-heading">
                {{-- <h2>{!!$pageDetail->facts['some _facts_about _us']->heading!!}</h2> --}}
                <h2>Some Facts About <span>Us</span></h2>
                <p>our rich history guides our growth and the possibilities are limitless in terms of the company we are yet to become.our rich history guides our growth and the possibilities are limitless in terms of the company we are yet to</p>
                {{-- <p>{!!$pageDetail->facts['some _facts_about _us']->content!!}</p> --}}
            
            </div>
            <div class="fact-list">
                <div class="fact-content">
                    <span class="img">
                    <img src="{{url('img/testimonial/glass.svg')}}" alt="glass">
                    </span>
                    <div class="content">
                {{-- {!!$pageDetail->insite['insite1']->content!!} --}}

                        <h2>1200</h2>
                        <h3>Project</h3>
                        <p>our rich history guides our growth and the possibilities arelimitless in terms of</p>
                    </div>
                </div>
                <div class="fact-content">
                    <span class="img">
                    <img src="{{url('img/testimonial/glass.svg')}}" alt="glass">
                    </span>
                    <div class="content">
                        {{-- {!!$pageDetail->insite['insite2']->content!!} --}}
                         <h2>1200</h2>
                        <h3>Project</h3>
                        <p>our rich history guides our growth and the possibilities arelimitless in terms of</p> 
                    </div>
                </div>
                <div class="fact-content">
                    <span class="img">
                    <img src="{{url('img/testimonial/glass.svg')}}" alt="glass">
                    </span>
                    <div class="content">
                        {{-- {!!$pageDetail->insite['insite3']->content!!} --}}
                         <h2>1200</h2>
                        <h3>Project</h3>
                        <p>our rich history guides our growth and the possibilities arelimitless in terms of</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Facts Section -->

@endsection