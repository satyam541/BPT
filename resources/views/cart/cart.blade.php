@extends("layouts.master")
@section('content')

    <!-- Start Banner Section -->
    <section class="flex-container banner cart-banner">
        <div class="container">
            @include("layouts.navbar")
            <div class="banner-container">
                <h1>Cart</h1>
                <p>Check what is in your cart here. Fetch all the information about every item, including its date, delivery method, number of delegates, and cost of each course. </p>
                <div class="breadcrums">
                    <ul>
                        <li><a href="{{route('home')}}">Home</a></li>
                        <li><img src="{{ url('img/master/breadcrum-arrow.svg') }}" alt="arrow" class="white"></li>
                        <li><a href="">Cart</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Section -->
    @if ($cartItems->isEmpty())
        <!-- Start empty section -->
        <section class="flex-container empty">
            <div class="container">
                <div class="empty-container">
                    <div class="empty-content">
                        <span><img src="{{ url('img/emptycart/cart-img.svg') }}" alt="cart-img"></span>
                        <h3>Your Cart is Empty</h3>
                        <p>Add training courses to fill it now – click on the below button to check our course catalogue.</p>
                        <div class="buttons">
                            <a href="{{route('catalogue')}}" class="btn-blue">Have a Look<img src="{{ url('img/emptycart/right-arrow.svg') }}"
                                    alt="right-arrow"></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End empty section -->
    @else
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
                                    <p>Total Items:</p>
                                    <span>{{ count($cartItems) }}</span>
                                </li>
                                {{-- <li>
                                    <p>Fee Per Person exc. VAT:</p>
                                    <span>£ 270</span>
                                </li> --}}
                                {{-- <li>
                                    <p>Sub Total:</p>
                                    <span>{!! country()->currency_symbol ?? '£' !!} {{ floor($cartTotal) }}</span>
                                </li> --}}
                                <li>
                                    <p>Sub Total exc. VAT:</p>
                                    <span id="grandTotalJS">{!!country()->currency_symbol ,floor($cartTotal) !!}</span>
                                </li>
                            </ul>
                            <div class="cards">
                                <p>We Accept</p>
                                <span><img src="{{ url('img/emptycart/visa.png') }}" alt="visa"></span>
                                <span><img src="{{ url('img/emptycart/master.png') }}" alt="master"></span>
                                <span><img src="{{ url('img/emptycart/american.png') }}" alt="american"></span>
                            </div>
                        </div>

                        <div class="order-main">
                            @foreach ($cartItems as $index => $cartItem)
                                <div class="order-courses" id="{{$index}}">
                                    <div class="course-name">
                                        <h2>{{ $cartItem->name }}</h2>
                                        <a href="javascript:void(0);" onclick="removeCartItem('{{ $index }}')"><img
                                                src="{{ url('img/emptycart/delete.svg') }}" alt="delete"></a>
                                    </div>
                                    <div class="course-info">
                                        <div class="detail delivery-method">
                                            @if ($cartItem->options['method'] == 'online')
                                                <p class="mode">Online self-paced</p>
                                                <span class="icon"><img src="{{ url('img/emptycart/online.svg') }}"
                                                        alt="online"></span>
                                            @elseif($cartItem->options['method'] == 'virtual')
                                                <p class="mode">Online Instructor-led</p>
                                                <span class="icon"><img src="{{ url('img/emptycart/virtual.svg') }}"
                                                        alt="virtual"></span>
                                            @elseif($cartItem->options['method'] == 'classroom')
                                                <p class="mode">Classroom</p>
                                                <span class="icon"><img src="{{ url('img/emptycart/classroom.svg') }}"
                                                        alt="classroom"></span>
                                            @endif
                                        </div>
                                        <div class="detail">
                                            <ul>
                                                @if ($cartItem->options['method'] == 'online')
                                                    @if (!empty($cartItem->options['addons']))
                                                    {{-- {{dd($cartItem->options->coursePrice)}} --}}
                                                        @foreach ($cartItem->options['addons'] as $addon)
                                                            <li>
                                                                <p>{{ $addon->name }}:</p>
                                                                <span>{!! country()->currency_symbol !!}{{ ceil($addon->price) }} </span>
                                                            </li>
                                                            <li>
                                                                <p class="location">Course Price:</p> <span> {!! country()->currency_symbol !!}{{ ceil($cartItem->options->coursePrice) }}</span>
                                                            </li>

                                                        @endforeach
                                                    @endif
                                                @else
                                                    <li>
                                                        <p>Date:</p><span>{{ $cartItem->options->date }}</span> 
                                                    </li>
                                                    <li>
                                                      <p> Duration: </p><span>{{ $cartItem->options->duration }} </span> 
                                                    </li>
                                                    <li>
                                                        <p class="location">Location:</p> <span> {{ $cartItem->options->location }}</span>
                                                    </li>
                                                    <li>
                                                        <p class="location">Course Price:</p> <span> {!! country()->currency_symbol !!}{{ $cartItem->price }}</span>
                                                    </li>
                                                @endif
                                                    
                                                <li>
                                                    <p>Sub Total:</p>
                                                    <span>{!! country()->currency_symbol!!}</span><span  class="subTotalJS">{{ $cartItem->price * $cartItem->qty }}</span>
                                                </li>


                                            </ul>

                                        </div>
                                        <div class="detail counts">
                                            <p>No. of Delegate (s)</p>
                                            <div class="count quantityJS">
                                                <a class="minus" onclick="updateCart('{{ $index }}','remove')">-</a>
                                                <span class="numbers digitJS">{{ $cartItem->qty }}</span>
                                                <a class="plus" onclick="updateCart('{{ $index }}','add')">+</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="buttons">
                        <a href="{{route('catalogue')}}" class="btn-white">
                            Continue Shopping
                            <img src="{{ url('img/emptycart/shopping.svg') }}" alt="right-arrow">
                        </a>
                        <a class="btn-blue" href="{{route('cartDetail')}}">
                            Proceed To Checkout
                            <img src="{{ url('img/emptycart/btn-right.svg') }}" alt="right-arrow">
                        </a>
                    </div>

                </div>
            </div>
        </section>
    @endif
@endsection

@section('footerScripts')
    <script>
        var updateCartRoute = '{{ route('updateCartQuantity') }}';
        var removeCartItemRoute = '{{ route('removeCartItem') }}';

    </script>
    <script src="{{ url('script/cart.js') }}"></script>

@endsection
