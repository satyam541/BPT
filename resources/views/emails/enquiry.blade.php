

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
</head>
<body>
    <div style="width:100%;">
       
        <div>
            The following enquiry was submitted on  {{ strftime('%x %X') }} : 
        </div>


        <div style="margin-top:10px; width:100%">
            <div style="background-color: #0063d8;padding: 6px; color: #fff; font-size: 20px;width:100% ">
                Enquiry Details
            </div>
                    <table style="width:100%">
					@unless(empty($enquiry->name)) 
                        <tr style="background-color: #EFEDEE; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                            <td style="width:30%;float:left">
                                Name:
                            </td>
                            <td style="width:70%">
                                {{ $enquiry->name }}
                            </td>
                        </tr>
                       @endunless
					   @unless(empty($enquiry->phone))
                        <tr style="background-color: #EFEDEE; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                            <td style="width:30%;float:left">
                                Phone:
                            </td>
                            <td style="width:70%">
                             {{ $enquiry->phone }}
                            </td>
                        </tr>
						@endunless
						@unless(empty($enquiry->email))
                        <tr style="background-color: #EFEDEE; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                            <td style="width:30%;float:left">
                                Email:
                            </td>
                            <td style="width:70%">
                             {{ $enquiry->email }}
                            </td>
                        </tr>
						@endunless

                        @unless(empty($enquiry->prefferedContactMethod))
                        <tr style="background-color: #EFEDEE; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                            <td style="width:30%;float:left">
                                 Preferred Method Chosen:
                            </td>
                            <td style="width:70%">
                             {{ $enquiry->prefferedContactMethod }}
                            </td>
                        </tr>
                        @endunless

						@unless(empty($enquiry->delegates))
                        <tr style="background-color: #EFEDEE; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                            <td style="width:30%;float:left">
                                Delegates:
                            </td>
                            <td style="width:70%">
                             {{ $enquiry->delegates }}
                            </td>
                        </tr>
						@endunless
						@unless(empty($enquiry->company))
						 <tr style="background-color: #EFEDEE; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                            <td style="width:30%;float:left">
                                Company:
                            </td>
                            <td style="width:70%">
                             {{ $enquiry->company }}
                            </td>
                        </tr>
						@endunless
						@unless(empty($enquiry->address))
                        <tr style="background-color: #EFEDEE; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                            <td style="width:30%;float:left">
                                Address:
                            </td>
                            <td style="width:70%">
                             {{ $enquiry->address }}
                            </td>
                        </tr>
						@endunless
						@unless(empty($enquiry->message))
                        <tr style="background-color: #EFEDEE; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                            <td style="width:30%;float:left">
                                Message:
                            </td>
                            <td style="width:70%">
                             {{ $enquiry->message }}
                            </td>
                        </tr>
						@endunless

                        @unless(empty($enquiry->course))
                        <tr style="background-color: #EFEDEE; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                            <td style="width:30%;float:left">
                                Course Name:
                            </td>
                            <td style="width:70%">
                             {{ $enquiry->course }}
                            </td>
                        </tr>
                        @endunless

                        @unless(empty($enquiry->Package))
                        @php $Package = json_decode($Package) @endphp
                            <tr style="background-color: #EFEDEE; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                                <td style="width:30%;float:left">
                                    Package Opted:
                                </td>
                                <td style="width:70%">
                                 {{ $Package->packageName }}
                                </td>
                            </tr>
                            <tr style="background-color: #EFEDEE; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                                <td style="width:30%;float:left">
                                    Package Price:
                                </td>
                                <td style="width:70%">
                                 £ {{ $Package->price }}
                                </td>
                            </tr>
                        @endunless

                        @unless(empty($Schedule))
                        <tr style="background-color: #EFEDEE; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                            <td style="width:30%;float:left">
                                Schedule Location:
                            </td>
                            <td style="width:70%">
                             {{ $Schedule->responseLocation }}
                            </td>
                        </tr>
                        <tr style="background-color: #EFEDEE; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                            <td style="width:30%;float:left">
                                Schedule Date:
                            </td>
                            <td style="width:70%">
                             {{ date('d-m-Y',strtotime($Schedule->responseDate)) }}
                            </td>
                        </tr>
                        <tr style="background-color: #EFEDEE; padding: 6px; color: black; font-size: 16px; float: left; width: 100%;">
                            <td style="width:30%;float:left">
                                Schedule Price:
                            </td>
                            <td style="width:70%">
                             £ {{  $Schedule->eventPrice }}
                            </td>
                        </tr>
                        @endunless
                        


                    </table>
          
        </div>

        <div style="float:left;width:100%;color:gray;font-size:12px;">
            <p>
                The information transmitted is intended only for the person or entity to which it is addressed and may contain confidential and/or privileged material. Any review, retransmission, dissemination or other use of, or taking of any action in reliance upon, this information by persons or entities other than the intended recipient is prohibited. If you received this in error, please contact the sender and delete the material from any computer.
            </p>
        </div>

   </div>
</body>
</html>
