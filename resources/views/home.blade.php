@extends("layouts.master")

@section("content")

<section class="flex-container banner">
    
    <div class="container">
            @include("layouts.navbar")
            <div class="banner-container">
                <div class="banner-content">
                        <h1>
                            Whatever Your Training Needs, Find Your Ideal Course with Us
                        </h1>
                        <p>
                            Choose from over 200 courses which cover all aspects of business and personal training, including Project Management, IT Security, Business and many more. 
                            Our courses cater to every training need, from introductory crash courses to advanced and prestigious qualifications, all to the highest standard of quality.

                        </p>
                        <div class="search">
                            <input type="text" placeholder="Search your training course here....">
                            <button>
                                Search
                            </button>
                        </div>
                        <div class="buttons">
                                <a class="btn-blue">
                                    <img src="{{url('img/master/book.svg')}}" alt="book">
                                    Course catalogue
                                </a>
                        </div>
                </div>
                <div class="topic-list owl-carousel">
                    <ul>
                        <li>
                            <a>
                            <img src="{{url('img/master/open-book.svg')}}" alt="book">
                            <p>
                                PRINCE training
                                <span>prince training</span>
                            </p>
                            <img src="{{url('img/master/arrow.svg')}}" alt="arrow">
                            </a>
                        </li>
                        <li>
                            <a>
                            <img src="{{url('img/master/open-book.svg')}}" alt="book">
                            <p>
                                PRINCE training
                                <span>prince training</span>
                            </p>
                            <img src="{{url('img/master/arrow.svg')}}" alt="arrow">
                            </a>
                        </li>
                        <li>
                            <a>
                            <img src="{{url('img/master/open-book.svg')}}" alt="book">
                            <p>
                                PRINCE training
                                <span>prince training</span>
                            </p>
                            <img src="{{url('img/master/arrow.svg')}}" alt="arrow">
                            </a>
                        </li>
                        <li>
                            <a>
                            <img src="{{url('img/master/open-book.svg')}}" alt="book">
                            <p>
                                PRINCE training
                                <span>prince training</span>
                            </p>
                            <img src="{{url('img/master/arrow.svg')}}" alt="arrow">
                            </a>
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <a>
                            <img src="{{url('img/master/open-book.svg')}}" alt="book">
                            <p>
                                PRINCE training
                                <span>prince training</span>
                            </p>
                            <img src="{{url('img/master/arrow.svg')}}" alt="arrow">
                            </a>
                        </li>
                        <li>
                            <a>
                            <img src="{{url('img/master/open-book.svg')}}" alt="book">
                            <p>
                                PRINCE training
                                <span>prince training</span>
                            </p>
                            <img src="{{url('img/master/arrow.svg')}}" alt="arrow">
                            </a>
                        </li>
                        <li>
                            <a>
                            <img src="{{url('img/master/open-book.svg')}}" alt="book">
                            <p>
                                PRINCE training
                                <span>prince training</span>
                            </p>
                            <img src="{{url('img/master/arrow.svg')}}" alt="arrow">
                            </a>
                        </li>
                        <li>
                            <a>
                            <img src="{{url('img/master/open-book.svg')}}" alt="book">
                            <p>
                                PRINCE training
                                <span>prince training</span>
                            </p>
                            <img src="{{url('img/master/arrow.svg')}}" alt="arrow">
                            </a>
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <a>
                            <img src="{{url('img/master/open-book.svg')}}" alt="book">
                            <p>
                                PRINCE training
                                <span>prince training</span>
                            </p>
                            <img src="{{url('img/master/arrow.svg')}}" alt="arrow">
                            </a>
                        </li>
                        <li>
                            <a>
                            <img src="{{url('img/master/open-book.svg')}}" alt="book">
                            <p>
                                PRINCE training
                                <span>prince training</span>
                            </p>
                            <img src="{{url('img/master/arrow.svg')}}" alt="arrow">
                            </a>
                        </li>
                        <li>
                            <a>
                            <img src="{{url('img/master/open-book.svg')}}" alt="book">
                            <p>
                                PRINCE training
                                <span>prince training</span>
                            </p>
                            <img src="{{url('img/master/arrow.svg')}}" alt="arrow">
                            </a>
                        </li>
                        <li>
                            <a>
                            <img src="{{url('img/master/open-book.svg')}}" alt="book">
                            <p>
                                PRINCE training
                                <span>prince training</span>
                            </p>
                            <img src="{{url('img/master/arrow.svg')}}" alt="arrow">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

</section>
<section class="flex-container courses">
    <div class="container">
        <div class="courses-container">
            <div class="heading">
                <h2>Professional Skills For
                    <span>
                        The Digital World
                    </span>
                </h2>
            </div>
            <div class="courses-list">
                <div class="course-name">
                    <span>
                        <img src="{{url('img/home/topic-icon.svg')}}" alt="topic-icon">
                    </span>
                    <div class="name">
                        <h3>
                            Project Management
                        </h3>
                        <p>
                            5 Topics
                        </p>
                        <p>
                            10 Courses
                        </p>
                    </div>
                    <a>
                        <img src="{{url('img/home/right-arrow.svg')}}" alt="right-arrow">
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection