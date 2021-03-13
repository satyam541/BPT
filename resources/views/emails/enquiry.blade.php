<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
</head>
<body>
    <div style="width:100%">
        <div>
            Dear {{ $DELEGATENAME }},
        </div>
        <br/>
        <div>
            {{ $MAILMESSAGE }}
        </div>
       
        <div style="margin-top:10px;">
            <div style="background-color: #0063d8;padding: 6px; color: #fff; font-size: 20px;width:100% ">
                Course
            </div>

            <table style="width:100%">
                @unless(empty($ORDERNO))
                <tr style="background-color: #EFEDEE; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                    <td style="width:30%;float:left">
                        Order No:
                    </td>
                    <td style="width:70%">
                        {{ $ORDERNO }}
                    </td>
                </tr>
                @endunless
                <tr style="background-color: #EFEDEE; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                    <td style="width:30%;float:left">
                        Website Country:
                    </td>
                    <td style="width:70%">
                       {{ $WEBSITECOUNTRY }}
                    </td>
                </tr>
                <tr style="background-color: #EFEDEE; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                    <td style="width:30%;float:left">
                        Course Name:
                    </td>
                    <td style="width:70%">
                        {{ $PRODUCTNAME }}
                    </td>
                </tr>

                 @if(isset($PACKAGE) and $PACKAGE == 'Online')
                    <tr style="background-color: #EFEDEE; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                        <td style="width:30%;float:left">
                            Booking Type :
                        </td>
                        <td style="width:70%">
                            Online
                        </td>
                    </tr>
                    @if(!empty($basePrice))
                            <tr style="background-color: #EFEDEE; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                                <td style="width:30%;float:left">
                                    Base Price :
                                </td>
                                <td style="width:70%">
                                    £ {{round($basePrice)}}
                                </td>
                            </tr>
                    @endif
					@if(!empty($addOns) && !$addOns->isEmpty())
                    <tr style="background-color: #EFEDEE; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                        <td style="width:30%;float:left">
                           Add-Ons Opted :
                        </td>
                        <td style="width:70%">
                            @foreach($addOns as $addOn)
                                {{ $addOn['name'] }} (£{{ round($addOn['price']) }})<br>
                            @endforeach
                        </td>
                    </tr>
					@endif
                @else
                     @if($LOCATION == 'Virtual')
                            <tr style="background-color: #EFEDEE; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                                <td style="width:30%;float:left">
                                    Booking Type :
                                </td>
                                <td style="width:70%">
                                    Virtual
                                </td>
                            </tr>
                     @else
                            <tr style="background-color: #EFEDEE; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                                <td style="width:30%;float:left">
                                    Booking Type :
                                </td>
                                <td style="width:70%">
                                    Classroom
                                </td>
                            </tr>
							@if(!empty($LOCATION))
                            <tr style="background-color: #EFEDEE; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                                <td style="width:30%;float:left">
                                    Location:
                                </td>
                                <td style="width:70%">
                                    {{ $LOCATION }}
                                </td>
                            </tr>
							@endif
                     @endif
					@if(!empty($DATE))
					<tr style="background-color: #EFEDEE; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
						<td style="width:30%;float:left">
							Chosen Date:
						</td>
						<td style="width:70%">
							{{ $DATE }}
						</td>
					</tr>
					@endif
					@if(!empty($DURATION))
					<tr style="background-color: #EFEDEE; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
						<td style="width:30%;float:left">
							Duration:
						</td>
						<td style="width:70%">
							{{ $DURATION }}
						</td>
					</tr>
					@endif
                @endif

                <tr style="background-color: #EFEDEE; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                    <td style="width:30%;float:left">
                        Course Fee:
                    </td>
                    <td style="width:70%">
                        £ {{ round($COURSEFEE) }}
                    </td>
                </tr>

                    @if(!empty($SUMAMOUNT) && $COURSEFEE != $SUMAMOUNT)
                <tr style="background-color:#EFEDEE; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                    <td style="width:30%;float:left">
                        Total exe. VAT:
                    </td>
                    <td style="width:70%">
                        £ {{ round($SUMAMOUNT) }}
                    </td>
                </tr>
                    @endif

                @unless(empty($VAT))
                <tr style="background-color: #EFEDEE; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                    <td style="width:30%;float:left">
                        VAT:
                    </td>
                    <td style="width:70%">
                       £ {{ round($VAT) }}
                    </td>
                </tr>
                @endunless

                @unless(empty($CARDFEE))
                <tr style="background-color: #EFEDEE; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                    <td style="width:30%;float:left">
                        Card Fees:
                    </td>
                    <td style="width:70%">
                        £ {{ round($CARDFEE) }}
                    </td>
                </tr>
                @endunless

                @unless(empty($TOTALFEE))
                <tr style="background-color: #EFEDEE; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                    <td style="width:30%;float:left">
                        Total Fees:
                    </td>
                    <td style="width:70%">
                        £ {{ round($TOTALFEE) }}
                    </td>
                </tr>
                @endunless

                @unless(empty($PONUMBER))
                <tr style="background-color: #EFEDEE; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                    <td style="width:30%;float:left">
                        PO Number:
                    </td>
                    <td style="width:70%">
                        {{ $PONUMBER }}
                    </td>
                </tr>
                @endunless
            </table>
        </div>

        <div style="margin-top:30px;float:left;width:100%">
            <div style="background-color:  #0063d8;padding: 6px; color: #fff; font-size: 20px;width:100% ">
                Your Details
            </div>

            <table style="width:100%">

                @unless(empty($YOURNAME))
                <tr style="background-color: #EFEDEE; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                    <td style="width:30%;float:left">
                        Name:
                    </td>
                    <td style="width:70%">
                        {{ $YOURNAME }}
                    </td>
                </tr>
                @endunless

                @unless(empty($TELEPHONE))
                <tr style="background-color: #EFEDEE; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                    <td style="width:30%;float:left">
                        Telephone:
                    </td>
                    <td style="width:70%">
                        {{ $TELEPHONE }}
                    </td>
                </tr>
                @endunless

                @unless(empty($MOBILE))
                <tr style="background-color: #EFEDEE; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                    <td style="width:30%;float:left">
                        Mobile:
                    </td>
                    <td style="width:70%">
                        {{ $MOBILE }}
                    </td>
                </tr>
                @endunless

                @unless(empty($EMAIL))
                <tr style="background-color: #EFEDEE; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                    <td style="width:30%;float:left">
                        Email:
                    </td>
                    <td style="width:70%">
                        {{ $EMAIL }}
                    </td>
                </tr>
                @endunless

                    @unless(empty($COMPANY))
                        <tr style="background-color: #EFEDEE; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                            <td style="width:30%;float:left">
                                Company:
                            </td>
                            <td style="width:70%">
                                {{ $COMPANY }}
                            </td>
                        </tr>
                    @endunless

                @unless(empty($prefferedContactMethod))
                <tr style="background-color: #EFEDEE; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                    <td style="width:30%;float:left">
                         Preferred Method Chosen:
                    </td>
                    <td style="width:70%">
                     {{ $prefferedContactMethod }}
                    </td>
                </tr>
                @endunless

            </table>

        </div>

        @unless(empty($BILLINGNAME))
        <div style="margin-top:30px;float:left;width:100%">
            <div style="background-color:  #0063d8;padding: 6px; color: #fff; font-size: 20px;width:100% ">
                Billing Details
            </div>

            <table style="width:100%">

                @unless(empty($BILLINGNAME))
                <tr style="background-color: #EFEDEE; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                    <td style="width:30%;float:left">
                        Name:
                    </td>
                    <td style="width:70%">
                        {{ $BILLINGNAME }}
                    </td>
                </tr>
                @endunless

                @unless(empty($BILLINGADDRESS1))
                <tr style="background-color: #EFEDEE; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                    <td style="width:30%;float:left">
                        Address 1:
                    </td>
                    <td style="width:70%">
                        {{ $BILLINGADDRESS1 }}
                    </td>
                </tr>
                 @endunless

                @unless(empty($BILLINGADDRESS2))
                <tr style="background-color: #EFEDEE; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                    <td style="width:30%;float:left">
                       Address 2:
                    </td>
                    <td style="width:70%">
                        {{ $BILLINGADDRESS2 }}
                    </td>
                </tr>
                @endunless

                 @unless(empty($BILLINGCITY))
                 <tr style="background-color: #EFEDEE; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                    <td style="width:30%;float:left">
                       City:
                    </td>
                    <td style="width:70%">
                        {{ $BILLINGCITY }}
                    </td>
                </tr>
                @endunless

                @unless(empty($BILLINGPOSTCODE))
                 <tr style="background-color: #EFEDEE; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                    <td style="width:30%;float:left">
                       Post Code:
                    </td>
                    <td style="width:70%">
                        {{ $BILLINGPOSTCODE }}
                    </td>
                </tr>
                @endunless

                @unless(empty($BILLINGPROVINCE))
                <tr style="background-color: #EFEDEE; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                    <td style="width:30%;float:left">
                       Province:
                    </td>
                    <td style="width:70%">
                        {{ $BILLINGPROVINCE }}
                    </td>
                </tr>
                @endunless

                @unless(empty($BILLINGCOUNTRY))
                 <tr style="background-color: #EFEDEE; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                    <td style="width:30%;float:left">
                       Country:
                    </td>
                    <td style="width:70%">
                        {{ $BILLINGCOUNTRY }}
                    </td>
                </tr>
                @endunless

            </table>

        </div>
        @endunless


        <div style="margin-top:30px;float:left;width:100%">
            <div style="color:  #0063d8; padding: 6px; font-size: 20px; width: 100%; font-weight: bold; border-bottom: 2px solid #17365d;">
                What's Next?
            </div>
            <div>
                            
                <p>
                    Thank you for contacting Best Pratice Training - a learning advisor will be contacting you shortly.
                </p>
                <p>
                    If you would like to speak to a learning advisor more urgently please contact <b>023 8000 1008</b> or alternatively email <a href="mailto:enquiries@bestpracticetraining.com">enquiries@bestpracticetraining.com</a>
                </p>
            </div>
        </div>

        <div style="float:left;width:100%;color:gray;font-size:12px;">
            <p>
                The information transmitted is intended only for the person or entity to which it is addressed and may contain confidential and/or privileged material. Any review, retransmission, dissemination or other use of, or taking of any action in reliance upon, this information by persons or entities other than the intended recipient is prohibited. If you received this in error, please contact the sender and delete the material from any computer.
            </p>
        </div>

   </div>
</body>
</html>
