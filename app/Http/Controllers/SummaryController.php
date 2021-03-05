<?php

namespace App\Http\Controllers;

use App\Models\Delegate;
use App\Models\Order;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;

class SummaryController extends Controller
{
    public function index()
    {
        $cartItems = Cart::content();
        if(Cart::count() == 0)
            return redirect('/cart');
        
        $details['cartItems'] = $cartItems;
        $details['customerData'] = session('customer');
        $details['billingData']  = session('billingData');
        $details['billingData']->refresh();
        $details['orderData']    = session('orderData');
        
        foreach ($cartItems as $cartItem)
        {
            $delegateData[$cartItem->rowId] = Delegate::where('line_id',$cartItem->options['line_id'])->get();
        }

        $details['delegateData'] = $delegateData;
        $timestamp               = strftime("%Y%m%d%H%M%S");
        $orderId                 = $details['orderData']->id;
        $gatewayOrderId          = $orderId.$timestamp;
        session(['gatewayOrderId',$gatewayOrderId]);
        $updateGatewayOrderId    = Order::find($orderId)->update(['gateway_order_id' => $gatewayOrderId]);
        
        if($updateGatewayOrderId == false)
        {
            dd("Sorry, some error encountered while processing your order. Please try again later !");
        }

        // customer detail, billing detail, order detail and type
        $mailData['type'] = 'Order Generated';
        $mailData['customerDetail'] =  $details['customerData'];
        $mailData['billingDetail']  =  $details['billingData'];
        $mailData['orderDetail']    =  $details['orderData'];
        if(config('app.env') != "local")
            Mail::to($details['customerData']->email)->cc(config('mail.from.address'))->send(new OrderMail($mailData));        
        $view                    = \View::make('email.cartOrder',$mailData);
        $mailData['emailsent']   =  $view->render();
      //  MakeJWTEnquiry($mailData);
        return view('cart/summary',$details);
    }

}
