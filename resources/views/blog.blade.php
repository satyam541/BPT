@extends("layouts.master")

@section("content")

<!-- Start Banner section  -->
<section class="flex-container blog-banner">
            <div class="container">
            @include("layouts.navbar")
                <div class="banner-container">
                    <div class="banner-content">
                        <h1>Blog</h1>
                        <p>Choose from over 200 courses which cover all aspects of business and 
                            personal training, including Project Management, IT Security, Business 
                            and many more. Our courses cater to every training need, from</p><div class="breadcrums">
                    <ul>
                    <li><a href="">Home </a></li>
                    <li><a href=""> > Blog </a></li>
                    </ul>
        </div>
                    </div>
                </div>
            </div>
</section>
<!-- End Banner section  -->

<!-- Start popular-blog section -->
<section class="flex-container popular-blog">
    <div class="container">
        <div class="popular-container">
            <div class="heading center-heading">
                <h2>Most Popular <span>Blog</span></h2>
            </div>
            <div class="popular-list">
                <a class="popular-item">
                    <p>14 July, 2017</p>
                    <div class="info">
                        <p>By - David Baker</p>
                        <h3>About Best Practice Training</h3>
                    </div>
                </a>
                <a class="popular-item">
                    <p>14 July, 2017</p>
                    <div class="info">
                        <p>By - David Baker</p>
                        <h3>About Best Practice Training</h3>
                    </div>
                </a>
                <a class="popular-item">
                    <p>14 July, 2017</p>
                    <div class="info">
                        <p>By - David Baker</p>
                        <h3>About Best Practice Training</h3>
                    </div>
                </a>
                <a class="popular-item">
                    <p>14 July, 2017</p>
                    <div class="info">
                        <p>By - David Baker</p>
                        <h3>About Best Practice Training</h3>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- End popular-blog section -->

<!-- Start our-blogs section -->

<section class="flex-container our-blog">
<div class="container">
    <div class="our-container">
        <div class="heading center-heading">
            <h2>Our <span>Blogs</span></h2>
        </div>
        <p class="para">Lorem Ipsum. Proin Gravida Nibh Vel Velit Auctor Aliquet. Aenean Sollicitudin, Lorem Quis Bibendum Auctor, Nisi Elit Consequat Ipsum, Nec Sagittis Sem Nibh Id Elit. </p>
        <div class="our-list">

        <div class="our-item">
         <span class="our-circle"></span>
           <p class="date">14 July, 2017</p>
           <div class="our-content">
               <img src="{{url('img/blog/our-image.png')}}" alt="our-image" class="our-image">
               <div class="our-info">
                   <p class="name"><img src="{{url('img/blog/author.svg')}}" alt="author"> by - David Baker</p>
                   <p class="designation">Web Development</p>
               </div>
               <h3>About Best Practice Training</h3>
               <p>Lorem Ipsum. Proin Gravida Nibh Vel Velit Auctor Aliquet. Aenean Sollicitudin, Lorem Quis Bibendum Auctor, Nisi Elit Consequat Ipsum, Nec Sagittis Sem Nibh Id Elit. </p>
               <div class="buttons">
                   <a class="btn-blue">
                       Read More
                   </a>
               </div>
           </div>
        </div>
        <div class="our-item">
         <span class="our-circle"></span>
           <p class="date">14 July, 2017</p>
           <div class="our-content">
               <img src="{{url('img/blog/our-image.png')}}" alt="our-image" class="our-image">
               <div class="our-info">
                   <p class="name"><img src="{{url('img/blog/author.svg')}}" alt="author"> by - David Baker</p>
                   <p class="designation">Web Development</p>
               </div>
               <h3>About Best Practice Training</h3>
               <p>Lorem Ipsum. Proin Gravida Nibh Vel Velit Auctor Aliquet. Aenean Sollicitudin, Lorem Quis Bibendum Auctor, Nisi Elit Consequat Ipsum, Nec Sagittis Sem Nibh Id Elit. </p>
               <div class="buttons">
                   <a class="btn-blue">
                       Read More
                   </a>
               </div>
           </div>
        </div>
        <div class="our-item">
         <span class="our-circle"></span>
           <p class="date">14 July, 2017</p>
           <div class="our-content">
               <img src="{{url('img/blog/our-image.png')}}" alt="our-image" class="our-image">
               <div class="our-info">
                   <p class="name"><img src="{{url('img/blog/author.svg')}}" alt="author"> by - David Baker</p>
                   <p class="designation">Web Development</p>
               </div>
               <h3>About Best Practice Training</h3>
               <p>Lorem Ipsum. Proin Gravida Nibh Vel Velit Auctor Aliquet. Aenean Sollicitudin, Lorem Quis Bibendum Auctor, Nisi Elit Consequat Ipsum, Nec Sagittis Sem Nibh Id Elit. </p>
               <div class="buttons">
                   <a class="btn-blue">
                       Read More
                   </a>
               </div>
           </div>
        </div>
        <div class="our-item">
         <span class="our-circle"></span>
           <p class="date">14 July, 2017</p>
           <div class="our-content">
               <img src="{{url('img/blog/our-image.png')}}" alt="our-image" class="our-image">
               <div class="our-info">
                   <p class="name"><img src="{{url('img/blog/author.svg')}}" alt="author"> by - David Baker</p>
                   <p class="designation">Web Development</p>
               </div>
               <h3>About Best Practice Training</h3>
               <p>Lorem Ipsum. Proin Gravida Nibh Vel Velit Auctor Aliquet. Aenean Sollicitudin, Lorem Quis Bibendum Auctor, Nisi Elit Consequat Ipsum, Nec Sagittis Sem Nibh Id Elit. </p>
               <div class="buttons">
                   <a class="btn-blue">
                       Read More
                   </a>
               </div>
           </div>
           
        </div>
        <div class="buttons">
               <a class="btn-blue">
                   Load More
               </a>
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
                <h2>Whatever Your Training Needs,<span> Find Your Ideal</span> </h2>
                <p>Choose from over 200 courses which cover all aspects of 
                business and personal training, including Project Management, IT Security, Business and many more. Our courses cater to every training need, from introductory crash courses to advanced and</p>
            </div>
            <div class="clients-inner">
                <span class="image">
                    <img src="{{url('img/blog/amazon.svg')}}" alt="amazong">
                </span>
                <span class="image">
                <img src="{{url('img/blog/twitter.svg')}}" alt="twitter">
                </span>
                <span class="image">
                <img src="{{url('img/blog/google-service.svg')}}" alt="google-service">
                </span>
                <span class="image">
                <img src="{{url('img/blog/google.svg')}}" alt="google">
                </span>
                <span class="image">
                <img src="{{url('img/blog/google-plus.svg')}}" alt="google-plus">
                </span>
                <span class="image">
                <img src="{{url('img/blog/facebook.svg')}}" alt="facebook">
                </span>
                <span class="image">
                <img src="{{url('img/blog/linkedin.svg')}}" alt="linkedin">
                </span>
            </div>
        </div>
    </div>
</section>
<!-- End ideal section -->

@endsection