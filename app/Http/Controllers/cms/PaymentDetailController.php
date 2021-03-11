<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderCardType;

class PaymentDetailController extends Controller
{
    public function list()
    {
        $data['paymentDetail'] = OrderCardType::all();
        
        return view('cms.paymentDetail.paymentDetailList',$data);
    }

    public function create()
    {
        $data['paymentDetail'] = new OrderCardType();
        $data['submitRoute']   = 'paymentDetailInsert';

        return view('cms.paymentDetail.paymentDetailForm',$data);
    }

    public function insert(Request $request)
    {
        $input      = $request->except('_token');
        $data       = new OrderCardType();
        $data->card = $input['card'];
        $data->card_fees_in_percent = $input['card_fees_in_percent'];
        
        $data->save();
        return redirect()->route('paymentDetail')->with('success','Successfully Added');
    }

    public function edit($id)
    {
        $data['paymentDetail'] = OrderCardType::find($id);
        $data['submitRoute']   = ['paymentDetailUpdate','id'=>$id];

        return view('cms.paymentDetail.paymentDetailForm',$data);
    }

    public function update(Request $request,$id)
    {
        $input      = $request->except('_token');
        $data       = OrderCardType::find($id);
        $data->card = $input['card'];
        $data->card_fees_in_percent = $input['card_fees_in_percent'];
        
        $data->update();
        return redirect()->route('paymentDetail')->with('success','Successfully Updated');
    }
    
    public function delete($id)
    {
        OrderCardType::find($id)->delete();
    }
}
