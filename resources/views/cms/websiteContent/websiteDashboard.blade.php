@extends('cms.layouts.master')
@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
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
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$total_courses}}</h3>

                <p>Total Courses</p>
              </div>
              <div class="icon">
                <i class="fas fa-copy"></i>
              </div>
              <a href="{{Route('courseList')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$total_enquiries}}</h3>

                <p>Total Enquiries</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{Route('enquiryList')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$total_locations}}</h3>

                <p>Total Locations</p>
              </div>
              <div class="icon">
                <i class="fas fa-map-marker-alt"></i>
              </div>
              <a href="{{Route('locationList')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$total_schedules}}</h3>

                <p>Total Schedules</p>
              </div>
              <div class="icon">
                <i class="fas fa-calendar-alt"></i>
              </div>
              <a href="{{Route('scheduleList')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->





        <div class="row">
            <div class="col-xs-12 col-md-12 col-sm-12">
                  
          <div class="card">

            <!-- /.card-header -->
            <div class="card-body">
                        
                        <div class="table-responsive ">
                            <table id="example1"  class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Course Name</th>
                                        <th>Country</th>
                                        <th>Locations</th>
                                        <th>Dates</th>
                                        <th>View More</th>
                                    </tr>        
                                </thead>
                                <tbody>
                                  
                                    @foreach($courses as $course)
                            <tr>
                                <td><a href="{{ url($course['course_data']->reference) }}">
                                    {{$course['course_data']->name}}</a></td>
                            <td>United Kingdom</td>
                            <td>{{ $course['location_count']}}</td>
                            <td>{{ $course['schedule_count']}}</td>
                           <td><a href="{{ route('courseDashboard',$course['course_data']->id) }}"> <button type="button" class="btn btn-block btn-info">Info</button></a></td>
                             </tr>
                            @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>




        
       
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
                
            </div>
           
        </div>
    </div>
    </section>
@endsection

@section('footer')
    <script>
        $(document).ready(function(){
            $('#example1').DataTable({
              "columns": [
                        { "name": "Course Name" },
                        { "name": "Country" },
                        { "name": "Locations", "sorting":false, searching:false  },
                        { "name": "Dates", "sorting":false, searching:false  },
                        { "name": "View More", "sorting":false, searching:false }
              ]                    
            });
        });
    </script>
@endsection