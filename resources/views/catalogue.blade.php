@extends("layouts.master")
@section('content')
    <!-- Start Banner Section -->
    <section class="flex-container banner catalogue-banner">
        <div class="container">
            @include("layouts.navbar")
            <div class="banner-container">
                <div class="banner-text">
                    <h1>{!! $pageDetail->banner['header']->heading !!}</h1>
                    <p>{!! $pageDetail->banner['header']->content !!}</p>
                    <div class="breadcrums">
                        <ul>
                            <li><a href="{{route('home')}}">Home</a></li>
                            <img src="{{ url('img/master/breadcrum-arrow.svg') }}" alt="breadcrums" class="white">
                            <li><a href="">Catalogue</a></li>
                        </ul>
                    </div>
                </div>
                <div class="banner-testi">
                    <div class="testi-list owl-carousel">
                        @foreach ($popularTopics as $popularTopic)
                            <div class="testi-content">
                                <span>
                                    <img src="{{ url('img/catalogue/homework-white.svg') }}" alt="homework" class="white">
                                    <img src="{{ url('img/catalogue/homework-black.svg') }}" alt="homework" class="black">
                                </span>
                                <a href="javascript:void(0);" class="name">{{ $popularTopic->name }}</a>
                                <div class="buttons">
                                    <a href="{{$popularTopic->url}}" class="btn-blue">
                                       <img src="{{ url('img/catalogue/view-black.svg') }}" alt="view" class="black">
                                        <img src="{{ url('img/catalogue/view-white.svg') }}" alt="view" class="white">View Detail
                                    </a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="filter-top">
                <form action="{{ route('commonFilter') }}" method='post' class="form exclude">
                    @csrf
                    <div class="select-dropdown">
                        <p>Select a Category</p>
                        <select name="category" id="categorySelect">
                            <option value="">Select Category</option>
                            @foreach ($categoriesList as $id => $name)

                                <option value="{{ $id }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="select-dropdown">
                        <p>Select a Topic</p>
                        <select name="topic" id="topicSelect">
                            <option value="">Select Topic</option>
                            @foreach ($topics as $topicList)
                                <option value="{{ $topicList->id }}">{{ $topicList->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="select-dropdown">
                        <p>Select a Course</p>
                        <select name="course" id="courseSelect">
                            <option value="">Select Course</option>

                            @foreach ($courses as $id => $course)
                                <option value="{{ $id }}">{{ $course }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="buttons">
                        <button type="submit" class="btn-blue">Search</button>
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
                        <div class="category-content pointer" onclick="location.href = '{{$category->url }}';">
                            <span>
                                <img src="{{ $category->getImagePath() }}" alt="{{ $category->name }}" class="blue">
                                <img src="{{ $category->getIconPath() }}" alt="{{ $category->name }}" class="white">
                            </span>
                            <h3>{{ $category->name }}</h3>
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
                    <h2>{!! $pageDetail->category_enquire['enquire_content']->heading !!}</h2>
                    <p>{!! $pageDetail->category_enquire['enquire_content']->content !!}</p>
                </div>
                <div class="buttons">
                    <div class="btn-white open-popup enquiryJS" data-quote="Enquire Now" data-heading="Enquire Now" data-type="other">
                        <img src="{{ url('img/catalogue/email-black.svg') }}" alt="email">Enquire Now
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
                            <a href="{{$popularCourse->url }}" class="popular-item">
                                <span>0{{ $loop->iteration }}</span>
                                <h3>{{ $popularCourse->name }}</h3>
                            </a>
                        @endforeach

                    </div>
                    <div class="buttons">
                        <a href="javascript:void(0);" class="btn-blue open-popup enquiryJS" data-quote="Find Out More" data-heading="Find Out More" data-type="other">
                            <img src="{{ url('img/catalogue/find.svg') }}" alt="find">Find Out More
                        </a>
                    </div>
                </div>
                <div class="popular-facts">
                    <div class="total-users">
                        <div class="total-content">
                            <span>
                                <img src="{{ url('img/catalogue/users.svg') }}" alt="users">
                            </span>
                            <div class="total-text">
                                <p>Total Learners </p>
                                <h3>600K+</h3>
                            </div>
                        </div>
                        <span class="building">
                            <img src="{{ url('img/catalogue/building.png') }}" alt="building">
                        </span>
                    </div>
                    <div class="new-users">
                        <span class="caller">
                            <img src="{{ url('img/catalogue/caller.png') }}" alt="caller">
                        </span>
                        <div class="new-content">
                            <span class="group">
                                <img src="{{ url('img/catalogue/teamwork.svg') }}" alt="teamwork">
                            </span>
                            <div class="users-content">
                                <h3>54%</h3>
                                <p>New Users </p>
                            </div>
                            <div class="users-content">
                                <h3>46%</h3>
                                <p>Repeat Users </p>
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
                                    <img src="{{ url('img/catalogue/analytics.svg') }}" alt="analytics">
                                </span>
                                <a href="{{$topic->url }}">{{ $topic->name }}</a>
                            </div>
                            <ul>
                                @foreach ($topic->courses as $course)
                                    <li><a
                                            href="{{$course->url }}">{{ $course->name }}</a>
                                    </li>
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
                    <h2>{!! heading_split($pageDetail->figures_list['heading']->heading) !!}</span></h2>
                </div>
                @php
                    unset($pageDetail->figures_list['heading']);
                @endphp
                  @php $statsdata=statsData()  @endphp
                  <div class="figures-list">
                      
                      <div class="figures-content">
                          <span class="figures-image">
                              <img src="{{url('img/catalogue/daily.svg')}}" alt="running">
                          </span>
                          <div class="facts-count">
                              <h3 class="count-number" data-to="{{$statsdata->stats['course_running_daily']->content}}" data-speed="3000">{!!$statsdata->stats['course_running_daily']->content!!}</h3>
                              <span>+</span>
                          </div>
                          <p>Courses Running Daily</p>
                      </div>
                  
                      <div class="figures-content">
                          <span class="figures-image">
                              <img src="{{url('img/catalogue/worldwide.svg')}}" alt="worldwide">
                          </span>
                          <div class="facts-count">
                              <h3 class="count-number" data-to="{{$statsdata->stats['locations_world_wide']->content}}" data-speed="3000">{!!$statsdata->stats['locations_world_wide']->content!!}</h3>
                              <span>+</span>
                          </div>
                          <p>Locations Worldwide</p>
                      </div>
                  
                      <div class="figures-content">
                          <span class="figures-image">
                              <img src="{{url('img/catalogue/trainer-icon.svg')}}" alt="trainers">
                          </span>
                          <div class="facts-count">
                              <h3 class="count-number" data-to="{{$statsdata->stats['trainers']->content}}" data-speed="3000">{!!$statsdata->stats['trainers']->content!!}</h3>
                              <span>+</span>
                          </div>
                          <p>Certified Trainers</p>
                      </div>
                  
                      <div class="figures-content">
                          <span class="figures-image">
                              <img src="{{url('img/catalogue/countries.svg')}}" alt="countries">
                          </span>
                          <div class="facts-count">
                              <h3 class="count-number" data-to="{{$statsdata->stats['countries']->content}}" data-speed="3000">{{$statsdata->stats['countries']->content}}</h3>
                              <span>+</span>
                          </div>
                          <p>Countries</p>
                      </div>
                                  </div>
              </div>
            </div>
    </section>
    <!-- Start Figures Section -->

@endsection

@section('footerScripts')
    <script>
        var categoryId = topicId = courseId = '';

        $(document).ready(function() {

            $("#categorySelect").change(function() {
                categoryId = $(this).val();
                console.log(categoryId);
                getTopic(categoryId);

            });

            function getTopic(categoryId) {

                $.ajax({
                    method: "POST",
                    url: "{{ route('filterTopic') }}",
                    data: {
                        categoryId,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'JSON',
                    beforeSend: function(xhr) {

                    },
                    success: function(res) {

                        var topics = res.topics;
                        var courses = res.courses;

                        var topic = '<option value="">Select Topic</option>';
                        var course = '<option value="">Select Course</option>';

                        if (topics) {
                            $.each(topics, function(id, object){
                                console.log(object.name);
                                topic += '<option value="' + object.id + '">' + object.name +
                                    '</option>';
                            })

                            $('#topicSelect').html(topic);
                            // $('#topics').show();

                            $("#topicSelect").attr("name", "topic");
                        } else {
                            var topic = '<option value="">Topic not Found</option>';
                        }

                        if (courses) {
                            $.each(courses, function(id, object){
                                console.log(object.name);
                                course += '<option value="' + object.id + '">' + object.name +
                                    '</option>';
                            })

                            $('#courseSelect').html(course);
                            // $('#topics').show();

                            $("#courseSelect").attr("name", "course");
                        } else {
                            var course = '<option value="">Course not Found</option>';
                        }

                    },
                });


            }

            $("#topicSelect").change(function() {
                topicId = $(this).val();
                getCourse(topicId);
            });

            function getCourse(topicId) {

                $.ajax({
                    method: "POST",
                    url: "{{ route('filterCourse') }}",
                    data: {
                        topicId,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'JSON',
                    beforeSend: function(xhr) {

                    },
                    success: function(res) {

                        var jsonData = res;
                        var course = '<option value="">Select Course</option>';

                        var length = jsonData.length;
                        if (length > 0) {
                            for (var i = 0; i < length; i++) {

                                course += '<option value="' + jsonData[i].id + '">' + jsonData[i].name +
                                    '</option>';
                            }

                            $('#courseSelect').html(course);
                            // $('#courses').show();

                            $("#courseSelect").attr("name", "course");
                        } else {
                            var course = '<option value="">Course not Found</option>';
                        }

                    },
                });


            }

        });

    </script>

@endsection
