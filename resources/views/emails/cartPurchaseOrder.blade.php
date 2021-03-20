@extends('shared.master')
@section('content')


<div style="width: 1170px;margin:20px auto;">
    <div style="font-size:1.3em;">
        Dear {{ $DELEGATENAME }},
    </div>
    <br/>
    <div style="font-size:1.3em;">
        {{ $MAILMESSAGE }}
    </div>
   
    <div style="margin-top:20px;">
        <div style="background-color: #0063D8;padding: 6px 15px; color: #fff; font-size: 20px;width:100% ">
            Course
        </div>

        <table style="width:100%">
            <tr style="background-color: #EFEDEE; padding: 6px 15px; color: black; font-size: 16px; float: left; width: 100%;">
                <td style="width:30%;float:left">
                    Order No:
                </td>
                <td style="width:70%">
                    {{ $ORDERNO }}
                </td>
            </tr>
            <tr style="background-color: #EFEDEE; padding: 6px 15px; color: black; font-size: 16px; float: left; width: 100%;">
                <td style="width:30%;float:left">
                    Website Country:
                </td>
                <td style="width:70%">
                   {{ $WEBSITECOUNTRY }}
                </td>
            </tr>
            <tr style="background-color: #EFEDEE; padding: 6px 15px; color: black; font-size: 16px; float: left; width: 100%;">
                <td style="width:30%;float:left">
                    Course Name:
                </td>
                <td style="width:70%">
                    {{ $PRODUCTNAME }}
                </td>
            </tr>
            @if(isset($PACKAGE) and $PACKAGE == 'Online')
                <tr style="background-color: #EFEDEE; padding: 6px 15px; color: black; font-size: 16px; float: left; width: 100%;">
                    <td style="width:30%;float:left">
                         Booking Type :
                    </td>
                    <td style="width:70%">
                        Online Course Package
                    </td>
                </tr>
                <tr style="background-color: #EFEDEE; padding: 6px 15px; color: black; font-size: 16px; float: left; width: 100%;">
                    <td style="width:30%;float:left">
                         Package Opted :
                    </td>
                    <td style="width:70%">
                        {{ $PACKAGE }}
                    </td>
                </tr>
                <tr style="background-color: #EFEDEE; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                    <td style="width:30%;float:left">
                        Add Ons Opted :
                    </td>
                    <td style="width:70%">
                        @foreach($addOns as $addOn)
                            {{ $addOn['name'] }} (£ {{ $addOn['price'] }})<br>
                        @endforeach
                    </td>
                </tr>
                @else

                  @if($LOCATION == 'Virtual')
                    <tr style="background-color: #EFEDEE; padding: 6px 15px; color: black; font-size: 16px; float: left; width: 100%;">
                        <td style="width:30%;float:left">
                            Booking Type :
                        </td>
                        <td style="width:70%">
                            Virtual Schedule
                        </td>
                    </tr>
                  @else
                    <tr style="background-color: #EFEDEE; padding: 6px 15px; color: black; font-size: 16px; float: left; width: 100%;">
                        <td style="width:30%;float:left">
                            Booking Type :
                        </td>
                        <td style="width:70%">
                            Course Schedule
                        </td>
                    </tr>
                    <tr style="background-color: #EFEDEE; padding: 6px 15px; color: black; font-size: 16px; float: left; width: 100%;">
                        <td style="width:30%;float:left">
                            Location:
                        </td>
                        <td style="width:70%">
                            {{ $LOCATION }}
                        </td>
                    </tr>
                   @endif

                <tr style="background-color: #EFEDEE; padding: 6px 15px; color: black; font-size: 16px; float: left; width: 100%;">
                    <td style="width:30%;float:left">
                         Chosen Date:
                    </td>
                    <td style="width:70%">
                        {{ $DATE }}
                    </td>
                </tr>
                <tr style="background-color: #EFEDEE; padding: 6px 15px; color: black; font-size: 16px; float: left; width: 100%;">
                    <td style="width:30%;float:left">
                         Duration:
                    </td>
                    <td style="width:70%">
                        {{ $DURATION }}
                    </td>
                </tr>
                @endif
            
            <tr style="background-color: #EFEDEE; padding: 6px 15px; color: black; font-size: 16px; float: left; width: 100%;">
                <td style="width:30%;float:left">
                    Course Fee:
                </td>
                <td style="width:70%">
                    £ {{ $COURSEFEE }}
                </td>
            </tr>
            <tr style="background-color: #EFEDEE; padding: 6px 15px; color: black; font-size: 16px; float: left; width: 100%;">
                <td style="width:30%;float:left">
                    VAT:
                </td>
                <td style="width:70%">
                   £ {{ $VAT }}
                </td>
            </tr>
            <tr style="background-color: #EFEDEE; padding: 6px 15px; color: black; font-size: 16px; float: left; width: 100%;">
                <td style="width:30%;float:left">
                    Card Fees:
                </td>
                <td style="width:70%">
                    £ {{ $CARDFEE }}
                </td>
            </tr>
            <tr style="background-color: #EFEDEE; padding: 6px 15px; color: black; font-size: 16px; float: left; width: 100%;">
                <td style="width:30%;float:left">
                    Total Fees:
                </td>
                <td style="width:70%">
                    £ {{ $TOTALFEE }}
                </td>
            </tr>
            @unless(empty($PONUMBER))
            <tr style="background-color: #EFEDEE; padding: 6px 15px; color: black; font-size: 16px; float: left; width: 100%;">
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
        <div style="background-color: #0063D8;padding: 6px 15px; color: #fff; font-size: 20px;width:100% ">
            Your Details
        </div>

        <table style="width:100%">
            <tr style="background-color:#EFEDEE; padding: 6px 15px; color: black; font-size: 16px; float: left; width: 100%;">
                <td style="width:30%;float:left">
                    Name:
                </td>
                <td style="width:70%">
                    {{ $YOURNAME }}
                </td>
            </tr>
            @unless(empty($TELEPHONE))
            <tr style="background-color: #EFEDEE; padding: 6px 15px; color: black; font-size: 16px; float: left; width: 100%;">
                <td style="width:30%;float:left">
                    Telephone:
                </td>
                <td style="width:70%">
                    {{ $TELEPHONE }}
                </td>
            </tr>
            @endunless
            <tr style="background-color: #EFEDEE; padding: 6px 15px; color: black; font-size: 16px; float: left; width: 100%;">
                <td style="width:30%;float:left">
                    Mobile:
                </td>
                <td style="width:70%">
                    {{ $MOBILE }}
                </td>
            </tr>
            <tr style="background-color: #EFEDEE; padding: 6px 15px; color: black; font-size: 16px; float: left; width: 100%;">
                <td style="width:30%;float:left">
                    Email:
                </td>
                <td style="width:70%">
                    {{ $EMAIL }}
                </td>
            </tr>
            @unless(empty($COMPANY))
                <tr style="background-color: #EFEDEE; padding: 6px 15px; color: black; font-size: 16px; float: left; width: 100%;">
                    <td style="width:30%;float:left">
                        COMPANY:
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

    <div style="margin-top:30px;float:left;width:100%">
        <div style="background-color: #0063D8;padding: 6px 15px; color: #fff; font-size: 20px;width:100% ">
            Billing Details
        </div>

        <table style="width:100%">
            <tr style="background-color: #EFEDEE; padding: 6px 15px; color: black; font-size: 16px; float: left; width: 100%;">
                <td style="width:30%;float:left">
                    Name:
                </td>
                <td style="width:70%">
                    {{ $BILLINGNAME }}
                </td>
            </tr>
            <tr style="background-color:#EFEDEE; padding: 6px 15px; color: black; font-size: 16px; float: left; width: 100%;">
                <td style="width:30%;float:left">
                    Address 1:
                </td>
                <td style="width:70%">
                    {{ $BILLINGADDRESS1 }}
                </td>
            </tr>
            @unless(empty($BILLINGADDRESS2))
            <tr style="background-color: #EFEDEE; padding: 6px 15px; color: black; font-size: 16px; float: left; width: 100%;">
                <td style="width:30%;float:left">
                   Address 2:
                </td>
                <td style="width:70%">
                    {{ $BILLINGADDRESS2 }}
                </td>
            </tr>
            @endunless
             <tr style="background-color: #EFEDEE; padding: 6px 15px; color: black; font-size: 16px; float: left; width: 100%;">
                <td style="width:30%;float:left">
                   City:
                </td>
                <td style="width:70%">
                    {{ $BILLINGCITY }}
                </td>
            </tr>
             <tr style="background-color:#EFEDEE; padding: 6px 15px; color: black; font-size: 16px; float: left; width: 100%;">
                <td style="width:30%;float:left">
                   Post Code:
                </td>
                <td style="width:70%">
                    {{ $BILLINGPOSTCODE }}
                </td>
            </tr>
            <tr style="background-color: #EFEDEE; padding: 6px 15px; color: black; font-size: 16px; float: left; width: 100%;">
                <td style="width:30%;float:left">
                   Province:
                </td>
                <td style="width:70%">
                    {{ $BILLINGPROVINCE }}
                </td>
            </tr>
             <tr style="background-color: #EFEDEE; padding: 6px 15px; color: black; font-size: 16px; float: left; width: 100%;">
                <td style="width:30%;float:left">
                   Country:
                </td>
                <td style="width:70%">
                    {{ $BILLINGCOUNTRY }}
                </td>
            </tr>
        </table>

    </div>

    <div style="margin-top:30px;float:left;width:100%">
        <div style="color: #17365d; padding: 6px 15px; font-size: 20px; width: 100%; font-weight: bold; border-bottom: 2px solid #17365d;">
            What's Next?
        </div>
        <div>
                        
            <p style="padding-top:10px;">
                Thank you for contacting {{ websiteDetail()->name }} - a learning advisor will be contacting you shortly.
            </p>
            <p>
                If you would like to speak to a learning advisor more urgently please contact <b>023 8000 1008</b> or alternatively email 
				<a href="mailto:enquiries@bestpracticetraining.com" style="color: #0063d7;">enquiries@bestpracticetraining.com</a>
            </p>
        </div>
    </div>

    <div style="float:left;width:100%;     margin-bottom: 40px;">
        <p>
            The information transmitted is intended only for the person or entity to which it is addressed and may contain confidential and/or privileged material. Any review, retransmission, dissemination or other use of, or taking of any action in reliance upon, this information by persons or entities other than the intended recipient is prohibited. If you received this in error, please contact the sender and delete the material from any computer.
        </p>
    </div>

</div>

@endsection

