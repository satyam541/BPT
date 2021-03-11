@extends("layouts.master")
@section("content")
<!-- Start Banner Section -->
<section class="flex-container banner testimonial-banner">
    <div class="container">
        @include("layouts.navbar")
        <div class="banner-container">
            <h1>{!!$pageDetail->banner['header']->heading!!}</h1>
            <p>{!!$pageDetail->banner['header']->content!!}</p>
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
                <h2>{!! heading_split($pageDetail->customer_experience['review']->heading) !!}</h2>
                <p>{!!$pageDetail->customer_experience['review']->page_tag_line!!}</p>
            </div>
            <p>{!!$pageDetail->customer_experience['review']->content!!}</p>
            <div class="customers-list">
                @foreach ($testimonials as $testimonial)
                <div class="customers-content">
                    <div class="content">
                        <img src="{{url('img/testimonial/quotes.png')}}" alt="quotes" class="customers-img">
                        <p>{!!$testimonial->content!!}</p>
                    </div>
                    <div class="info">
                        <span>
                            <img src="{{$testimonial->getImagePath()}}" alt="customer">
                        </span>
                        <div class="designation">
                            <h3>{!!$testimonial->author!!}</h3>
                            <p>{!!$testimonial->designation!!}</p>
                        </div>
                    </div>
                </div>
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
                <h2>{!! heading_split($pageDetail->overlay['regarding_our_services']->heading) !!}</h2>
                <p>{!!$pageDetail->overlay['regarding_our_services']->content!!}</p>
            </div>
            <div class="buttons">
                    <a class="btn-blue open-popup enquiryJS" data-type="other" data-quote="Contact Us">
                        <img src="{{url('img/testimonial/call-white.svg')}}" alt="call">Contact Us
                    </a>
                </div>
        </div>
    </div>
</section>
<!-- End Services Section -->

<!-- Start Testimonial Section -->
<!-- <section class="flex-container testimonial">
    <div class="container">
        <div class="testimonial-container">
            <div class="heading center-heading white-heading">
                <h2>{!!$pageDetail->what_people_tell['heading']->heading!!}</h2>
                <p>{!!$pageDetail->what_people_tell['heading']->page_tag_line!!}</p>
            </div>
            <div class="testimonial-list owl-carousel">
                @foreach ($testimonials->random(5) as $testimonial)
                <div class="testimonial-info">
                    <span>
                        <img src="{{$testimonial->getImagePath()}}" alt="client">
                    </span>
                    <p class="review">{!!$testimonial->content!!}</p>
                    <h3>{!!$testimonial->author!!}</h3>
                    <h4>{!!$testimonial->designation!!}</h4>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section> -->
<!-- End Testimonial Section -->

<!-- Start Facts Section -->
<section class="flex-container fact">
    <div class="container">
        <div class="fact-container">
            <div class="heading center-heading">
                <h2>{!! heading_split($pageDetail->insights['heading']->heading) !!}</h2>
                <p>{!!$pageDetail->insights['heading']->content!!}</p>
            </div>
            @php unset($pageDetail->insights['heading']) @endphp
            <div class="fact-list">
                @foreach ($pageDetail->insights as $item)
                <div class="fact-content">
                    <span class="img">
                    <img src="{{$item->getIconPath()}}" alt="{{$item->icon_alt}}">
                    </span>
                    <div class="content">
                        <h2>{!!$item->heading!!}</h2>
                        <h3>{!!$item->page_tag_line!!}</h3>
                        <p>{!!$item->content!!}</p>
                    </div>
                </div>
                @endforeach 
            </div>
        </div>
    </div>
</section>
<!-- End Facts Section -->

@endsection