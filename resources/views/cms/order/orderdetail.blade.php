 @extends('cms.layouts.master')
@section('content')



 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Order Detail</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('orderList')}}">Orders</a></li>
            <li class="breadcrumb-item active">Detail</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <!-- left column -->
        <div class="col-xs-12 col-md-6">
            <div class="card-header">
                Order Detail
            </div>
          <div class="card">

            <!-- /.card-header -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table">
                        <tr>
                            <th>Line Item Count</th>
                            <td>{{$order->line_item_count}}</td>
                        </tr>
                        <tr>
                            <th>Subtotal</th>
                            <td>{{$order->sub_total}}</td>
                        </tr>
                        <tr>
                            <th>Vat Percenatge</th>
                            <td>{{$order->vat_percentage}}</td>
                        </tr>
                        <tr>
                            <th>Vat Amount</th>
                            <td>{{$order->vat_amount}}</td>
                        </tr>
                        <tr>
                            <th>Card Fees Percentage</th>
                            <td>{{$order->card_fees_percentage}}</td>
                        </tr>
                        <tr>
                            <th>Grand Total</th>
                            <td>{{$order->grand_total}}</td>
                        </tr>
                        <tr>
                            <th>Payment Method</th>
                            <td>{{$order->payment_method}}</td>
                        </tr>
                        <tr>
                            <th>Payment Detail</th>
                            <td>{{$order->payment_detail}}</td>
                        </tr>
                        <tr>
                            <th>Gateway Order Id</th>
                            <td>{{$order->gateway_order_id}}</td>
                        </tr>
                        <tr>
                            <th>Agreement Acceptance</th>
                            <td>{{$order->agreement_acceptance}}</td>
                        </tr>
                        <tr>
                            <th>Gateway Response</th>
                            <td>{{$order->gateway_response}}</td>
                        </tr>
                        <tr>
                            <th>Transaction Status</th>
                            <td>{{$order->transaction_status}}</td>
                        </tr>
                        <tr>
                            <th>Gateway Response</th>
                            <td>{{$order->gateway_response}}</td>
                        </tr>
                        <tr>
                            <th>Additional Info</th>
                            <td>{{$order->additional_info}}</td>
                        </tr>
                    </table>
            </div>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card --> 
        </div>
        <div class="col-xs-12 col-md-6">
            <div class="card-header">
                Customer Detail
            </div>
          <div class="card">

            <!-- /.card-header -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table">
                        <tr>
                            <th> First Name</th>
                            <td>{{optional($order->customer)->firstname}}</td>
                        </tr>
                        <tr>
                            <th>Last Name</th>
                            <td>{{optional($order->customer)->lastname}}</td>
                        </tr>
                        <tr>
                            <th>Telephone</th>
                            <td>{{optional($order->customer)->telephone}}</td>
                        </tr>
                        <tr>
                            <th>Mobile</th>
                            <td>{{optional($order->customer)->mobile}}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{optional($order->customer)->email}}</td>
                        </tr>
                        <tr>
                            <th>Company</th>
                            <td>{{optional($order->customer)->company}}</td>
                        </tr>
                        <tr>
                            <th>Contact Consent</th>
                            <td>{{optional($order->customer)->contact_consent}}</td>
                        </tr>
                        <tr>
                            <th>Others Consent</th>
                            <td>{{optional($order->customer)->others_consent}}</td>
                        </tr>

                        <tr>
                            <th>Preffered Contact Method</th>
                            <td>{{optional($order->customer)->preffered_contact_method}}</td>
                        </tr>
                        <tr>
                            <th>Marketing Consent</th>
                            <td>{{optional($order->customer)->marketing_consent}}</td>
                        </tr>
                    </table>
            </div>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card --> 
        </div>
        <div class="col-xs-12 col-md-6">
            <div class="card-header">
                Billing Detail
            </div>
          <div class="card">

            <!-- /.card-header -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table">
                        @unless(empty($order->billingDetail))
                            <tr>
                                <th> Id</th>
                                <td>{{$order->billingDetail->id}}</td>
                            </tr>
                            <tr>
                                <th>Title</th>

                                <td>{{$order->billingDetail->title}}</td>
                            </tr>
                            <tr>
                                <th>First Name</th>
                                <td>{{$order->billingDetail->firstname}}</td>
                            </tr>
                            <tr>
                                <th>Address 1</th>
                                <td>{{$order->billingDetail->address1}}</td>
                            </tr>
                            <tr>
                                <th>Address 2</th>
                                <td>{{$order->billingDetail->address2}}</td>
                            </tr>
                            <tr>
                                <th>City</th>
                                <td>{{$order->billingDetail->city}}</td>
                            </tr>
                            <tr>
                                <th>Post Code</th>
                                <td>{{$order->billingDetail->post_code}}</td>
                            </tr>
                            <tr>
                                <th>Province</th>
                                <td>{{$order->billingDetail->province}}</td>
                            </tr>
                            <tr>
                                <th>Company</th>
                                <td>{{$order->billingDetail->company}}</td>
                            </tr>
                            @endunless
                        </table>
            </div>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card --> 
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
