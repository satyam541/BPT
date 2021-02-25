@extends("layouts.master")
@section("content")

<!-- Start Banner Section -->
<section class="flex-container banner catalouge-banner">
    <div class="container">
        @include("layouts.navbar")
        <div class="banner-container">
            <div class="banner-text">
                <h1>Course Library</h1>
                <p>BPT was founded over 20 years ago with one simple mission: Finding the most trusted training courses around, at the most competitive prices. We recognise that the training marketplace is crowded.BPT was founded over 20 years ago with one simple mission.BPT was founded over 20 years ago with one simple mission.</p>
                <div class="breadcrums">
                    <ul>
                        <li><a href="javascript:void(0);">Home</a></li>
                        <img src="{{url('img/master/breadcrum-arrow.svg')}}" alt="breadcrums">
                        <li><a href="">Category</a></li>
                    </ul>
                </div>
            </div>
            <div class="banner-testi">
                <div class="testi-list owl-carousel">
                    <div class="testi-content white">
                        <span>
                            <img src="{{url('img/catalouge/homework-white.svg')}}" alt="homework">
                        </span>
                        <h3>Prince2 Foundation</h3>
                        <div class="buttons">
                            <a href="javascript:void(0);" class="btn-white open-popup enquiryJS" data-quote="View Detail">
                                <img src="{{url('img/catalouge/view-black.svg')}}" alt="view">View Detail
                            </a>
                        </div>
                    </div>
                    <div class="testi-content black">
                        <span>
                            <img src="{{url('img/catalouge/homework-black.svg')}}" alt="homework">
                        </span>
                        <h3>Prince2 Foundation</h3>
                        <div class="buttons">
                            <a href="javascript:void(0);" class="btn-blue open-popup enquiryJS" data-quote="View Detail">
                                <img src="{{url('img/catalouge/view-white.svg')}}" alt="view">View Detail
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="filter-top">
                <form class="form">
                    <div class="select-dropdown">
                        <p>Select A Category</p>
                        <select name="course">
                            <option value="">Prince2@Training</option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="select-dropdown">
                        <p>Select A Topic</p>
                        <select name="course">
                            <option value="">Prince2@Training</option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="select-dropdown">
                        <p>Search</p>
                        <input type="text" placeholder="Search course here">
                        <span>
                            <img src="{{url('img/catalouge/magnifying.svg')}}" alt="magnifying">
                        </span>
                    </div>
                </form>
            </div>
    </div>
</section>
<!-- End Banner Section -->

<!-- Start Category Section -->
<section class="flex-container category">
    <div class="category-container">
        <div class="heading center-heading">
            <h2>All <span>Category</span></h2>
        </div>
        <div class="category-list">
            <div class="category-content">
                <span>
                    <img src="{{url('img/catalouge/project.svg')}}" alt="project">
                </span>
                <h3>Project Management</h3>
            </div>
            <div class="category-content">
                <span>
                    <img src="{{url('img/catalouge/analysis.svg')}}" alt="analysis">
                </span>
                <h3>Business Analysis</h3>
            </div>
            <div class="category-content">
                <span>
                    <img src="{{url('img/catalouge/improvement.svg')}}" alt="improvement">
                </span>
                <h3>Business Improvement</h3>
            </div>
            <div class="category-content">
                <span>
                    <img src="{{url('img/catalouge/service.svg')}}" alt="service">
                </span>
                <h3>IT Service Management</h3>
            </div>
            <div class="category-content">
                <span>
                    <img src="{{url('img/catalouge/security.svg')}}" alt="security">
                </span>
                <h3>IT Security</h3>
            </div>
            <div class="category-content">
                <span>
                    <img src="{{url('img/catalouge/protection.svg')}}" alt="protection">
                </span>
                <h3>Data Protection</h3>
            </div>
            <div class="category-content">
                <span>
                    <img src="{{url('img/catalouge/office.svg')}}" alt="office">
                </span>
                <h3>Office Applications</h3>
            </div>
            <div class="category-content">
                <span>
                    <img src="{{url('img/catalouge/skills.svg')}}" alt="skills">
                </span>
                <h3>Business Skills</h3>
            </div>
        </div>
    </div>
</section>
<!-- End Category Section -->

