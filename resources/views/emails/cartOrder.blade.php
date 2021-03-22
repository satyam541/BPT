<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
</head>
<body>
    <div style="width:100%;font-family: 'Roboto';">
        <h4>
            Dear {{ $customerDetail->firstname }} {{ $customerDetail->lastname }},
        </h4>
        <br/>
        @if($type=="booking")
        <p>
            Purshase order
            The following booking was started on {{ \Carbon\Carbon::now() }}
        </p>
        @elseif($type=="success")
        <h4>
            Payment Successfull
        </h4>
        @elseif($type=="declined")
        <h4>Payment Declined</h4>
        @elseif($type=="Order Generated")
        <h4>Order Generated</h4>
        @else
        <h4>Ecom Incomplete</h4>
        @endif
       
       
        <div style="margin-top:10px;">
            <div style="background-color: #1C2848 ;padding: 6px; color: #ffffff; font-size: 20px;width:100% ">
                Course
            </div>

            <table style="width:100%">
                @if(isset($orderDetail))
                @unless(empty($orderDetail->gateway_order_id ))
                <tr style="background-color: #F2F2F2; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                    <td style="width:30%;float:left">
                        Order No:
                    </td>
                    <td style="width:70%">
                        {{ $orderDetail->gateway_order_id }}
                    </td>
                </tr>
                @endunless
                <tr style="background-color: #ffffff; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                    <td style="width:30%;float:left">
                        Website Country:
                    </td>
                    <td style="width:70%">
                       {{ country()->name }}
                    </td>
                </tr>
                @foreach($orderDetail->lineItems as $item)
                <tr style="background-color: #F2F2F2; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                    <td style="width:30%;float:left">
                        Course Name:
                    </td>
                    <td style="width:70%">
                        {{ $item->course_name }}
                    </td>
                </tr>
                <tr style="background-color: #ffffff; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                    <td style="width:30%;float:left">
                        Booking Type :
                    </td>
                    <td style="width:70%">
                        @switch($item->delivery_method)
                        @case('classroom')
                        Classroom  
                        @break
                        @case('online')
                        Online self-paced
                        @break
                        @case('virtual')
                        Online Instructor-led
                        @break
                        @endswitch
                    </td>
                </tr>
                <tr style="background-color: #F2F2F2; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                    <td style="width:30%;float:left">
                        Location:
                    </td>
                    <td style="width:70%">
                        {{ $item->venue }}
                    </td>
                </tr>
                @unless(empty( $item->schedule_date))
                <tr style="background-color: #ffffff; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                    <td style="width:30%;float:left">
                        Chosen Date:
                    </td>
                    <td style="width:70%">
                        {{ $item->schedule_date }}
                    </td>
                </tr>
                @endunless

                @unless(empty($item->course_duration))
                <tr style="background-color: #F2F2F2; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                    <td style="width:30%;float:left">
                        Duration:
                    </td>
                    <td style="width:70%">
                        {{ $item->course_duration }}
                    </td>
                </tr>
                @endunless

                <tr style="background-color: #ffffff; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                    <td style="width:30%;float:left">
                        Course Fee:
                    </td>
                    <td style="width:70%">
                        {!! $orderDetail->country->currency_symbol !!}{{ ceil($item->price) }}
                    </td>
                </tr>
                @endforeach
                <tr style="background-color: #F2F2F2; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                    <td style="width:30%;float:left">
                        Total exe. VAT:
                    </td>
                    <td style="width:70%">
                        {!! $orderDetail->country->currency_symbol !!}{{ round($orderDetail->sub_total) }}
                    </td>
                </tr>

                @unless(empty($orderDetail->vat_amount))
                <tr style="background-color: #ffffff; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                    <td style="width:30%;float:left">
                        VAT:
                    </td>
                    <td style="width:70%">
                        {!! $orderDetail->country->currency_symbol !!}{{ ceil($orderDetail->vat_amount) }}
                    </td>
                </tr>
                @endunless

                @unless(empty($orderDetail->card_fee_amount))
                <tr style="background-color: #F2F2F2; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                    <td style="width:30%;float:left">
                        Card Fees:
                    </td>
                    <td style="width:70%">
                        {!! $orderDetail->country->currency_symbol !!}{{ ceil($orderDetail->card_fee_amount) }}
                    </td>
                </tr>
                @endunless

                @unless(empty($orderDetail->grand_total))
                <tr style="background-color: #ffffff; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                    <td style="width:30%;float:left">
                        Total Fees:
                    </td>
                    <td style="width:70%">
                        {!! $orderDetail->country->currency_symbol !!}{{ ceil($orderDetail->grand_total) }}
                    </td>
                </tr>
                @endunless
            </table>
        </div>
