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
                    <h2>{!! $pageDetail->main['heading']->heading !!}</h2>
                </div>
                <div class="popular-list">
                    @foreach ($popularBlogs->take(4) as $blog)
                        <a class="popular-item" href={{route('blogDetail',['blog'=>$blog->reference])}}>
                            <img src="{{url($blog->getImagePath())}}" alt="popular-1">
                            <p class="date">{{$blog->publish_date->format('d M, Y')}}</p>
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
                    <h2>{!! $pageDetail->blog_list['heading']->heading !!}</h2>
                </div>
                <p class="headline">{!! $pageDetail->blog_list['heading']->content !!}</p>
                <div class="our-list">
                    @foreach ($blogs as $blog)
                    <div class="our-item hide">
                        
                        <img src="{{ $blog->getImagePath() }}" alt="our-image">
                        <div class="our-info">
                            <p class="name">
                                <img src="{{ url('img/blog/author.svg') }}" alt="author">
                                By - {{$blog->author}}
                            </p>
                            {{-- <p class="designation">
                                Web Development
                            </p> --}}
                        </div>
                        <h3 >{{$blog->title}}</h3>
                        <p class="item-text">{!!$blog->summary!!}</p>

                        <div class="buttons">
                            <a class="btn-blue" href={{route('blogDetail',['blog'=>$blog->reference])}}>
                                Read More
                            </a>
                        </div>

                        <p class="date">{{$blog->publish_date->format('d M, Y')}}</p>
                    </div>
                    @endforeach
                    <div class="buttons" >
                        <a class="btn-blue load-more" id="loadMore" >
                            Load More
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End our-blog section -->


    <!-- Start ideal section -->
    <section class="flex-container ideal">
        <div class="container">
            <div class="ideal-container">
                <div class="heading center-heading">
                    <h2>{!! $pageDetail->training_needs['heading']->heading !!}</h2>
                    <p>{!! $pageDetail->training_needs['heading']->content !!}</p>
                </div>
                <div class="clients-inner">
                                
                        <img src="{{url('img/blog/clients.png')}}" alt="clients">
                    <!-- @foreach ($pageDetail->partners as $image)
                        <span class="image">
                            <img src="{{ url($image->getImagePath()) }}" alt="{{$image->image_alt}}">
                        </span>
                     @endforeach                 -->
                    
                </div>
            </div>
        </div>
    </section>
    <!-- End ideal section -->

@endsection
