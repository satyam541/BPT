<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email</title>
    
<style>
        *{
            box-sizing: border-box;
        }
        .box{
            margin-top: 10px;
            width: 100%;
            display: inline-block;
            /* flex-direction: column;  */
            align-items: center;
            }
        .title{
            margin: 0;
            border: 0;
            font: inherit;
            vertical-align: baseline;
            background-color: #191970;
            padding: 6px;
            color: #fff;
            font-size: 20px;
            width: 100%;
        }
        .table-box{
            position: relative;
            overflow: hidden;
        }
        .btn-pay{
            display: inline-block;
            padding: 6px 12px;
            margin-bottom: 0;
            font-size: 14px;
            font-weight: 400;
            line-height: 1.42857143;
            white-space: nowrap;
            text-align: center;
            vertical-align: middle;
            touch-action: manipulation;
            cursor: pointer;
            color: #fff;
            box-shadow: none;
            background-color: #205081;
            border-radius: 3px;
            border: 1px solid transparent;
            border-color: rgba(0,0,0,0.2);
        }
        .btn-pay:hover{
            color:#ddd;
        }
        .content{
            width: 500px;
            margin: auto;   
        }
        .footer{
            float: left;
            width: 100%;
            color: gray;
            font-size: 12px;
        }
        table{
            width: 100%;
        }
        tr{
            background-color: #f0f0f0;
            color: black;
            font-size: 16px;
            padding: 6px;
            float: left;
            width: 100%;
        }
        td{
            width: 30%;
            float: left;
        }
        tr td+td{    
            width: 70%;
        }
        .image-link{
            width: 100%;
        display: inline-block;
        text-align: center;
        }
        .text-center{
            text-align: center;
        }
    
    </style>
    </head>
    <body>
<div class="box" id="bookingDetail">
        <a href="https://www.sixsigma.co.uk/" target="_blank" class="image-link">
            {{-- <img src="https://www.pearcemayfield.com/images/pmf_logo.png" alt="logo" width="350"> --}}
        </a>
        <div class="text-center">Please follow the the instructions to pay for your purchase</div>
        <div class="content">
            <div class="title">Booking Detail</div>
            <div class="table-box">
                <table>
                <tbody>
                    <tr>
                        <td >Email: </td>
                        <td >{{ $email }}</td>
                    </tr>
                    <tr>
                        <td >Course: </td>
                        <td >{{ $courseName }}</td>
                    </tr>
                    <tr>
                        <td >Location: </td>
                        <td >{{ $location }}</td>
                    </tr>
                    <tr>
                        <td>Event Date: </td>
                        <td>{{ $eventDate }}</td>
                    </tr>
                    <tr>
                        <td>Currency: </td>
                        <td> {{ $currency }} </td>
                    </tr>
                    <tr>
                        <td>Price excl. VAT: </td>
                        <td> {{ $basePrice }} </td>
                    </tr>
                    <tr>
                        <td>Price incl. VAT: </td>
                        <td> {{ $totalAmount }} </td>
                    </tr>
                 
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <a class="btn-pay" href="{{$link}}">Pay Now</a>
                        </td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
        <div class="footer">
                <p>The information transmitted is intended only for the person or entity to which it is addressed and may contain confidential and/or privileged material. Any review, retransmission, dissemination or other use of, or taking of any action in reliance upon, this
                        information by persons or entities other than the intended recipient is prohibited. If you received this in error, please contact the sender and delete the material from any computer.
                       </p>
        </div>
    </div>
</body>
</html>