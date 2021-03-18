@extends("layouts.master")

@section("content")

<!-- Start Banner Section -->
<section class="flex-container banner blog-banner">
    <div class="container">
        @include("layouts.navbar")
        <div class="banner-container">
            <h1>{{$blog->title}}</h1>
            <p>{{$blog->summary}}</p>
            <div class="breadcrums">
                <ul>
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li>
                    <img src="{{url('img/master/breadcrum-arrow.svg')}}" alt="breadcrums" class="white">
                    <img src="{{url('img/master/breadcrum-black.svg')}}" alt="breadcrums" class="black">
                    </li>
                    <li><a href="{{route('blog')}}">Blog</a></li>
                    <li><img src="{{url('img/master/breadcrum-arrow.svg')}}" alt="breadcrums" class="white"></li>
                    <li><a href="">{{$blog->title}}</a></li>

                </ul>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Section -->

<!-- start blog-intro section  -->
<section class="flex-container blog-intro">
    <div class="container">
        <div class="intro-container">
            <div class="content-left">
                <span>
                    <img src="{{url($blog->getImagePath())}}" alt="detail">
                </span>
                <div class="intro-detail">
                    <div class="detail">
                        <p>
                            <img src="{{url('img/blog-detail/name.svg')}}" alt="name">
                            {{$blog->author}}
                        </p>
                        <p>
                            {{$blog->publish_date->format('d M, Y')}}
                        </p>
                    </div>
                    <h3>{{$blog->title}}</h3>
                    {!!$blog->content!!}
                </div>
            <div class="blog-navs">
                <div class="previous-nav">
                    <img src="{{url($prevBlog->getImagePath())}}" alt="navs-bg" class="bg-img">
               <p> {{$prevBlog->title}}</p>
                    <div class="buttons">
                        <a class="btn-blue" href="{{route('blogDetail',['blog'=>$prevBlog->reference])}}">
                        <img src="{{url('img/blog-detail/prev-nav.svg')}}" alt="prev-nav">
                            Previous Post
                        </a>
                    </div>  
                </div>
                <div class="next-nav">
                <img src="{{url($nextBlog->getImagePath())}}" alt="navs-bg" class="bg-img">
                     <p>{{$nextBlog->title}}</p>
                     <div class="buttons">
                        <a class="btn-blue" href="{{route('blogDetail',['blog'=>$nextBlog->reference])}}">
                            Next Post
                            <img src="{{url('img/blog-detail/next-nav.svg')}}" alt="next-nav">
                        </a>
                    </div>  
                </div>
            </div>  

            </div>
            <div class="content-right">
                <!-- <div class="search-bar">
                    <div class="heading center-heading">
                        <h2>Search</h2>
                    </div>
                    <span>
                        <input type="text" class="auto-complete-blog" placeholder="Search....." autocompleat="off" > 
                       <div class="button">
                       <img src="{{url('img/blog-detail/find.svg')}}" alt="find">
                       </div>
                    </span>
                </div> -->
                <div class="blog-review owl-carousel">
                    @foreach ($testimonials as $testimonial)
                    <div class="review-inner">
                            <span>
                                    <img src="{{url($testimonial->getImagePath())}}" alt="testi-client">
                            </span>
                            <p>{!!$testimonial->content!!}</p>

                            <h3 class="author">{!!$testimonial->author!!}</h3>
                            <!-- <p>{!!$testimonial->designation!!}</p> -->
                    </div>
                    @endforeach
                    
                </div>
                <div class="blog-question">
                    <h2>Have Any Question? Call Us Today</h2>
                    <a href="tel:{{websiteDetail()->contact_number}}">Call: {{websiteDetail()->contact_number}}</a>
                    <a href="enquiries@bestpracticetraining.com" class="email">{{websiteDetail()->contact_email}}</a>
                </div>
               
            </div>
        </div>
    </div>
</section>
<!-- End blog-intro section -->


<!-- Start ideal section -->
<section class="flex-container ideal">
    <div class="container">
        <div class="ideal-container">
            <div class="heading center-heading">
                <h2>{!!heading_split($pageDetail->center_heading['heading']->heading)!!}</h2>
                <p>{!!$pageDetail->center_heading['heading']->content!!}</p>
            </div>
            <div class="clients-inner">
                @foreach ($pageDetail->partners as $image)
                    <span class="image">
                        <img src="{{ url($image->getImagePath()) }}" alt="{{$image->image_alt}}">
                    </span>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- End ideal section -->

@endsection
@section('footerScripts')
<script>
    var blogURL = "{{route('blogAutoComplete')}}";
 </script>
 <script src="{{url('script/blog.js')}}"></script>
@endsection