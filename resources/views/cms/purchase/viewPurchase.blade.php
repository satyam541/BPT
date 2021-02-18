@extends('cms.layouts.master')
@section('content')



 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">view Purchase</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#">view Purchase</a></li>
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
                Purchase Detail
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1">
                <thead>
                  <tr>
                      <th data-breakpoints="xs" data-type="number">ID</th>
                      <th>Email</th>
                      <th>Course Name</th>
                      <th>Course Duration</th>
                      <th data-breakpoints="xs">Price</th>
                      <th data-breakpoints="xs sm">Country</th>
                      <th data-breakpoints="xs sm">Location</th>
                      <th data-breakpoints="xs sm" data-type="date" data-format-string="MMMM Do YYYY">Event Date & Time</th>
                  </tr>
                </thead>
                <tbody>
                
                    @foreach($courses as $course)
                      <tr>
                          <td>{{$course->id}}</td>
                          <td>{{$course->email}}</td>
                          <td>{{$course->courseDisplayName}}</td>
                          <td>{{$course->courseDuration}}</td>
                          <td>{{$course->price}}</td>
                          <td>{{json_decode($course->country)->name}}</td>
                          <td>{{$course->location}}</td>
                          <td>{{date('M d Y H:i A', strtotime($course->event_date." ".$course->event_time))}}</td>
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
                        { "name": "Email" },
                        { "name": "Course Name" },
                        { "name": "Country" },
                        { "name": "Location" },
                        { "name": "Course Duration", "sorting":false, searching:false },
                        { "name": "Price", "sorting":false, searching:false },
                        { "name": "Event Date & Time", "sorting":false, searching:false }
              ]                    
            });

        });
        
    </script>
@endsection