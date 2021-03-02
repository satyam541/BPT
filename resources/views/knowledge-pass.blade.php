@extends("layouts.master")
@section("content")


<!-- Start Banner Section -->
    <section class="flex-container banner knowledge-banner">
        <div class="container">
            @include("layouts.navbar")
            <div class="banner-container">
                <h1>Knowledge Pass</h1>
                <p>BPT was founded over 20 years ago with one simple mission: Finding the most trusted training courses around, at the most competitive prices. We recognise that the training marketplace is crowded.</p>
                <div class="breadcrums">
                            <ul>
                                <li><a href="">Home</a></li>
                                <img src="{{url('img/master/breadcrum-arrow.svg')}}" alt="breadcrums" class="white">
                                <img src="{{url('img/master/breadcrum-black.svg')}}" alt="breadcrums" class="black">
                                <li><a href="">Knowledge Pass</a></li>
                            </ul>
                     </div>
            </div>
        </div>
    </section>
<!-- End Banner Section -->

<!-- Start pass-clients section -->
    <section class="flex-container pass-clients">
        <div class="container">
            <div class="pass-container">
                <div class="pass-content">
                        <div class="heading">
                            <h2>Knowledge <span>Pass</span></h2>
                            <p> Save time, maximise budget, train more people</p>
                        </div>
                        <h3>What is a Knowledge Pass?</h3>
                        <p>A KnowledgePass is pre-paid training voucher which allows you to book any number of training courses you wish over a period of 12 months. It gives you full control of your budget and your chosen courses can be delivered in any location or online, virtually or onsite. You’ll also receive different levels of discount depending on how much you spend and what courses you purchase.
                        </p>
                        <p class="tagline"> Join leading brands in the new & best way to train...</p>  

                        <div class="buttons">
                            <a class="btn-blue">
                                <img src="{{url('img/knowledge-pass/pass-message.svg')}}" alt="pass-message">
                                Tell Us More
                            </a>
                        </div>
                </div>
                <div class="clients-pass">
                    <span><img src="{{url('img/knowledge-pass/google.svg')}}" alt="google"></span>        
                    <span><img src="{{url('img/knowledge-pass/ucas.svg')}}" alt="ucas"></span>        
                    <span><img src="{{url('img/knowledge-pass/samsung.svg')}}" alt="samsung"></span>       
                    <span><img src="{{url('img/knowledge-pass/mercedes.svg')}}" alt="mercedes"></span>       
                    <span> <img src="{{url('img/knowledge-pass/aston-martin.svg')}}" alt="aston-martin"></span>       
                    <span><img src="{{url('img/knowledge-pass/sky.svg')}}" alt="sky"></span>        
                </div>
            </div>
        </div>
    </section>
<!-- End pass-clients section -->

<!-- Start spending section -->
    <section class="flex-contanier spending">
        <div class="container">
            <div class="spending-container">
                <div class="heading center-heading">
                    <h2>Currently spending <span>£7,770</span></h2>
                </div>
                <div class="spending-list">
                    <div class="item">
                        <h3>Spend £2,230 more to be eligible for Bronze discount of 10%</h3>

                        <ul>
                            <li>
                                <p class="title">Normal price:</p>
                                <p class="prize">£7,770</p>
                            </li>
                            <li>
                                <p class="title">Knowledge Pass price:</p>
                                <p class="prize">£7,770</p>
                            </li>
                            <li>
                                <p class="title">Saving:</p>
                                <p class="prize">£7,770</p>
                            </li>
                            <li>
                                <p class="title">Remaining Spend:</p>
                                <p class="prize">£7,770</p>
                            </li>
                        </ul>
                    </div>
                    <div class="item">
                        <h3>Spend £14,820 more to be eligible for Silver discount of 25%</h3>

                        <ul>
                            <li>
                                <p class="title">Normal price:</p>
                                <p class="prize">£7,770</p>
                            </li>
                            <li>
                                <p class="title">Knowledge Pass price:</p>
                                <p class="prize">£7,770</p>
                            </li>
                            <li>
                                <p class="title">Saving:</p>
                                <p class="prize">£7,770</p>
                            </li>
                            <li>
                                <p class="title">Remaining Spend:</p>
                                <p class="prize">£7,770</p>
                            </li>
                        </ul>
                    </div>
                    <div class="item">
                        <h3>Spend £44,820 more to be eligible for Gold discount of 50%</h3>

                        <ul>
                            <li>
                                <p class="title">Normal price:</p>
                                <p class="prize">£7,770</p>
                            </li>
                            <li>
                                <p class="title">Knowledge Pass price:</p>
                                <p class="prize">£7,770</p>
                            </li>
                            <li>
                                <p class="title">Saving:</p>
                                <p class="prize">£7,770</p>
                            </li>
                            <li>
                                <p class="title">Remaining Spend:</p>
                                <p class="prize">£7,770</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="buttons">
                    <a class="btn-blue">
                        <img src="{{url('../img/knowledge-pass/requirements.svg')}}" alt="requirements">
                        Send Us Your Requirement
                    </a>
                </div>
            </div>
        </div>
    </section>
<!-- End spending section -->


<!-- Start benefits section -->
    <section class="flex-container benefit">
        <div class="container">
            <div class="benefit-container">
                <div class="heading center-heading white-heading">
                    <h2>The Benefits</h2>
                </div>
                <div class="benefit-list">
                    <div class="benefit-info">
                        <span><img src="{{url('img/knowledge-pass/save-money.svg')}}" alt="save-money"></span>
                        <h3>Saving Money</h3>
                    </div>
                    <div class="benefit-info">
                        <span><img src="{{url('img/knowledge-pass/saving-time.svg')}}" alt="saving-time"></span>
                        <h3>Saving Time</h3>
                    </div>
                    <div class="benefit-info">
                        <span><img src="{{url('img/knowledge-pass/12-month.svg')}}" alt="saving-time"></span>
                        <h3>12 Month Budget</h3>
                    </div>
                    <div class="benefit-info">
                        <span><img src="{{url('img/knowledge-pass/reduced-admin.svg')}}" alt="reduced-admin"></span>
                        <h3>Reduced Invoicing and Administration</h3>
                    </div>
                    <div class="benefit-info">  
                        <span><img src="{{url('img/knowledge-pass/training-analysis.svg')}}" alt="training-analyis"></span>
                        <h3>Training Needs Analysis</h3>
                    </div>
                    <div class="benefit-info">  
                        <span><img src="{{url('img/knowledge-pass/discount-percentages.svg')}}" alt="discount-discounts"></span>
                        <h3>Higher Discount Percentages</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- End benefits section -->



@endsection