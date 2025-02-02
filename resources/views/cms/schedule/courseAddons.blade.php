@extends('cms.layouts.master')
@section('content')



 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Course Addons</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('onlinePriceList')}}">Online Price</a></li>
            <li class="breadcrumb-item active">Addons</li>
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
                  {{$onlineCourse->name}}
                  </div>
              </div>
              <div class="card-body">
              <table id="example1">
                <thead>
                <tr>
                    <th>Addon Name</th>
                    <th>Price</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($addons as $addon)
                    <tr>
                        <td>{{$addon->name}}</td>
                        <td>{{$addon->price}}</td>
                        
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
                        { "name": "Addon Name" },
                        { "name": "Price"  },
              ]                    
            });

    
        });
        
    </script>
@endsection