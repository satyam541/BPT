@extends('cms.layouts.master')
@section('content')



 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Schedule</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Schedule</li>
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
               Manual Schedule List
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1">
                <thead>
                <tr>
                  <th>Course</th>
                  <th>Price</th>
                  <th>Location</th>
                  <th>Date</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                
                    @foreach ($schedules as $schedule)
                    <tr>
                    <td>{{$schedule->course->name}}</td>
                    <td>{{$schedule->response_price}}</td>
                    <td>{{$schedule->location->name}}</td>
                    <td>{{date('d-m-Y', strtotime($schedule->response_date))}}</td>
                    <td><a href="{{route('editManualSchedule',['schedule'=>$schedule->id])}}" class="fa fa-edit"></a>
                    <a href="#"onclick="deleteItem('{{ route('deleteManualSchedule',['schedule'=>$schedule->id]) }}')" class="fa fa-trash" style="color: red"></a>
                    </td>
                </tr>
                    @endforeach
                  
                
                </tfoot>
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
                        { "name": "Course" },
                        { "name": "Price" },
                        { "name": "Location" },
                        { "name": "Date" },
                        { "name": "Actions", "sorting":false, searching:false  },
              ]                    
            });
        });
    </script>
@endsection