<!-- Start Have Section -->
<section class="flex-container have">
    <div class="container">
        <div class="have-container">
            <div class="have-content">
                <h2>Have Any Enquiry?</h2>
                <p>BPT was founded over 20 years ago with one simple mission: Finding the most trusted training courses around, at the most competitive prices. We recognise that the training marketplace is crowded, and it can be difficult to know which provider offers the most value.</p>
            </div>
            <div class="buttons">
                <div class="btn-white open-popup enquiryJS" data-quote="Enquire Now">
                    <img src="{{url('img/catalouge/email-black.svg')}}" alt="email">Enquire Now
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Start Have Section -->

<!-- Start Popular-Courses Section -->
<section class="flex-container popular-courses">
    <div class="container">
        <div class="popular-container">
            <div class="popular-content">
                <div class="heading">
                    <h2>Popular <span>Courses</span></h2>
                </div>
                <div class="popular-list">
                    <div class="popular-item">
                        <span>01</span>
                        <a>Prince2 Foundation Prince</a>
                    </div>
                    <div class="popular-item">
                        <span>02</span>
                        <a>Prince2 Foundation Prince</a>
                    </div>
                    <div class="popular-item">
                        <span>03</span>
                        <a>Prince2 Foundation Prince</a>
                    </div>
                    <div class="popular-item">
                        <span>04</span>
                        <a>Prince2 Foundation Prince</a>
                    </div>
                    <div class="popular-item">
                        <span>05</span>
                        <a>Prince2 Foundation Prince</a>
                    </div>
                    <div class="popular-item">
                        <span>06</span>
                        <a>Prince2 Foundation Prince</a>
                    </div>
                </div>
                <div class="buttons">
                    <a href="javascript:void(0);" class="btn-blue open-popup enquiryJS" data-quote="Find Out More">
                        <img src="{{url('img/catalouge/find.svg')}}" alt="find">Find Out More
                    </a>
                </div>
            </div>
            <div class="popular-facts">
                <div class="total-users">
                    <div class="total-content">
                        <span>
                            <img src="{{url('img/catalouge/users.svg')}}" alt="users">
                        </span>
                        <div class="total-text">
                            <p>Users</p>
                            <h3>11,256+</h3>
                        </div>
                    </div>
                    <span class="building">
                        <img src="{{url('img/catalouge/building.png')}}" alt="building">
                    </span>
                </div>
                <div class="new-users">
                    <span class="caller">
                        <img src="{{url('img/catalouge/caller.png')}}" alt="caller">
                    </span>
                    <div class="new-content">
                        <span class="group">
                            <img src="{{url('img/catalouge/teamwork.svg')}}" alt="teamwork">
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
                <h2>Courses <span>Library</span></h2>
            </div>
            <div class="library-list">
                <div class="library-content">
                    <div class="name">
                        <span>
                            <img src="{{url('img/catalouge/analytics.svg')}}" alt="analytics">
                        </span>
                        <a href="javascript:void(0);">PRINCE2® Training</a>
                    </div>
                    <ul>
                        <li>Prince2 Foundation</li>
                        <li>Prince2 Foundation</li>
                        <li>Prince2 Foundation</li>
                        <li>Prince2 Foundation</li>
                        <li>Prince2 Foundation</li>
                        <li>Prince2 Foundation</li>
                        <li>Prince2 Foundation</li>
                        <li>Prince2 Foundation</li>
                        <li>Prince2 Foundation</li>
                    </ul>
                </div>
                <div class="library-content">
                    <div class="name">
                        <span>
                            <img src="{{url('img/catalouge/analytics.svg')}}" alt="analytics">
                        </span>
                        <a href="javascript:void(0);">PRINCE2® Training</a>
                    </div>
                    <ul>
                        <li>Prince2 Foundation</li>
                        <li>Prince2 Foundation</li>
                        <li>Prince2 Foundation</li>
                        <li>Prince2 Foundation</li>
                        <li>Prince2 Foundation</li>
                        <li>Prince2 Foundation</li>
                        <li>Prince2 Foundation</li>
                        <li>Prince2 Foundation</li>
                        <li>Prince2 Foundation</li>
                    </ul>
                </div>
                <div class="library-content">
                    <div class="name">
                        <span>
                            <img src="{{url('img/catalouge/analytics.svg')}}" alt="analytics">
                        </span>
                        <a href="javascript:void(0);">PRINCE2® Training</a>
                    </div>
                    <ul>
                        <li>Prince2 Foundation</li>
                        <li>Prince2 Foundation</li>
                        <li>Prince2 Foundation</li>
                        <li>Prince2 Foundation</li>
                        <li>Prince2 Foundation</li>
                        <li>Prince2 Foundation</li>
                        <li>Prince2 Foundation</li>
                        <li>Prince2 Foundation</li>
                        <li>Prince2 Foundation</li>
                    </ul>
                </div>
                <div class="library-content">
                    <div class="name">
                        <span>
                            <img src="{{url('img/catalouge/analytics.svg')}}" alt="analytics">
                        </span>
                        <a href="javascript:void(0);">PRINCE2® Training</a>
                    </div>
                    <ul>
                        <li>Prince2 Foundation</li>
                        <li>Prince2 Foundation</li>
                        <li>Prince2 Foundation</li>
                        <li>Prince2 Foundation</li>
                        <li>Prince2 Foundation</li>
                        <li>Prince2 Foundation</li>
                        <li>Prince2 Foundation</li>
                        <li>Prince2 Foundation</li>
                        <li>Prince2 Foundation</li>
                    </ul>
                </div>
                <div class="library-content">
                    <div class="name">
                        <span>
                            <img src="{{url('img/catalouge/analytics.svg')}}" alt="analytics">
                        </span>
                        <a href="javascript:void(0);">PRINCE2® Training</a>
                    </div>
                    <ul>
                        <li>Prince2 Foundation</li>
                        <li>Prince2 Foundation</li>
                        <li>Prince2 Foundation</li>
                        <li>Prince2 Foundation</li>
                        <li>Prince2 Foundation</li>
                        <li>Prince2 Foundation</li>
                        <li>Prince2 Foundation</li>
                        <li>Prince2 Foundation</li>
                        <li>Prince2 Foundation</li>
                    </ul>
                </div>
                <div class="library-content">
                    <div class="name">
                        <span>
                            <img src="{{url('img/catalouge/analytics.svg')}}" alt="analytics">
                        </span>
                        <a href="javascript:void(0);">PRINCE2® Training</a>
                    </div>
                    <ul>
                        <li>Prince2 Foundation</li>
                        <li>Prince2 Foundation</li>
                        <li>Prince2 Foundation</li>
                        <li>Prince2 Foundation</li>
                        <li>Prince2 Foundation</li>
                        <li>Prince2 Foundation</li>
                        <li>Prince2 Foundation</li>
                        <li>Prince2 Foundation</li>
                        <li>Prince2 Foundation</li>
                    </ul>
                </div>
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
                <h2>Our Amazing <span>Facts and Figures</span></h2>
            </div>
            <div class="figures-list">
                <div class="figures-content">
                    <span class="figures-image">
                        <img src="{{url('img/catalouge/daily.svg')}}" alt="daily">
                    </span>
                    <div class="facts-count">
                        <h3 class="count-number" data-to="230" data-speed="3000"></h3>
                        <span>+</span>
                    </div>
                    <p>Courses Running Daily</p>
                </div>
                <div class="figures-content">
                    <span class="figures-image">
                        <img src="{{url('img/catalouge/worldwide.svg')}}" alt="worldwide">
                    </span>
                    <div class="facts-count">
                        <h3 class="count-number" data-to="150" data-speed="3000"></h3>
                        <span>+</span>
                    </div>
                    <p>Locations Worldwide</p>
                </div>
                <div class="figures-content">
                    <span class="figures-image">
                        <img src="{{url('img/catalouge/events.svg')}}" alt="events">
                    </span>
                    <div class="facts-count">
                        <h3 class="count-number" data-to="670" data-speed="3000"></h3>
                        <span>+</span>
                    </div>
                    <p>Events</p>
                </div>
                <div class="figures-content">
                    <span class="figures-image">
                        <img src="{{url('img/catalouge/daily.svg')}}" alt="daily">
                    </span>
                    <div class="facts-count">
                        <h3 class="count-number" data-to="80" data-speed="3000"></h3>
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