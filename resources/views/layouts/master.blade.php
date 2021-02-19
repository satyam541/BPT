<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{url('style/main.css')}}">
    <link rel="stylesheet" href="{{url('style/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{url('style/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
   @yield('header')
</head>
<body>
    @yield("content")
    <footer class="flex-direction footer">
        <div class="container">
            <div class="footer-main">
                <div class="footer-content">
                    <div class="content">
                        <img src="{{url('img/master/white-bpt-logo.png')}}" alt="white-logo" class="logo-image">
                        <p>Based in the UK, Best Practice Training offers more than 1000 courses at 100+ locations. Our blended learning program includes on-line training, on-site training and classroom training.</p>
                        <div class="social-media">
                            <p>Follow Us On:</p>
                            <a href="">
                                <img src="{{url('img/master/facebook.svg')}}" alt="facebook">
                            </a>
                            <a href="">
                                <img src="{{url('img/master/twitter.svg')}}" alt="twitter">
                            </a>
                            <a href="">
                                <img src="{{url('img/master/google-plus.svg')}}" alt="google-plus">
                            </a>
                            <a href="">
                                <img src="{{url('img/master/linked-in.svg')}}" alt="linked-in">
                            </a>
                        </div>
                    </div>
                    <div class="content links">
                        <div class="heading">
                            <h2>Useful Links</h2>
                        </div>
                        <ul>
                            <li><a href=""><img src="{{url('img/master/right-arrow.svg')}}" alt="right-arrow">Our Privacy Policy</a></li>
                            <li><a href=""><img src="{{url('img/master/right-arrow.svg')}}" alt="right-arrow">Our Privacy Policy</a></li>
                            <li><a href=""><img src="{{url('img/master/right-arrow.svg')}}" alt="right-arrow">Our Privacy Policy</a></li>
                            <li><a href=""><img src="{{url('img/master/right-arrow.svg')}}" alt="right-arrow">Our Privacy Policy</a></li>
                            <li><a href=""><img src="{{url('img/master/right-arrow.svg')}}" alt="right-arrow">Our Privacy Policy</a></li>
                        </ul>
                    </div>
                    <div class="content blog">
                        <div class="heading">
                            <h2>Recent Blogs</h2>
                        </div>
                        <ul>
                            <li><img src="{{url('img/master/polygon.svg')}}" alt="polygon" class="polygon-img">
                                <a href="">When did Agile start?</a>
                                <span>
                                    <img src="{{url('img/master/time.svg')}}" alt="time">
                                    <p class="date">Aug 23, 2019</p>
                                </span>
                            </li>
                            <li><img src="{{url('img/master/polygon.svg')}}" alt="polygon" class="polygon-img">
                                <a href="">When did Agile start?</a>
                                <span>
                                    <img src="{{url('img/master/time.svg')}}" alt="time">
                                    <p class="date">Aug 23, 2019</p>
                                </span>
                            </li>
                            <li><img src="{{url('img/master/polygon.svg')}}" alt="polygon"class="polygon-img">
                                <a href="">When did Agile start?</a>
                                <span>
                                    <img src="{{url('img/master/time.svg')}}" alt="time">
                                    <p class="date">Aug 23, 2019</p>
                                </span>
                            </li>
                           
                        </ul>
                    </div>
                    <div class="content contact-us">
                            <h2>Contact Info</h2>
                        <ul>
                            <li><img src="{{url('img/master/white-call.svg')}}" alt="call">
                                <a href="">023 8000 1008</a>
                            </li>
                            <li><img src="{{url('img/master/white-email.svg')}}" alt="email">
                                <a href="">info@bestpratice.co.uk</a>
                            </li>
                            <li><img src="{{url('img/master/location.svg')}}" alt="location">
                                <p>Wessex House, Upper Market Street, Eastleigh, Hampshire, SO50 9FD.</p>
                            </li>                           
                        </ul>
                    </div>
                </div>
                <p class="terms">ITIL®, PRINCE2®, PRINCE2 Agile®, MSP®, M_o_R®, P3O®, MoP®, MoV®, RESILIA® courses on this website are offered by The Knowledge Academy, ATO of AXELOS Limited.
                ITIL®, PRINCE2®, PRINCE2 Agile®, MSP®, M_o_R®, P3O®, MoP®, MoV®, RESILIA® are registered trade marks of AXELOS Limited. All rights reserved.
                Best Practice Training Limited. Company No. 07504204 Vat Registration No. 128747290</p>
            </div>
        </div>
    </footer>

</body>

<script src="{{url('script/jquery-3.3.1.min.js')}}"></script>
<script src="{{url('script/owl.carousel.min.js')}}"></script>
<script src="{{url('script/main.js')}}"></script>
<script src="{{url('script/count.js')}}"></script>
@yield('footerscripts')
</html>