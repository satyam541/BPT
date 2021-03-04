@extends("layouts.master")
@section("content")

<!-- Start Banner Section -->
<section class="flex-container banner cart-banner">
    <div class="container">
        @include("layouts.navbar")
        <div class="banner-container">
            <h1>Cart</h1>
            <p>BPT was founded over 20 years ago with one simple mission: Finding the most trusted training courses around, at the most competitive prices. We recognise that the training marketplace is crowded.</p>
            <div class="breadcrums">
                <ul>
                    <li><a href="">Home</a></li>
                    <li><img src="{{url('img/master/breadcrum-arrow.svg')}}" alt="arrow" class="white"></li>
                    <li><a href="">Cart</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Section -->

<!-- Start empty section -->
<section class="flex-container empty">
    <div class="container">
        <div class="empty-container">
            <div class="empty-content">
            <span><img src="{{url('img/emptycart/cart-img.svg')}}" alt="cart-img"></span>
            <h3>Your Cart Is Empty</h3>
            <p>Fill it with some training courses - take a look at our catalogue.</p>
            <div class="buttons">
                <a class="btn-blue">Have a Look<img src="{{url('img/emptycart/right-arrow.svg')}}" alt="right-arrow"></a>
            </div>
        </div>
        </div>
    </div>
</section>
<!-- End empty section -->

<!-- Start empty section -->
<section class="flex-container order">
    <div class="container">
        <div class="order-main">
            <div class="heading center-heading">
                <h2>Your Order</h2>
            </div>
            <div class="inner-content">
                <div class="total-main">
                    <div class="order-heading">
                        <h2>Cart Total</h2>
                    </div>
                    <ul class="total-content">
                        <li>
                            <p>Total Course:</p>
                            <span>£ 270</span>
                        </li>
                        <li>
                            <p>Fee Per Person exc. VAT:</p>
                            <span>£ 270</span>
                        </li>
                        <li>
                            <p>Sub Total:</p>
                            <span>£ 270</span>
                        </li>
                        <li>
                            <p>Total:</p>
                            <span>£ 270</span>
                        </li>
                    </ul>
                    <div class="cards">
                        <p>We Accept</p>
                        <span><img src="{{url('img/emptycart/visa.png')}}" alt="visa"></span>
                        <span><img src="{{url('img/emptycart/master.png')}}" alt="master"></span>
                        <span><img src="{{url('img/emptycart/american.png')}}" alt="american"></span>
                    </div>
                </div>
                <div class="order-main">
                    <div class="order-courses">
                        <div class="course-name">
                            <h2>PRINCE2® Foundation and Practitioner</h2>
                            <a href="javascript:void(0);"><img src="{{url('img/emptycart/delete.svg')}}" alt="delete"></a>
                        </div>
                        <div class="course-info">
                            <div class="detail delivery-method">
                                <p class="mode">Online Mode</p>
                                <span class="icon"><img src="{{url('img/emptycart/online.svg')}}" alt="online"></span>
                            </div>
                            <div class="detail">
                                <ul>
                                    <li>
                                        <p>6 Month Access:</p>
                                        <span>£ 270 </span>
                                    </li>
                                    <li>
                                        <p>1 Year  Access: </p>
                                        <span>£ 270 </span>
                                    </li>
                                    <li>
                                        <p>Official MSP Manual:</p>
                                        <span>£ 270 </span>
                                    </li>

                                </ul>

                            </div>
                            <div class="detail counts">
                                <p>No. of Delegate (s)</p>
                                <div class="count">
                                    <a class="minus">-</a>
                                    <span class="numbers">1</span>
                                    <a class="plus">+</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="order-courses">
                        <div class="course-name">
                            <h2>PRINCE2® Foundation and Practitioner</h2>
                            <a href="javascript:void(0);"><img src="{{url('img/emptycart/delete.svg')}}" alt="delete"></a>
                        </div>
                        <div class="course-info">
                            <div class="detail delivery-method">
                                <p class="mode">Online Mode</p>
                                <span class="icon"><img src="{{url('img/emptycart/online.svg')}}" alt="online"></span>
                            </div>
                            <div class="detail">
                                <ul>
                                    <li>
                                        <p>6 Month Access:</p>
                                        <span>£ 270 </span>
                                    </li>
                                    <li>
                                        <p>1 Year  Access: </p>
                                        <span>£ 270 </span>
                                    </li>
                                    <li>
                                        <p>Official MSP Manual:</p>
                                        <span>£ 270 </span>
                                    </li>

                                </ul>

                            </div>
                            <div class="detail counts">
                                <p>No. of Delegate (s)</p>
                                <div class="count">
                                    <a class="minus">-</a>
                                    <span class="numbers">1</span>
                                    <a class="plus">+</a>
                                </div>
                            </div>
                        </div>
                    </div>
               
                </div>
            </div>
            <div class="buttons">
                <a class="btn-white">
                    Continue Shopping
                    <img src="{{url('img/emptycart/btn-right.svg')}}" alt="right-arrow">
                </a>
                <a class="btn-blue">
                    Proceed To Checkout
                    <img src="{{url('img/emptycart/btn-right.svg')}}" alt="right-arrow">
                </a>
            </div>
           
        </div>
    </div>
</section>

@endsection