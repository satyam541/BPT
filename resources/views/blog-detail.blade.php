@extends("layouts.master")

@section("content")

<!-- Start Banner Section -->
<section class="flex-container banner blog-banner">
    <div class="container">
        @include("layouts.navbar")
        <div class="banner-container">
            <h1>Blog Detail</h1>
            <p>Choose from over 200 courses which cover all aspects of business and personal training, including Project Management, IT Security, Business and many more. Our courses cater to every training need, from</p>
            <div class="breadcrums">
                <ul>
                    <li><a href="">Home</a></li>
                    <img src="{{url('img/master/breadcrum-arrow.svg')}}" alt="breadcrums" class="white">
                    <img src="{{url('img/master/breadcrum-black.svg')}}" alt="breadcrums" class="black">
                    <li><a href="">Blog Detail</a></li>
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
                    <img src="{{url('img/blog-detail/detail.png')}}" alt="detail">
                </span>
                <div class="intro-detail">
                    <div class="detail">
                        <p>
                            <img src="{{url('img/blog-detail/name.svg')}}" alt="name">
                            By Sarah Jordan
                        </p>
                        <p>
                            14 July, 2017
                        </p>
                        <p>
                            Web Developer
                        </p>
                    </div>
                    <h3>An Introduction To Agile Software Development</h3>
                    <p>In The State Of Utah At A Ski Resort, In February Of 2001, 17 Project Management Industry Experts Gathered For Two Days. And As A Result, They Conceived The Agile Software Development Manifesto.</p>
                    <p>In The State Of Utah At A Ski Resort, In February Of 2001, 17 Project Management Industry Experts Gathered For Two Days. And As A Result, They Conceived The Agile Software Development Manifesto.</p>
                    <div class="img-content">
                        <img src="{{url('img/blog-detail/list-detail.png')}}" alt="list-detail">
                        <ul>
                            <li>Extreme Programming</li>
                            <li>Crystal</li>
                            <li>Scrum</li>
                            <li>DSDM</li>
                            <li>FDD</li>
                            <li>Adaptive Software Development</li>
                        </ul>
                    </div>
                    <h3>The 12 Principles Of Agile Training</h3>
                    <p>There Are 12 Key Principles Of Agile That Allows Any Project To Be Called An Agile Method If It Meets All Of The Following Criteria:</p>
                    <ul>
                        <li>Customer Satisfaction</li>
                        <li>Welcome to change in requirement, regardless of how late on in the process they come.</li>
                        <li>Deliver working software regularly</li>
                        <li>Everyone must work together daily.</li>
                        <li>Maintain motivated individuals and provide a supportive environment for them</li>
                        <li>Promote a sustainable development.</li>
                    </ul>
                    <div class="feedback">
                    <p>Praesent Tempus Cursus Magna, Eget Placerat Nibh Cursus Non. Sed Accumsan Maximus Hendrerit. Suspendisse Ullamcorper Auctor Nisl Suscipit Malesuada.</p>
                    <h3 class="feedback-name">
                    John Doe
                        </h3>
                    </div>

                    <p>Agile Training Is Simple In Its Approach And Focuses On Continual Iterative Feedback At Regular Intervals Of The Project Thus Allowing For Continual Improvement And Refinement Of A Project. This Approach Is Thought To Maximise Customer Satisfaction, Improve The Flexibility Of A Project, Minimise Uncertainty And Boost Time To Market.</p>
                </div>

            </div>
            <div class="content-right">
                <div class="search-bar">
                    <div class="heading center-heading">
                        <h2>Search</h2>
                    </div>
                    <span>
                        <input type="text" placeholder="Search....." autocompleat="off" > 
                       <div class="button">
                       <img src="{{url('img/blog-detail/find.svg')}}" alt="find">
                       </div>
                    </span>
                </div>
                <div class="blog-review owl-carousel">
                    <div class="review-inner">
                            <span>
                                    <img src="{{url('img/blog-detail/testi-client.svg')}}" alt="testi-client">
                            </span>
                            <p>The Gem not just a wordpress theme. A real design jewel! The Gem not just a wordpress theme. A real design jewel!The Gem not just a wordpress theme. A real design jewel!The Gem not just a wordpress theme. A real design jewel!</p>

                            <h3 class="author">CHRISTIAN PERRY</h3>
                            <p>Web Developer</p>
                    </div>
                    <div class="review-inner">
                            <span>
                                    <img src="{{url('img/blog-detail/testi-client.svg')}}" alt="testi-client">
                            </span>
                            <p>The Gem not just a wordpress theme. A real design jewel! The Gem not just a wordpress theme. A real design jewel!The Gem not just a wordpress theme. A real design jewel!The Gem not just a wordpress theme. A real design jewel!</p>

                            <h3 class="author">CHRISTIAN PERRY</h3>
                            <p>Web Developer</p>
                    </div>
                    <div class="review-inner">
                            <span>
                                    <img src="{{url('img/blog-detail/testi-client.svg')}}" alt="testi-client">
                            </span>
                            <p>The Gem not just a wordpress theme. A real design jewel! The Gem not just a wordpress theme. A real design jewel!The Gem not just a wordpress theme. A real design jewel!The Gem not just a wordpress theme. A real design jewel!</p>

                            <h3 class="author">CHRISTIAN PERRY</h3>
                            <p>Web Developer</p>
                    </div>
                </div>
                <div class="blog-question">
                    <h2>Have Any Question? Call Us Today</h2>
                    <a tell:023 8000 1008>Call: 023 8000 1008</a>
                    <p>info@thebestpracticetraining.com</p>
                </div>
               
            </div>
            <div class="blog-navs">
                <div class="previous-nav">
                    <img src="{{url('img/blog-detail/navs-bg.png')}}" alt="navs-bg" class="bg-img">
               <p> When Did Agile Start?</p>
                    <div class="buttons">
                        <a class="btn-blue">
                        <img src="{{url('img/blog-detail/prev-nav.svg')}}" alt="prev-nav">
                            Previous Post
                        </a>
                    </div>  
                </div>
                <div class="next-nav">
                <img src="{{url('img/blog-detail/navs-bg.png')}}" alt="navs-bg" class="bg-img">
                     <p>When Did Agile Start?</p>
                     <div class="buttons">
                        <a class="btn-blue">
                            Next Post
                            <img src="{{url('img/blog-detail/next-nav.svg')}}" alt="next-nav">
                        </a>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End blog-intro section -->


<!-- Start ideal section -->
<section class="flex-conatiner ideal">
    <div class="container">
        <div class="ideal-container">
            <div class="heading center-heading">
                <h2>Whatever Your Training Needs,<span> Find Your Ideal</span> </h2>
                <p>Choose from over 200 courses which cover all aspects of
                    business and personal training, including Project Management, IT Security, Business and many more.
                    Our courses cater to every training need, from introductory crash courses to advanced and</p>
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