@extends('cms.layouts.master')
@section('content')



 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">purchase</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#">purchase</a></li>
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
           
          <div class="card">

            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1">
                <thead>
                <tr>
                    <th>Order id</th>
                  <th>customer Email</th>
                  <th>Details</th>
                </tr>
                </thead>
                <tbody>
                
                    @foreach ($purchases as $purchase)
                    <tr>
                    <td>{{$purchase->id}}</td>
                    <td>{{$purchase->customer->email}}</td>
                    <td><a href="{{ route('BookingDetail',['id'=>$purchase->gateway_order_id]) }}" class="btn btn-primary" onclick="">Detail</a></td>
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
                        { "name": "Order id", "sorting":false, searching:false },
                        { "name": "customer Email" },
                        { "name": "Details", "sorting":false, searching:false }
              ]                    
            });

        });
        
    </script>
@endsection