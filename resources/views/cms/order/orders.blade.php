@extends('cms.layouts.master')
@section('content')



 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Order</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Order</li>
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
        <div class="col-md-12">
           
          <div class="card card-primary card-outline">
            <div class="card-header">
              <div class="card-title">
                Order
              </div>
            </div>
           <div class="card">
              <div class="table-responsive" style="background-color: white">
                  <table class="table table-hover" id="example1">
                <thead>
                    <tr>
                        <th>Order No</th>
                        <th>Customer</th>
                        <th>Total Amount</th>
                        <th>Date</th>
                        <th>Gateway Response</th>
                        <th>Detail</th>
                    </tr>  
                </thead>
                <tbody>
                
                
                    @foreach($orders as  $index => $order)
                    <tr>
                         
                      
                        <td>{{ $order->gateway_order_id}}</td>
                        <td>{{optional($order->customer)->firstname}}</td>
                        <td>{{ $order->grand_total }}</td>
                        <td>{{ $order->created_at->format('d M, Y') }}</td>
                        <td>{{ $order->gateway_response }}</td>
                        <td><a href="{{ route('orderDetail',['id'=>$order->gateway_order_id]) }}" class="btn btn-primary" onclick="">Detail</a></td> 
                       
                    </tr>
                    @endforeach
                </tbody>
                
              </table>

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
@section('footer')
    <script>
        $(document).ready(function(){
            $('#example1').DataTable({
              "columns": [
                        { "name": "Order No" },
                        { "name": "Customer", "sorting":false, searching:false },
                        { "name": "Total Amount", "sorting":false, searching:false },
                        { "name": "Date", "sorting":true, searching:false },
                        { "name": "Gateway Response", "sorting":false, searching:false },
                        { "name": "Detail", "sorting":false, searching:false }

              ]  
                 
            });

            
        });
        
    </script>
@endsection