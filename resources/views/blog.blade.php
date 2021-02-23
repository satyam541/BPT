@extends("layouts.master")

@section('content')

    <!-- Start Banner Section -->
    <section class="flex-container banner blog-banner">
        <div class="container">
            @include("layouts.navbar")
            <div class="banner-container">
                <h1>{!! $pageDetail->banner['heading']->heading !!}</h1>
                <p>{!! $pageDetail->banner['heading']->content !!}</p>
                <div class="breadcrums">
                    <ul>
                        <li><a href="{{route('home')}}">Home</a></li>
                        <img src="{{ url('img/master/breadcrum-arrow.svg') }}" alt="breadcrums" class="white">
                        <img src="{{ url('img/master/breadcrum-black.svg') }}" alt="breadcrums" class="black">
                        <li><a href="">Blog</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Section -->

    <!-- Start popular-blog section -->
    <section class="flex-container popular-blog">
        <div class="container">
            <div class="popular-container">
                <div class="heading center-heading">
                    {{-- <h2>Most Popular <span>Blog</span></h2> --}}
                    <h2>{!! $pageDetail->main['heading']->heading !!}</h2>
                </div>
                <div class="popular-list">
                    @foreach ($blogs->take(4) as $blog)
                    <a class="popular-item">
                        <p>{{$blog->publish_date->format('d M, Y')}}</p>
                        <div class="info">
                            <p>by - {{$blog->author}}</p>
                            <h3>{{$blog->title}}</h3>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- End popular-blog section -->

    <!-- Start our-blog section -->

    <section class="flex-container our-blog">
        <div class="container">
            <div class="our-container">
                <div class="heading center-heading">
                    {{-- <h2>Our <span>Blogs</span> </h2> --}}
                    <h2>{!! $pageDetail->blog_list['heading']->heading !!}</h2>
                </div>
                <div class="our-list">
                    @foreach ($blogs as $blog)
                    <div class="our-item">
                        {{-- <img src="{{ url('img/blog/our-image.png') }}" alt="our-image"> --}}
                        <img src="{{ $blog->getImagePath() }}" alt="our-image">
                        <div class="our-info">
                            <p class="name">
                                <img src="{{ url('img/blog/author.svg') }}" alt="author">
                                by - {{$blog->author}}
                            </p>
                            <p class="designation">
                                Web Development
                            </p>
                        </div>
                        <h3>{{$blog->title}}</h3>
                        <p class="item-text">{{$blog->summary}} </p>

                        <div class="buttons">
                            <a class="btn-blue">
                                Read More
                            </a>
                        </div>

                        <p class="date">{{$blog->publish_date->format('d M, Y')}}</p>
                    </div>
                    @endforeach

                    <div class="buttons">
                        <a class="btn-blue load-more">
                            Load More
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End our-blog section -->


    <!-- Start ideal section -->
    <section class="flex-conatiner ideal">
        <div class="container">
            <div class="ideal-container">
                <div class="heading center-heading">
                    {{-- <h2>Whatever Your Training Needs,<span> Find Your Ideal</span> </h2> --}}
                    <h2>{!! $pageDetail->training_needs['heading']->heading !!}</h2>
                    <p>{!! $pageDetail->training_needs['heading']->content !!}</p>
                </div>
                <div class="clients-inner">
                    <span class="image">
                        <img src="{{ url('img/blog/amazon.svg') }}" alt="amazong">
                    </span>
                    <span class="image">
                        <img src="{{ url('img/blog/twitter.svg') }}" alt="twitter">
                    </span>
                    <span class="image">
                        <img src="{{ url('img/blog/google-service.svg') }}" alt="google-service">
                    </span>
                    <span class="image">
                        <img src="{{ url('img/blog/google.svg') }}" alt="google">
                    </span>
                    <span class="image">
                        <img src="{{ url('img/blog/google-plus.svg') }}" alt="google-plus">
                    </span>
                    <span class="image">
                        <img src="{{ url('img/blog/facebook.svg') }}" alt="facebook">
                    </span>
                    <span class="image">
                        <img src="{{ url('img/blog/linkedin.svg') }}" alt="linkedin">
                    </span>
                </div>
            </div>
        </div>
    </section>
    <!-- End ideal section -->

@endsection
