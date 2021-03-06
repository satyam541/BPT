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
                    <a class="search">
                        <img src="{{url('img/master/search.svg')}}" alt="search">
                    </a>
                    <a class="cart">
                        <img src="{{url('img/master/cart.svg')}}" alt="cart">
                    </a>
                    <a class="cart">
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
                    <a class="btn-blue open-popup enquiryJS">
                        <img src="{{url('img/master/quote.svg')}}" alt="quote">
                        Get a Quote
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="dropdown-menu">
            <div class="dropdown-list">
                <div class="topic-info">
                    <h3>Categories</h3>
                    <a data-target="c1"><img src="{{url('img/master/analytics.svg')}}" alt="analytics">Project Management</a>
                    <a data-target="c2"><img src="{{url('img/master/data.svg')}}" alt="data">Business Analysis</a>
                    <a data-target="c3"><img src="{{url('img/master/increase.svg')}}" alt="increase">Business Improvement</a>
                    <a data-target="c4"><img src="{{url('img/master/computer.svg')}}" alt="computer">IT Service Management</a>
                    <a data-target="c5"><img src="{{url('img/master/secure-data.svg')}}" alt="secure-data">IT Security</a>
                    <a data-target="c6"><img src="{{url('img/master/data-protection.svg')}}" alt="cv">Data Protection</a>
                    <a data-target="c6"><img src="{{url('img/master/cv.svg')}}" alt="cv">Office Applications</a>
                    <a data-target="c6"><img src="{{url('img/master/skills.svg')}}" alt="skills">Business Skills</a>
                </div>
                <div class="course-list">
                    <div class="course-content">
                        <h3>Topic</h3>
                        <div class="course" id="c1">
                            <a data-target="d1"><img src="{{url('img/master/test.svg')}}" alt="test">Agile Project Management Training</a>
                            <a data-target="d2"><img src="{{url('img/master/test.svg')}}" alt="test">Agile Project Management Training</a>
                            <a data-target="d3"><img src="{{url('img/master/test.svg')}}" alt="test">Agile Project Management Training</a>
                            <a data-target="d4"><img src="{{url('img/master/test.svg')}}" alt="test">Agile Project Management Training</a>
                            <a data-target="d5"><img src="{{url('img/master/test.svg')}}" alt="test">Agile Project Management Training</a>
                        </div>
                        <div class="course" id="c2" data-target="d2">
                            <a>Prince2 Training Course</a>
                            <a>Prince2 Training Course</a>
                            <a>Prince2 Training Course</a>
                            <a>Prince2 Training Course</a>
                        </div>
                        <div class="course" id="c3" data-target="d3">
                            <a>Prince2 Training Course</a>
                            <a>Prince2 Training Course</a>
                            <a>Prince2 Training Course</a>
                            <a>Prince2 Training Course</a>
                        </div>
                        <div class="course" id="c4" data-target="d4">
                            <a>Prince2 Training Course</a>
                            <a>Prince2 Training Course</a>
                        </div>
                        <div class="course" id="c5" data-target="d5">
                            <a>Prince2 Training Course</a>
                            <a>Prince2 Training Course</a>
                            <a>Prince2 Training Course</a>
                            <a>Prince2 Training Course</a>
                            <a>Prince2 Training Course</a>
                        </div>
                        <div class="course" id="c6" data-target="d6">
                            <a>Prince2 Training Course</a>
                            <a>Prince2 Training Course</a>
                            <a>Prince2 Training Course</a>
                        </div>
                    </div>
                </div>
                <div class="menu-list">
                    <div class="menu-content">
                            <h3>Courses</h3>
                        <div class="content" id="d1">
                            <a href="javascript:void(0);">PRINCE2® Foundation & Practitioner</a>
                            <a href="javascript:void(0);">PRINCE2® Foundation & Practitioner</a>
                            <a href="javascript:void(0);">PRINCE2® Foundation & Practitioner</a>
                            <a href="javascript:void(0);">PRINCE2® Foundation & Practitioner</a>
                            <a href="javascript:void(0);">PRINCE2® Foundation & Practitioner</a>
                            <a href="javascript:void(0);">PRINCE2® Foundation & Practitioner</a>
                        </div>
                        <div class="content" id="d2">
                            <a href="javascript:void(0);">Lean Six Sigma Green Belt</a>
                            <a href="javascript:void(0);">Lean Six Sigma Green Belt</a>
                            <a href="javascript:void(0);">Lean Six Sigma Green Belt</a>
                            <a href="javascript:void(0);">Lean Six Sigma Green Belt</a>
                        </div>
                        <div class="content" id="d3">
                            <a href="javascript:void(0);">Lean Six Sigma Green Belt</a>
                            <a href="javascript:void(0);">Lean Six Sigma Green Belt</a>
                            <a href="javascript:void(0);">Lean Six Sigma Green Belt</a>
                            <a href="javascript:void(0);">Lean Six Sigma Green Belt</a>
                            <a href="javascript:void(0);">Lean Six Sigma Green Belt</a>
                            <a href="javascript:void(0);">Lean Six Sigma Green Belt</a>
                            <a href="javascript:void(0);">Lean Six Sigma Green Belt</a>
                            <a href="javascript:void(0);">Lean Six Sigma Green Belt</a>
                        </div>
                        <div class="content" id="d4">
                            <a href="javascript:void(0);">Lean Six Sigma Green Belt</a>
                            <a href="javascript:void(0);">Lean Six Sigma Green Belt</a>
                            <a href="javascript:void(0);">Lean Six Sigma Green Belt</a>
                            <a href="javascript:void(0);">Lean Six Sigma Green Belt</a>
                            <a href="javascript:void(0);">Lean Six Sigma Green Belt</a>
                            <a href="javascript:void(0);">Lean Six Sigma Green Belt</a>
                            <a href="javascript:void(0);">Lean Six Sigma Green Belt</a>
                            <a href="javascript:void(0);">Lean Six Sigma Green Belt</a>
                            <a href="javascript:void(0);">Lean Six Sigma Green Belt</a>
                            <a href="javascript:void(0);">Lean Six Sigma Green Belt</a>
                        </div>
                        <div class="content" id="d5">
                            <a href="javascript:void(0);">Lean Six Sigma Green Belt</a>
                            <a href="javascript:void(0);">Lean Six Sigma Green Belt</a>
                            <a href="javascript:void(0);">Lean Six Sigma Green Belt</a>
                            <a href="javascript:void(0);">Lean Six Sigma Green Belt</a>
                            <a href="javascript:void(0);">Lean Six Sigma Green Belt</a>
                            <a href="javascript:void(0);">Lean Six Sigma Green Belt</a>
                            <a href="javascript:void(0);">Lean Six Sigma Green Belt</a>
                            <a href="javascript:void(0);">Lean Six Sigma Green Belt</a>
                        </div>
                        <div class="content" id="d6">
                            <a href="javascript:void(0);">Lean Six Sigma Green Belt</a>
                            <a href="javascript:void(0);">Lean Six Sigma Green Belt</a>
                            <a href="javascript:void(0);">Lean Six Sigma Green Belt</a>
                            <a href="javascript:void(0);">Lean Six Sigma Green Belt</a>
                            <a href="javascript:void(0);">Lean Six Sigma Green Belt</a>
                            <a href="javascript:void(0);">Lean Six Sigma Green Belt</a>
                            <a href="javascript:void(0);">Lean Six Sigma Green Belt</a>
                            <a href="javascript:void(0);">Lean Six Sigma Green Belt</a>
                            <a href="javascript:void(0);">Lean Six Sigma Green Belt</a>
                            <a href="javascript:void(0);">Lean Six Sigma Green Belt</a>
                        </div>
                    </div>
                </div>
            </div>
</div>