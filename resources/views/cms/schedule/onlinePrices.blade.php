@extends('cms.layouts.master')
@section('content')



 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Online Price</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Online Price</li>
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
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="card card-primary card-outline">
              <div class="card-header">
                  <div class="card-title">
                 Online Price List
                  </div>
              </div>
              <div class="card-body">
              <table id="example1">
                <thead>
                <tr>
                    <th>Course</th>
                    <th>Price</th>
                    <th>Addons</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($onlinePrices as $onlinePrice)
                    <tr>
                        {{Form::open(['route' => array('updateOnlinePrice',$onlinePrice->id)])}}
                        <td>{{$onlinePrice->course->name ?? ''}}</td>
                        <td>
                        {{Form::text('amount', $onlinePrice->price ,array('class' => 'form-control')) }}
                        </td>
                        <td><a href="{{ route('courseAddonList',array($onlinePrice->id) ) }}" class="btn btn-warning btn-sm">AddOns</a></td>
                        <td><button type="submit" class="btn btn-danger">Update</button></td>
                        {{ Form::close() }}
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
                        { "name": "course" },
                        { "name": "price", "sorting":false, searching:false },
                        { "name": "Addons", "sorting":false, searching:false },
                        { "name": "action", "sorting":false, searching:false },
              ]                    
            });

    
        });
        
    </script>
@endsection