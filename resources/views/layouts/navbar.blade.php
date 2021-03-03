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
                    <a data-href="#overview" class="link">Certification</a>
                    <span></span>
                </li>
                <li class="links-li">
                    <a data-href="#course" class="link">Courses</a>
                    <span></span>
                </li>
                <li class="links-li">
                    <a href ="{{route('onsite')}}"data-href="#choose" class="link">Onsite</a>
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
                        <a>{{websiteDetail()->contact_number}}</a>
                    </div>
                </li>
                <li>
                    <span>
                        <img src="{{url('img/master/email.svg')}}" alt="email">
                    </span>
                    <div class="info">
                        <p>Send Us Mail:</p>
                        <a>{{websiteDetail()->contact_email}}</a>
                    </div>
                </li>

                <li class="buttons">
                    <a class="btn-blue open-popup enquiryJS" >
                        <img src="{{url('img/master/quote.svg')}}" alt="quote">
                        Get a Quote
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>