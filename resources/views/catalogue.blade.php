@extends("layouts.master")
@section("content")

<!-- Start Banner Section -->
<section class="flex-container banner catalogue-banner">
    <div class="container">
        @include("layouts.navbar")
        <div class="banner-container">
            <div class="banner-text">
                <h1>{!!$pageDetail->banner['header']->heading!!}</h1>
                <p>{!!$pageDetail->banner['header']->content!!}</p>
                <div class="breadcrums">
                    <ul>
                        <li><a href="javascript:void(0);">Home</a></li>
                        <img src="{{url('img/master/breadcrum-arrow.svg')}}" alt="breadcrums" class="white">
                        <li><a href="">Category</a></li>
                    </ul>
                </div>
            </div>
            <div class="banner-testi">
                <div class="testi-list owl-carousel">
                    @foreach ($popularTopics as $popularTopic)
                    <div class="testi-content">
                        <span>
                            <img src="{{url('img/catalogue/homework-white.svg')}}" alt="homework">
                        </span>
                        <h3>{{$popularTopic->name}}</h3>
                        <div class="buttons">
                            <a href="{{url('training-courses'.$popularTopic->reference)}}" class="btn-white open-popup enquiryJS" data-quote="View Detail">
                                <img src="{{url('img/catalogue/view-black.svg')}}" alt="view">View Detail
                            </a>
                        </div>
                    </div>
                    @endforeach
                   
                </div>
            </div>
        </div>
        <div class="filter-top">
                <form action="{{route('commonFilter')}}"  method='post'  class="form">
                    @csrf
                    <div class="select-dropdown">
                        <p>Select A Category</p>
                        <select name="course">
                            <option value="">Select Category</option>
                            @foreach ($categoriesList as $id=>$name)
                           
                            <option value="{{$id}}">{{$name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="select-dropdown">
                        <p>Select A Topic</p>
                        <select name="course">
                            <option value="">Select Topic</option>
                            @foreach ($topics as $topicList)
                            <option value="{{$topicList->id}}">{{$topicList->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="select-dropdown">
                        <p>Search</p>
                        <input type="text" placeholder="Search Course here">
                        <button class="select-search">
                            <img src="{{url('img/catalogue/magnifying.svg')}}" alt="magnifying">
                        </button>
                    </div>
                </form>
            </div>
    </div>
</section>
<!-- End Banner Section -->

<!-- Start Category Section -->
<section class="flex-container category">
    <div class="container">
        <div class="category-container">
            <div class="heading center-heading">
                <h2>{!! heading_split($pageDetail->category['heading']->heading) !!}</h2>
            </div>
            <div class="category-list">
                @foreach ($categories as $category)
                <div class="category-content">
                    <span>
                        <img src="{{$category->getIconPath()}}" alt="{{$category->name}}">
                    </span>
                    <h3>{{$category->name}}</h3>
                </div>
                @endforeach
            
            </div>
        </div>
    </div>
</section>
<!-- End Category Section -->

<!-- Start Category-Enquire Section -->
<section class="flex-container category-enquire">
    <div class="container">
        <div class="enquire-container">
            <div class="enquire-content">
                <h2>{!!$pageDetail->category_enquire['enquire_content']->heading!!}</h2>
                <p>{!!$pageDetail->category_enquire['enquire_content']->content!!}</p>
            </div>
            <div class="buttons">
                <div class="btn-white open-popup enquiryJS" data-quote="Enquire Now">
                    <img src="{{url('img/catalogue/email-black.svg')}}" alt="email">Enquire Now
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Start Category-Enquire Section -->

<!-- Start Popular-Courses Section -->
<section class="flex-container popular-courses">
    <div class="container">
        <div class="popular-container">
            <div class="popular-content">
                <div class="heading">
                    <h2>{!! heading_split($pageDetail->popular_course['heading']->heading) !!}</h2>
                </div>
                <div class="popular-list">
                    @foreach ($popularCourses as $popularCourse)
                    <a href="{{url('training-courses'.$popularCourse->reference)}}" class="popular-item">
                        <span>0{{$loop->iteration}}</span>
                        <h3>{{$popularCourse->name}}</h3>
                    </a>
                    @endforeach
                
                </div>
                <div class="buttons">
                    <a href="javascript:void(0);" class="btn-blue open-popup enquiryJS" data-quote="Find Out More">
                        <img src="{{url('img/catalogue/find.svg')}}" alt="find">Find Out More
                    </a>
                </div>
            </div>
            <div class="popular-facts">
                <div class="total-users">
                    <div class="total-content">
                        <span>
                            <img src="{{url('img/catalogue/users.svg')}}" alt="users">
                        </span>
                        <div class="total-text">
                            <p>Users</p>
                            <h3>11,256+</h3>
                        </div>
                    </div>
                    <span class="building">
                        <img src="{{url('img/catalogue/building.png')}}" alt="building">
                    </span>
                </div>
                <div class="new-users">
                    <span class="caller">
                        <img src="{{url('img/catalogue/caller.png')}}" alt="caller">
                    </span>
                    <div class="new-content">
                        <span class="group">
                            <img src="{{url('img/catalogue/teamwork.svg')}}" alt="teamwork">
                        </span>
                        <div class="users-content">
                            <h3>76%</h3>
                            <p>New Users</p>
                        </div>
                        <div class="users-content">
                            <h3>23%</h3>
                            <p>Repeat Users</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Start Popular-Courses Section -->

<!-- Start Library Section -->
<section class="flex-container library">
    <div class="container">
        <div class="library-container">
            <div class="heading">
                <h2>{!! heading_split($pageDetail->topics['heading']->heading) !!}</h2>
            </div>
            <div class="library-list">
                @foreach ($topics as $topic)
                <div class="library-content">
                    <div class="name">
                        <span>
                            <img src="{{url('img/catalogue/analytics.svg')}}" alt="analytics">
                        </span>
                        <a href="javascript:void(0);">{{$topic->name}}</a>
                    </div>
                    <ul>
                        @foreach ($topic->courses as $course)
                        <li><a href="{{url('training-courses'.$course->reference)}}">{{$course->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
                @endforeach
            
            </div>
        </div>
    </div>
</section>
<!-- Start Library Section -->

<!-- Start Figures Section -->
<section class="flex-container figures">
    <div class="container">
        <div class="figures-container">
            <div class="heading center-heading">
                <h2>{!!heading_split($pageDetail->figures_list['heading']->heading)!!}</span></h2>
            </div>
            @php
                unset($pageDetail->figures_list['heading'])
            @endphp
            <div class="figures-list">
                @foreach ($pageDetail->figures_list as $item)
               
                <div class="figures-content">
                    <span class="figures-image">
                        <img src="{{$item->getImagePath()}}" alt="{{$item->imageAlt}}">
                    </span>
                    <div class="facts-count">
                        <h3 class="count-number" data-to="{!!$item->heading!!}" data-speed="3000"></h3>
                        <span>+</span>
                    </div>
                    <p>{!!$item->content!!}</p>
                </div>
                @endforeach
        </div>
    </div>
</section>
<!-- Start Figures Section -->

@endsection