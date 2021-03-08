<div class="navbar" id="fixheader">
    <div class="container">
        <a href="{{route('home')}}" class="bpt-logo">
            <img src="{{url('img/master/bpt-logo.svg')}}" alt="bptlogo">
        </a>
        <div class="menu" id="menuToggle" onclick="toggleMenu()">
            <img src="{{url('img/master/menu.svg')}}" alt="menu">
        </div>
        <div class="menu-links">
            <a href="javascript:void(0)" class="menu-toggle" onclick="toggleMenu()">
                <img src="{{url('img/master/back.svg')}}" alt="back"> Back
            </a>
            <ul>
                <li class="links-li">
                    <a data-href="#courses" class="link" id="menucourses">Courses</a>
                    <span></span>
                </li>
                <li class="links-li">
                    <a data-href="#overview" class="link">Certification</a>
                    <span></span>
                </li>
                <li class="links-li">
                    <a href ="{{route('onsite')}}"data-href="#choose" class="link">Onsite</a>
                    <span></span>
                </li>
                <li class="links-li">
                    <a href ="{{route('blog')}}"data-href="#blog" class="link">Blogs</a>
                    <span></span>
                </li>
                <li class="links-li">
                    <a href="{{route('aboutUs')}}" data-href="#faq" class="link">About</a>
                    <span></span>
                </li>
                <li class="links-li">
                    <a href="{{route('locations')}}" data-href="#azure-other" class="link">Locations</a>
                    <span></span>
                </li>
                <li class="links-li">
                    <a class="search" id="search">
                        <img src="{{url('img/master/search.svg')}}" alt="search">
                    </a>
                    <a class="cart">
                        <img src="{{url('img/master/cart.svg')}}" alt="cart">
                    </a>
                    <a class="cart" id="flag">
                        <img src="{{url('img/flag/uk.svg')}}" alt="cart">
                    </a>
                </li>
                
            </ul>
            <ul class="top-bar">
                <li>
                    <span>
                        <img src="{{url('img/master/call-us.svg')}}" alt="call us">
                    </span>
                    <div class="info">
                        <p>Call Us:</p>
                        <a href="tel:{{websiteDetail()->contact_number}}">{{websiteDetail()->contact_number}}</a>
                    </div>
                </li>
                <li>
                    <span>
                        <img src="{{url('img/master/email.svg')}}" alt="email">
                    </span>
                    <div class="info">
                        <p>Send Us Mail:</p>
                        <a href="mailto:{{websiteDetail()->contact_email}}">{{websiteDetail()->contact_email}}</a>
                    </div>
                </li>

                <li class="buttons">
                    <a data-type="top" class="btn-blue open-popup enquiryJS">
                        <img src="{{url('img/master/quote.svg')}}" alt="quote">
                        Get a Quote
                    </a>
                </li>
            </ul>
        </div>
        <ul class="country-list">
            <li>
                <a href="javascript:void:(0);">
                    <img src="{{url('img/flag/uk.svg')}}" alt="flag">
                    <p>London</p>
                </a>
            </li>
            <li>
                <a href="javascript:void:(0);">
                    <img src="{{url('img/flag/uk.svg')}}" alt="flag">
                    <p>London</p>
                </a>
            </li>
            <li>
                <a href="javascript:void:(0);">
                    <img src="{{url('img/flag/uk.svg')}}" alt="flag">
                    <p>London</p>
                </a>
            </li>
            <li>
                <a href="javascript:void:(0);">
                    <img src="{{url('img/flag/uk.svg')}}" alt="flag">
                    <p>London</p>
                </a>
            </li>
            <li>
                <a href="javascript:void:(0);">
                    <img src="{{url('img/flag/uk.svg')}}" alt="flag">
                    <p>London</p>
                </a>
            </li>
        </ul>
        <div class="dropdown-menu">
    <div class="dropdown-list">
        <div class="topic-info">
            <h3>Categories</h3>
            <a data-target="c1">
                <span><img src="{{url('img/master/analytics.svg')}}" alt="analytics" class="white">
            <img src="{{url('img/master/analytics-blue.svg')}}" alt="analytics-blue" class="blue"></span>Project Management</a>

            <a data-target="c2"><span><img src="{{url('img/master/data.svg')}}" alt="data" class="white"><img src="{{url('img/master/data-blue.svg')}}" alt="data-blue" class="blue"></span>Business Analysis</a>

            <a data-target="c3"><span><img src="{{url('img/master/increase.svg')}}" alt="increase" class="white">
            <img src="{{url('img/master/increase-blue.svg')}}" alt="increase-blue" class="blue"></span>Business Improvement</a>

            <a data-target="c4"><span><img src="{{url('img/master/computer.svg')}}" alt="computer" class="white">
            <img src="{{url('img/master/computer-blue.svg')}}" alt="computer-blue" class="blue"></span>IT Service Management</a>

            <a data-target="c5"><span><img src="{{url('img/master/secure-data.svg')}}" alt="secure-data" class="white">
            <img src="{{url('img/master/secure-data-blue.svg')}}" alt="secure-data" class="blue"></span>IT Security</a>

            <a data-target="c6"><span><img src="{{url('img/master/data-protection.svg')}}" alt="cv" class="white">
            <img src="{{url('img/master/data-protection-blue.svg')}}" alt="cv" class="blue"></span>Data Protection</a>

            <a data-target="c7"><span><img src="{{url('img/master/cv.svg')}}" alt="cv" class="white">
            <img src="{{url('img/master/cv-blue.svg')}}" alt="cv" class="blue"></span>Office Applications</a>

            <a data-target="c8"><span><img src="{{url('img/master/skills.svg')}}" alt="skills" class="white">
            <img src="{{url('img/master/skills-blue.svg')}}" alt="skills" class="blue"></span>Business Skills</a>
        </div>
        <div class="course-list">
            <div class="course-content">
                <h3>Topic</h3>
                <div class="course" id="c1">
                    <a data-target="d1"><span><img src="{{url('img/master/test.svg')}}" alt="test"></span>Agile Project Management Training</a>
                    <a data-target="d2"><span><img src="{{url('img/master/test.svg')}}" alt="test"></span>Agile Project Management Training</a>
                    <a data-target="d3"><span><img src="{{url('img/master/test.svg')}}" alt="test"></span>Agile Project Management Training</a>
                    <a data-target="d4"><span><img src="{{url('img/master/test.svg')}}" alt="test"></span>Agile Project Management Training</a>
                    <a data-target="d5"><span><img src="{{url('img/master/test.svg')}}" alt="test"></span>Agile Project Management Training</a>
                </div>
           
            </div>
        </div>
        <div class="menu-list">
            <div class="menu-content">
                    <h3>Courses</h3>
                <div class="menu-info" id="d1">
                    <a href="javascript:void(0);">PRINCE2® Foundation & Practitioner</a>
                    <a href="javascript:void(0);">PRINCE2® Foundation & Practitioner</a>
                    <a href="javascript:void(0);">PRINCE2® Foundation & Practitioner</a>
                    <a href="javascript:void(0);">PRINCE2® Foundation & Practitioner</a>
                    <a href="javascript:void(0);">PRINCE2® Foundation & Practitioner</a>
                    <a href="javascript:void(0);">PRINCE2® Foundation & Practitioner</a>
                </div>
              
            </div>
        </div>
    </div>
</div>
    </div>
</div>

<div class="pop-search" id="pop-search">
        <span class="search-cross"><img src="{{url('img/master/cross.svg')}}" alt="name"></span>
    <form class="search-form">
            <div class="search">
                <input type="text" placeholder="Search your course here...."  autocomplete="off">
                <button>
                    Search
                </button>
            </div>     
    </form>
</div>