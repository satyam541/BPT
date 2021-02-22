<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
	<style>
	
	.container{width:100%;margin-top:10px;}
	.title{background-color: #0e6bdd; padding: 6px; color: #fff; font-size: 20px;width:100%;}
	table{width:100%;}
	th{background-color: #0e6bdd; padding: 6px; color: #fff;width:100%;}
    /* even select*/
	tr{ padding: 6px; color: black; font-size: 16px; float: left; width: 100%;}
    tr+tr,
    tr+tr+tr+tr,
    tr+tr+tr+tr+tr+tr,
    tr+tr+tr+tr+tr+tr+tr+tr,
    tr+tr+tr+tr+tr+tr+tr+tr+tr+tr,
    tr+tr+tr+tr+tr+tr+tr+tr+tr+tr+tr+tr,
    tr+tr+tr+tr+tr+tr+tr+tr+tr+tr+tr+tr+tr+tr,
    tr+tr+tr+tr+tr+tr+tr+tr+tr+tr+tr+tr+tr+tr+tr+tr{background-color: #f7f7f7;}
    /* odd select*/
    tr,
    tr+tr+tr,
    tr+tr+tr+tr+tr,
    tr+tr+tr+tr+tr+tr+tr,
    tr+tr+tr+tr+tr+tr+tr+tr+tr,
    tr+tr+tr+tr+tr+tr+tr+tr+tr+tr+tr,
    tr+tr+tr+tr+tr+tr+tr+tr+tr+tr+tr+tr+tr,
    tr+tr+tr+tr+tr+tr+tr+tr+tr+tr+tr+tr+tr+tr+tr,
    tr+tr+tr+tr+tr+tr+tr+tr+tr+tr+tr+tr+tr+tr+tr+tr+tr{background-color: #f0f0f0;}
	td{}
	td.one{width:30%;float:left;}
	td.two{width:70%;}
	.footer{float:left;width:100%;color:gray;font-size:12px;}
	table + table {margin-top:15px;}
	</style>
</head>
<body>
    <div style="width:100%;">
       
        <div>
                The following enquiry was submitted on  {{ strftime('%x %X') }} : 
        </div>

        @php $hideEmptyFields = false; @endphp
        <div class="container">
                    <table class="email-table">
					<tr><th colspan="2">Exam Request Details</th></tr>
                        @unless(empty($Country) && $hideEmptyFields)
                            <tr>
                                <td class="one">
                                    Country:
                                </td>
                                <td class="two">
                                    {{ $Country }}
                                </td>
                            </tr>
                        @endunless
                            @unless(empty($ExamCourse) && $hideEmptyFields)
                                <tr>
                                    <td class="one">
                                        Exam:
                                    </td>
                                    <td class="two">
                                        {{ $ExamCourse }}
                                    </td>
                                </tr>
                            @endunless
                            @unless(empty($Course) && $hideEmptyFields)
                                <tr>
                                    <td class="one">
                                        Course Completed:
                                    </td>
                                    <td class="two">
                                        {{ $Course }}
                                    </td>
                                </tr>
                            @endunless
                        @unless(empty($ExamDate) && $hideEmptyFields)
                            <tr>
                                <td class="one">
                                    Preferred Date:
                                </td>
                                <td class="two">
                                    {{ $ExamDate }}
                                </td>
                            </tr>
                        @endunless

                            @unless(empty($EventNumber) && $hideEmptyFields)
                                <tr>
                                    <td class="one">
                                        Event Number:
                                    </td>
                                    <td class="two">
                                        {{ $EventNumber }}
                                    </td>
                                </tr>
                            @endunless
                            @unless(empty($OrderNumber) && $hideEmptyFields)
                                <tr>
                                    <td class="one">
                                        Sales Order No:
                                    </td>
                                    <td class="two">
                                        {{ $OrderNumber }}
                                    </td>
                                </tr>
                            @endunless
							</table>
							<table>
							<tr><th colspan="2">Delegate Details</th></tr>
						@unless(empty($FirstName) && $hideEmptyFields)
                        <tr>
                            <td class="one">
                                Name:
                            </td>
                            <td class="two">
                                {{ $FirstName }}  {{$LastName}}
                            </td>
                        </tr>
                       @endunless
					   @unless(empty($Telephone) && $hideEmptyFields)
                        <tr>
                            <td class="one">
                                Phone:
                            </td>
                            <td class="two">
                             {{ $Telephone }}
                            </td>
                        </tr>
						@endunless
						@unless(empty($EmailId) && $hideEmptyFields)
                        <tr>
                            <td class="one">
                                Email:
                            </td>
                            <td class="two">
                             {{ $EmailId }}
                            </td>
                        </tr>
						@endunless

                            @unless(empty($JobTitle) && $hideEmptyFields)
                                <tr>
                                    <td class="one">
                                        Job Title:
                                    </td>
                                    <td class="two">
                                        {{ $JobTitle }}
                                    </td>
                                </tr>
                            @endunless
                        @unless(empty($prefferedContactMethod) && $hideEmptyFields)
                        <tr>
                            <td class="one">
                                Preferred Method Chosen:
                            </td>
                            <td class="two">
                             {{ $prefferedContactMethod }}
                            </td>
                        </tr>
                        @endunless

						@unless(empty($Address1) && $hideEmptyFields)
                        <tr>
                            <td class="one">
                                Address1:
                            </td>
                            <td class="two">
                             {{ $Address1 }}
                            </td>
                        </tr>
						@endunless

						@unless(empty($Address2) && $hideEmptyFields)
                        <tr>
                            <td class="one">
                                Address2:
                            </td>
                            <td class="two">
                             {{ $Address2 }}
                            </td>
                        </tr>
						@endunless
						@unless(empty($Town) && $hideEmptyFields)
                        <tr>
                            <td class="one">
                                Town:
                            </td>
                            <td class="two">
                             {{ $Town }}
                            </td>
                        </tr>
						@endunless
						@unless(empty($Postcode) && $hideEmptyFields)
                        <tr>
                            <td class="one">
                                Postcode:
                            </td>
                            <td class="two">
                             {{ $Postcode }}
                            </td>
                        </tr>
						@endunless
						@unless(empty($Comment) && $hideEmptyFields)
                        <tr>
                            <td class="one">
                                Comment:
                            </td>
                            <td class="two">
                             {{ $Comment }}
                            </td>
                        </tr>
						@endunless

                    </table>
          
        </div>

        <div class="footer">
            <p>
                The information transmitted is intended only for the person or entity to which it is addressed and may contain confidential and/or privileged material. Any review, retransmission, dissemination or other use of, or taking of any action in reliance upon, this information by persons or entities other than the intended recipient is prohibited. If you received this in error, please contact the sender and delete the material from any computer.
            </p>
        </div>

   </div>
</body>
</html>
