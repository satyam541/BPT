<?php

namespace App\Http\Controllers\cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use  App\Models\OrderLineItem;
use App\Models\Delegate;
use App\Models\Order;
use App\Models\BillingDetail;
class OrderController extends Controller
{
    
    public function orderList()
    {
        $this->authorize('view', new Order());

        // $data['orderlineitems']=OrderLineItem::with(['order.customer'])->paginate(10);
        $data['orders']  = Order::with('customer')->whereNotNull('gateway_order_id')->orderBy("created_at",'DESC')->paginate(10);
        return view('cms.order.orders',$data);
    }

    public function orderDetail($id)
    {
        $data['order']=Order::with(["customer",'billingDetail','lineItems'])->where('gateway_order_id',$id)->first();
        
        return view('cms.order.orderdetail',$data);
    }
}
