<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
</head>
<body>
    <div style="width:100%">
        <h4>
            Dear {{ $enquiry->name }},
        </h4>
        <br/>
       
       
       
        <div style="margin-top:10px;">
            <div style="background-color: #FBDA84 ;padding: 6px; color: #47484a; font-size: 20px;width:100% ">
               Enquiry Details
            </div>

            <table style="width:100%">
                @if(!empty($enquiry->course))
                <tr style="background-color: #EFEDEE; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                    <td style="width:30%;float:left">
                      Course
                    </td>
                    <td style="width:70%">
                        {{ $enquiry->course}}
                    </td>
                </tr>
                @endif
                @if(!empty($enquiry->name))
                <tr style="background-color: #EFEDEE; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                    <td style="width:30%;float:left">
                       Name
                    </td>
                    <td style="width:70%">
                       {{ $enquiry->name }}
                    </td>
                </tr>
                @endif
                @if(!empty($enquiry->email))
                <tr style="background-color: #EFEDEE; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                    <td style="width:30%;float:left">
                        Email
                    </td>
                    <td style="width:70%">
                        {{ $enquiry->email }}
                    </td>
                </tr>
                @endif
                @if(!empty($enquiry->type))
                <tr style="background-color: #EFEDEE; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                    <td style="width:30%;float:left">
                        Booking Type :
                    </td>
                    <td style="width:70%">
                        {{ $enquiry->type }}
                    </td>
                </tr>
                @endif
                @if(!empty($enquiry->message))
                <tr style="background-color: #EFEDEE; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                    <td style="width:30%;float:left">
                       Message
                    </td>
                    <td style="width:70%">
                        {{ $enquiry->message }}
                    </td>
                </tr>
                @endif
                @if(!empty($enquiry->company))
                <tr style="background-color: #EFEDEE; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                    <td style="width:30%;float:left">
                       Company
                    </td>
                    <td style="width:70%">
                        {{ $enquiry->company }}
                    </td>
                </tr>
                @endif

                @if(!empty($enquiry->address))
                <tr style="background-color: #EFEDEE; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                    <td style="width:30%;float:left">
                        Address:
                    </td>
                    <td style="width:70%">
                        {{ $enquiry->address }}
                    </td>
                </tr>
                @endif
                @if(!empty($enquiry->city))
                <tr style="background-color: #EFEDEE; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                    <td style="width:30%;float:left">
                       City
                    </td>
                    <td style="width:70%">
                         {{ $enquiry->city }}
                    </td>
                </tr>
                @endif
                @if(!empty($enquiry->date))
                <tr style="background-color: #EFEDEE; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                    <td style="width:30%;float:left">
                        Date
                    </td>
                    <td style="width:70%">
                        {{$enquiry->date}}
                    </td>
                </tr>
                @endif

                @if(!empty($enquiry->delegates ))
                <tr style="background-color: #EFEDEE; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                    <td style="width:30%;float:left">
                        Delegate
                    </td>
                    <td style="width:70%">
                       {{$enquiry->delegates}}
                    </td>
                </tr>
                @endif

                @if(!empty($enquiry->location ))
                <tr style="background-color: #EFEDEE; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                    <td style="width:30%;float:left">
                       Location
                    </td>
                    <td style="width:70%">
                         {{$enquiry->location}}
                    </td>
                </tr>
                @endif

            
            </table>
        </div>



        <div style="margin-top:30px;float:left;width:100%">
            <div style="color:  #FBDA84 ; padding: 6px; font-size: 20px; width: 100%; font-weight: bold; border-bottom: 2px solid #17365d;">
                What's Next?
            </div>
            <div>
                            
                <p>
                    Thank you for contacting {{ websiteDetail()->name }} - a learning advisor will be contacting you shortly.
                </p>
                <p>
                    If you would like to speak to a learning advisor more urgently please contact <b>{{ websiteDetail()->contact_number }}</b> or alternatively email <a href="mailto:{{ websiteDetail()->contact_email }}" style="color: #FBDA84;">{{ websiteDetail()->contact_email }}</a>
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