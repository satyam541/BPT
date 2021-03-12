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


<!-- Start requirement section -->
<section class="flex-container requirement">
    <div class="container">
        <div class="requirement-container">
            <div class="heading center-heading white-heading">
                <h2>Calculate your Requirements</h2>
            </div>
            <p class="headline">Not sure what your budget should be? Use our training calculator to figure out how much you need to spend. Simply select how many of each course you think you will need for your staff and we will tell you the estimated cost.</p>
           <div class="chart">
               <div class="chart-title">
                   <h3>
                       Select a course category
                   </h3>
                   <h3># of Delegates</h3>
                   <h3>Total</h3>
               </div>
               <div class="course-list">
                  
                   @foreach($topics  as $topic)
                    <div class="course-content panelJS">
                        <div class="course-name panel-titleJS">
                                <p>
                                    {{-- Business Skills (17 courses (s)) --}}
                                    {{$topic->name ."(" .$topic->courses->count(). " courses (s))" }}
                                </p>
                                <span class="amount" data-amount="0" data-course="0">0</span>
                                <span class="ks2" data-price="0">0</span>
                                <span class="image">
                                <img src="{{url('../img/knowledge-pass/blue-arrow.svg')}}" class="blue" alt="blue-arrow">
                                <img src="{{url('../img/knowledge-pass/white-arrow.svg')}}" class="white" alt="blue-arrow">
                                </span>
                        </div>
                        <div class="description">
                        <div class="course-detail bold">
                                <p>
                                Popular Courses
                                </p> 
                                <p>delegates</p>  
                                <p>
                                    <span >
                                        price
                                    </span>
                                    <span>
                                        Total
                                    </span>
                                </p>

                        </div>
                     
                        @foreach($topic->courses as $course)
                        <div class="course-detail  coursedataJS">
                                <p>
                                  {{$course->name}}
                                </p> 
                                <span class="select">
                                <select name="" class="quantityJS">
                                    @for($i = 0;$i<=100;$i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                                </span>
                                <p>
                                    @php
                                        $price = $course->schedule->max('event_price');
                                    @endphp
                                    <span  class="price" data-price="{{$price}}">
                                        £ {{$price}}
                                    </span>
                                    <span   class="total" data-price="0">
                                        £ 0
                                    </span>
                                </p>

                        </div>
                        @endforeach
             
                        </div>

                    </div>
                    @endforeach
               
               </div>
               <div class="summary panel-footerJS">
                   <p>Summary</p>
                   <p ><span class="totalAmountJS">0 </span> course selected</p>
               </div>

           </div>
        </div>
    </div>
</section>
<!-- End requirement section -->

<!-- Start spending section -->
    <section class="flex-contanier spending">
        <div class="container">
            <div class="spending-container">
                <div class="heading center-heading">
                    <h2>Currently spending <span id="totalPriceJS">£ 0</span></h2>
                </div>
                <div class="spending-list">
                    <div class="item  BronzePassJS">
                        <h3  class="spendMoreJS" data-price="£2,230">Spend £2,230 more to be eligible for Bronze discount of 10%</h3>

                        <ul>
                            <li>
                                <p class="title">Normal price:</p>
                                <p class="prize normalPriceJS">£7,770</p>
                            </li>
                            <li>
                                <p class="title">Knowledge Pass price:</p>
                                <p class="prize passPriceJS">£7,770</p>
                            </li>
                            <li>
                                <p class="title">Saving:</p>
                                <p class="prize savingPriceJS">£7,770</p>
                            </li>
                            <li>
                                <p class="title">Remaining Spend:</p>
                                <p class="prize remainingPriceJS">£7,770</p>
                            </li>
                        </ul>
                    </div>
                    <div class="item SilverPassJS">
                        <h3  class="spendMoreJS" data-price="£14,820">Spend £14,820 more to be eligible for Silver discount of 25%</h3>

                        <ul>
                            <li>
                                <p class="title">Normal price:</p>
                                <p class="prize normalPriceJS">£7,770</p>
                            </li>
                            <li>
                                <p class="title">Knowledge Pass price:</p>
                                <p class="prize passPriceJS">£7,770</p>
                            </li>
                            <li>
                                <p class="title">Saving:</p>
                                <p class="prize savingPriceJS">£7,770</p>
                            </li>
                            <li>
                                <p class="title">Remaining Spend:</p>
                                <p class="prize remainingPriceJS">£7,770</p>
                            </li>
                        </ul>
                    </div>
                    <div class="item GoldPassJS">
                        <h3  class="spendMoreJS" data-price="£44,820">Spend £44,820 more to be eligible for Gold discount of 50%</h3>

                        <ul>
                            <li>
                                <p class="title">Normal price:</p>
                                <p class="prize normalPriceJS">£7,770</p>
                            </li>
                            <li>
                                <p class="title">Knowledge Pass price:</p>
                                <p class="prize passPriceJS">£7,770</p>
                            </li>
                            <li>
                                <p class="title">Saving:</p>
                                <p class="prize savingPriceJS">£7,770</p>
                            </li>
                            <li>
                                <p class="title">Remaining Spend:</p>
                                <p class="prize remainingPriceJS">£7,770</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="buttons">
                    <a class="btn-blue open-popup enquiryJS" data-type="knowledgepass">
                        <img src="{{url('../img/knowledge-pass/requirements.svg')}}" alt="requirements">
                        Send Us Your Requirement
                    </a>
                </div>
            </div>
        </div>
    </section>
<!-- End spending section -->

<!-- Start right section -->
    <section class="flex-container why-right">
        <div class="container">
            <div class="right-container">
                <div class="heading center-heading">
                    <h2>Why a Knowledge Pass is right <span>for you</span></h2>
                    <p>Receive these exclusive benefits depending on your chosen budget.</p>
                </div>
                <div class="right-list">
                    <div class="right-item">
                        <span>
                            <h3>01</h3>
                            <img src="{{url('img/knowledge-pass/saving.svg')}}" alt="saving">
                        </span>
                        <div class="content">
                            <h2>Saving Money</h2>
                            <p>Purchasing courses together lets you save money and get the most out of your budget.</p>
                        </div>
                    </div>
                    <div class="right-item">
                        <span>
                            <h3>02</h3>
                            <img src="{{url('img/knowledge-pass/time.svg')}}" alt="time">
                        </span>
                        <div class="content">
                            <h2>Saving time</h2>
                            <p>Keep a record with your personalised dashboard of spends and utilisation.</p>
                        </div>
                    </div>
                    <div class="right-item">
                        <span>
                            <h3>03</h3>
                            <img src="{{url('img/knowledge-pass/budget.svg')}}" alt="budget">
                        </span>
                        <div class="content">
                            <h2>12 month annualised budget</h2>
                            <p>Your courses can be booked at your convenience over a period of 12 months and can be split between .</p>
                        </div>
                    </div>
                    <div class="right-item">
                        <span>
                            <h3>04</h3>
                            <img src="{{url('img/knowledge-pass/invoicing.svg')}}" alt="invoicing">
                        </span>
                        <div class="content">
                            <h2>Invoicing & administration reduced</h2>
                            <p>Through the use of Avenoire you can easily manage training requests,</p>
                        </div>
                    </div>
                    <div class="right-item">
                        <span>
                            <h3>05</h3>
                            <img src="{{url('img/knowledge-pass/analysis.svg')}}" alt="analysis">
                        </span>
                        <div class="content">
                            <h2>Training needs analysis</h2>
                            <p>Your KnowledgePass includes exclusive access to our Avenoire training needs analysis tool</p>
                        </div>
                    </div>
                    <div class="right-item">
                        <span>
                            <h3>06</h3>
                            <img src="{{url('img/knowledge-pass/progress.svg')}}" alt="progress">
                        </span>
                        <div class="content">
                            <h2>Track progress & feedback</h2>
                            <p>While using Avenoire, your personalised dashboard lets you keep track of spend and utilisation </p>
                        </div>
                    </div>
                    <div class="right-item">
                        <span>
                            <h3>07</h3>
                            <img src="{{url('img/knowledge-pass/manage.svg')}}" alt="manage">
                        </span>
                        <div class="content">
                            <h2>Easily manage training requests</h2>
                            <p>Through the use of Avenoire you can easily manage training requests, eliminating the need for collating</p>
                        </div>
                    </div>
                    <div class="right-item">
                        <span>
                            <h3>08</h3>
                            <img src="{{url('img/knowledge-pass/transparency.svg')}}" alt="transparency">
                        </span>
                        <div class="content">
                            <h2>Full Transparency</h2>
                            <p>Through the use of Avenoire you can easily manage training requests, eliminating the need for collating</p>
                        </div>
                    </div>
                    <div class="right-item">
                        <span>
                            <h3>09</h3>
                            <img src="{{url('img/knowledge-pass/alerts.svg')}}" alt="alerts">
                        </span>
                        <div class="content">
                            <h2>Alerts & Notifications</h2>
                            <p>Monthly spend reports, budget utilisation notifications, booking request alerts, feedback report</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- End right section -->


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


<!-- Start budget section -->
<section class="flex-container budget">
    <div class="container">
        <div class="budget-container">
            <div class="heading center-heading">
                <h2>Compare Budget Allocations</h2>
            </div>
            <p class="headline">Receive these exclusive benefits depending on your chosen budget.</p>
            <div class="budget-table">
            <table>
                <tr>
                    <th>Features</th>
                    <th>Bronze</th>
                    <th>Silver</th>
                    <th>Gold</th>
                </tr>
                <tr>
                    <td>
                    <p>Dedicated account manager</p>
                    <p>Your direct point of contact for all your training requirements</p>
                    </td>
                    <td><img src="{{url('img/knowledge-pass/tick.svg')}}" alt="tick"></td>
                    <td><img src="{{url('img/knowledge-pass/tick.svg')}}" alt="tick"></td>
                    <td><img src="{{url('img/knowledge-pass/tick.svg')}}" alt="tick"></td>
                </tr>
                <tr>
                    <td>
                    <p>Fixed discount percentages</p>
                    <p>Discount rates will vary based upon investment level</p>
                    </td>
                    <td><img src="{{url('img/knowledge-pass/tick.svg')}}" alt="tick"></td>
                    <td><img src="{{url('img/knowledge-pass/tick.svg')}}" alt="tick"></td>
                    <td><img src="{{url('img/knowledge-pass/tick.svg')}}" alt="tick"></td>
                </tr>
                <tr>
                    <td>
                    <p>Free eLearning licences</p>
                    <p>Depending on your budget investment, you will be able to enrol a number of users on eLearning courses</p>
                    </td>
                    <td>20 Users</td>
                    <td>10 Users</td>
                    <td>5 Users</td>
                </tr>
                <tr>
                    <td>
                    <p>Free courses</p>
                    <p>Depending on your budget investment, you will be able to enrol a number of delegates on courses</p>
                    </td>
                    <td>12 Delegates</td>
                    <td>7 Delegates</td>
                    <td>3 Delegates</td>
                </tr>
                <tr>
                    <td>
                    <p>Become a partner</p>
                    <p>You'll be added to our clients and we'll provide you with a testimonial. You will also receive exclusive offers and training updates</p>
                    </td>
                    <td><img src="{{url('img/knowledge-pass/tick.svg')}}" alt="tick"></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                    </td>
                    <td><div class="buttons"><a class="btn-blue open-popup enquiryJS" data-type="knowledgepass"><img src="{{url('img/knowledge-pass/call-us.svg')}}" alt="call-us">Enquire Now</a></div></td>
                    <td><div class="buttons"><a class="btn-blue open-popup enquiryJS" data-type="knowledgepass"><img src="{{url('img/knowledge-pass/call-us.svg')}}" alt="call-us">Enquire Now</a></div></td>
                    <td><div class="buttons"><a class="btn-blue open-popup enquiryJS" data-type="knowledgepass"><img src="{{url('img/knowledge-pass/call-us.svg')}}" alt="call-us">Enquire Now</a></div></td>
                </tr>
            </table>
        </div>
        </div>
    </div>
</section>
<!-- End budget section -->

<!-- Start knowledge section -->
<section class="flex-container knowledge">
    <div class="container">
        <div class="knowledge-container">
            <div class="pass-info">
                <div class="heading">
                    <h2>Your guide to booking a Knowledge Pass</h2>
                </div>
                <p>"The quality of training provided has been good with very good feedback from delegates. They use good quality venues and think about meeting our needs in their selection."
                    </p>
                    <p>The quality of training provided has been good with very good feedback from delegates. </p>
                    <p>They use good quality venues and think about meeting our needs in their selection. " The quality of training provided has been good with very good feedback from delegates. They use good quality venues and think about meeting our needs in their selection.</p>
                    <div class="buttons">
                    <a class="btn-blue"><img src="{{url('img/knowledge-pass/message.svg')}}" alt="arrow">Need More Info</a>
                    </div>
            </div>
            <div class="booking-list">
                    <div class="booking-info">
                        <span><img src="{{url('img/knowledge-pass/hand.svg')}}" alt="hand"></span>
                        <h3>Confirm the amount</h3>
                        <p>Through the use of Avenoire you can easily manage training requests, eliminating the need for collating spreadsheets</p>
                    </div>
                    <div class="booking-info">
                        <span><img src="{{url('img/knowledge-pass/platform.svg')}}" alt="platform"></span>
                        <h3>Your Online platform is live</h3>
                        <p>Through the use of Avenoire you can easily manage training requests, eliminating the need for collating spreadsheets</p>
                    </div>
                    <div class="booking-info">
                        <span><img src="{{url('img/knowledge-pass/online-booking.svg')}}" alt="online-booking"></span>
                        <h3>Start booking your courses</h3>
                        <p>Through the use of Avenoire you can easily manage training requests, eliminating the need for collating spreadsheets</p>
                    </div>
                    <div class="booking-info">
                        <span><img src="{{url('img/knowledge-pass/form.svg')}}" alt="form"></span>
                        <h3>Sign the booking form</h3>
                        <p>Through the use of Avenoire you can easily manage training requests, eliminating the need for collating spreadsheets</p>
                    </div>
                    <div class="booking-info">
                        <span><img src="{{url('img/knowledge-pass/data.svg')}}" alt="data"></span>
                        <h3>Your dedicated account is opened</h3>
                        <p>Through the use of Avenoire you can easily manage training requests, eliminating the need for collating spreadsheets</p>
                    </div>
                    <div class="booking-info">
                        <span><img src="{{url('img/knowledge-pass/conversation.svg')}}" alt="conversation"></span>
                        <h3>Caroline, cornwall Council</h3>
                        <p>Through the use of Avenoire you can easily manage training requests, eliminating the need for collating spreadsheets</p>
                    </div>
            </div>
        </div>
    </div>
</section>
<!-- End knowledge section -->

<!-- Start study section -->
<section class="flex-container study">
    <div class="container">
        <div class="study-container">
            <div class="heading center-heading">
                <h2>Case <span>Studies</span></h2>
            </div>
            <div class="study-list">
                <div class="study-content">
                    <h2>Consistent Quality</h2>
                    <p>The Knowledge Academy is in year 2 of a 3-year rolling contract, where PRINCE2 training is delivered for 60 Masters students in Management each Summer as part of their degree. The fact that The Knowledge Academy is trusted as a supplier of PRINCE2 training to those paying for Masters degrees is proof in itself that we are a respected and established supplier. More importantly, it is proof of the substantial benefits of the course that it is considered an essential part of the training of Masters students, and that City University of London should continue to procure large numbers of courses year upon year.</p>
                </div>
                <div class="study-content">
                    <h2>Consistent Quality</h2>
                    <p>The Knowledge Academy is in year 2 of a 3-year rolling contract, where PRINCE2 training is delivered for 60 Masters students in Management each Summer as part of their degree. The fact that The Knowledge Academy is trusted as a supplier of PRINCE2 training to those paying for Masters degrees is proof in itself that we are a respected and established supplier. More importantly, it is proof of the substantial benefits of the course that it is considered an essential part of the training of Masters students, and that City University of London should continue to procure large numbers of courses year upon year.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End study section -->



@endsection
@section('footerScripts')
<script>
var symbol = '£';
		$(".quantityJS").on("change",function(){
			var courseRow = $(this).closest(".coursedataJS");
			var price = courseRow.find(".price").data("price");
            console.log(price);
			var quantity = $(this).val();
            console.log(quantity);
			var total = price*quantity;
			courseRow.find(".total").html(symbol+total).data('price',total);
			changeTotalValue(courseRow.closest('.panelJS'));
		});

		function changeTotalValue(panel)
		{
			var amount = 0;
			var price = 0;
			var course = 0;
			panel.find(".coursedataJS").each(function(){
				quantity = $(this).find(".quantityJS").val();
				if(quantity > 0)
				{
					course++;
					amount += +quantity;
				}
				price += $(this).find(".total").data("price");
			});
			panel.find(".panel-titleJS").find(".amount").html(amount).data("amount",amount).data("course",course);
			panel.find(".panel-titleJS").find(".ks2").html(symbol+price).data("price",price);
			changeFinalValue();
		}

		function changeFinalValue()
		{
			var course = 0;
			var price = 0;
			$(".panelJS .panel-titleJS").each(function(){
				course += $(this).find(".amount").data('course');
				price += $(this).find(".ks2").data("price");
			});

			$(".panel-footerJS .totalAmountJS").html(course);
			$("#totalPriceJS").html(symbol+price);

			updateDiscountCards(price);
		}


        function updateDiscountCards(price)
		{
			var bronze = $(".BronzePassJS");
			var silver = $(".SilverPassJS");
			var gold = $(".GoldPassJS");

			// change spend more text(price) for all

			bronze.find('.spendMoreJS').data(symbol+(2230-price));
			silver.find('.spendMoreJS').data(symbol+(14820-price));
			gold.find('.spendMoreJS').data(symbol+(44820-price));

			// change all four amount
			var passPrice = price-(price/10);
         
			passPrice = passPrice.toFixed(2);
			
			bronze.find('.passPriceJS').html(symbol+passPrice);
			bronze.find('.savingPriceJS').html(symbol+(price-passPrice).toFixed(2));
			bronze.find('.remainingPriceJS').html(symbol+(2230-passPrice).toFixed(2));

			passPrice = price-(price/4);
			passPrice = passPrice.toFixed(2);
			silver.find('.normalPriceJS').html(symbol+price);
			silver.find('.passPriceJS').html(symbol+passPrice);
			silver.find('.savingPriceJS').html(symbol+(price-passPrice).toFixed(2));
			silver.find('.remainingPriceJS').html(symbol+(14820-passPrice).toFixed(2));

			passPrice = price-(price/2);
			passPrice = passPrice.toFixed(2);
			gold.find('.normalPriceJS').html(symbol+price);
			gold.find('.passPriceJS').html(symbol+passPrice);
			gold.find('.savingPriceJS').html(symbol+(price-passPrice).toFixed(2));
			gold.find('.remainingPriceJS').html(symbol+(44820-passPrice).toFixed(2));

			if(price < 2230)
			{
				// show spend more text for all
				// opacity reset all

				bronze.css("opacity",'1').find('.spendMoreJS').show();
				silver.css("opacity",'1').find('.spendMoreJS').show();
				gold.css("opacity",'1').find('.spendMoreJS').show();
			}
			else if(price < 14820)
			{
				// hide spend more text for bronze but rest show
				// opacity for bronze

				bronze.css("opacity",'.5').find('.spendMoreJS').hide();
				silver.css("opacity",'1').find('.spendMoreJS').show();
				gold.css("opacity",'1').find('.spendMoreJS').show();
			}
			else if(price < 44820)
			{
				// hide spend more text all but gold
				// opacity for all but gold

				bronze.css("opacity",'.5').find('.spendMoreJS').hide();
				silver.css("opacity",'.5').find('.spendMoreJS').hide();
				gold.css("opacity",'1').find('.spendMoreJS').show();
			}
			else {
				// hide spend more text for all
				// opacity for all

				bronze.css("opacity",'.5').find('.spendMoreJS').hide();
				silver.css("opacity",'.5').find('.spendMoreJS').hide();
				gold.css("opacity",'1').find('.spendMoreJS').hide();
			}
			// spen more (h3 span)
			// normalPriceJS,passPriceJS, savingPriceJS, remainingPriceJS
		}
</script>
@endsection