@endif
        <div style="margin-top:30px;float:left;width:100%">
            <div style="background-color:#1C2848;padding: 6px; color: #fff; font-size: 20px;width:100% ">
                Your Details
            </div>

            <table style="width:100%">

                @unless(empty($customerDetail))
                <tr style="background-color: #F2F2F2; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                    <td style="width:30%;float:left">
                        Name:
                    </td>
                    <td style="width:70%">
                        {{ $customerDetail->firstname }} {{ $customerDetail->lastname }}
                    </td>
                </tr>
                @endunless

                @unless(empty($customerDetail->telephone))
                <tr style="background-color: #ffffff; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                    <td style="width:30%;float:left">
                        Telephone:
                    </td>
                    <td style="width:70%">
                        {{ $customerDetail->telephone }}
                    </td>
                </tr>
                @endunless

                @unless(empty($customerDetail->mobile))
                <tr style="background-color: #F2F2F2; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                    <td style="width:30%;float:left">
                        Mobile:
                    </td>
                    <td style="width:70%">
                        {{ $customerDetail->mobile }}
                    </td>
                </tr>
                @endunless

                @unless(empty($customerDetail->email))
                <tr style="background-color: #ffffff; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                    <td style="width:30%;float:left">
                        Email:
                    </td>
                    <td style="width:70%">
                        {{ $customerDetail->email }}
                    </td>
                </tr>
                @endunless

            </table>

        </div>

        @unless(empty($billingDetail))
        <div style="margin-top:30px;float:left;width:100%">
            <div style="background-color: #1C2848;color:#ffffff;padding: 6px; font-size: 20px;width:100% ">
                Billing Details
            </div>

            <table style="width:100%">

                @unless(empty($billingDetail->firstname))
                <tr style="background-color: #1C2848;color:#ffffff; padding: 6px; font-size: 16px; float: left; width: 100%;">
                    <td style="width:30%;float:left">
                        Name:
                    </td>
                    <td style="width:70%">
                        {{ $billingDetail->firstname }} {{ $billingDetail->lastname }}
                    </td>
                </tr>
                @endunless

                @unless(empty($billingDetail->address1))
                <tr style="background-color: #ffffff; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                    <td style="width:30%;float:left">
                        Address 1:
                    </td>
                    <td style="width:70%">
                        {{ $billingDetail->address1 }}
                    </td>
                </tr>
                 @endunless

                @unless(empty($billingDetail->address2))
                <tr style="background-color: #F2F2F2; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                    <td style="width:30%;float:left">
                       Address 2:
                    </td>
                    <td style="width:70%">
                        {{ $billingDetail->address2 }}
                    </td>
                </tr>
                @endunless

                 @unless(empty($billingDetail->city))
                 <tr style="background-color: #ffffff; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                    <td style="width:30%;float:left">
                       City:
                    </td>
                    <td style="width:70%">
                        {{ $billingDetail->city }}
                    </td>
                </tr>
                @endunless

                @unless(empty($billingDetail->postcode))
                 <tr style="background-color: #F2F2F2; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                    <td style="width:30%;float:left">
                       Post Code:
                    </td>
                    <td style="width:70%">
                        {{ $billingDetail->postcode }}
                    </td>
                </tr>
                @endunless

                @unless(empty($billingDetail->province))
                <tr style="background-color: #ffffff; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                    <td style="width:30%;float:left">
                       Province:
                    </td>
                    <td style="width:70%">
                        {{ $billingDetail->province }}
                    </td>
                </tr>
                @endunless

                @unless(empty($billingDetail->country->name))
                 <tr style="background-color: #F2F2F2; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                    <td style="width:30%;float:left">
                       Country:
                    </td>
                    <td style="width:70%">
                        {{ $billingDetail->country->name }}
                    </td>
                </tr>
                @endunless

                    @unless(empty($customerDetail->preffered_contact_method))
                    <tr style="background-color: #c0c0c0; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                        <td style="width:30%;float: left">
                            Preferred Contact Method:
                        </td>
                        <td style="width:70%">
                            {{ $customerDetail->preffered_contact_method }}
                        </td>
                    </tr>
                    @endunless



            </table>

        </div>
        @endunless


        <div style="margin-top:30px;float:left;width:100%">
            <div style="color:  #1C2848; padding: 6px; font-size: 20px; width: 100%; font-weight: bold; border-bottom: 2px solid #1C2848;">
                What's Next?
            </div>
            <div>
                            
                <p>
                    Thank you for contacting  {{ websiteDetail()->name }}  - a learning advisor will be contacting you shortly.
                </p>
                <p>
                    If you would like to speak to a learning advisor more urgently please contact <b>{{ websiteDetail()->contact_number }}</b> or alternatively email <a href="mailto:{{ websiteDetail()->contact_email }}" style="color: #1C2848;">{{ websiteDetail()->contact_email }}</a>
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