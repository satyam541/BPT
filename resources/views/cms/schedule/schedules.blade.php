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
                Schedule List
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-border">
                <thead>
                <tr>
                  <th>Course</th>
                  <th>Price</th>
                  <th>Location</th>
                  <th>Date</th>
                  <th>
                    @can('update',new App\Models\Schedule())
                    Actions
                    @endcan
                  </th>
                </tr>
                </thead>
                <tbody>
                
                    @foreach ($schedules as $schedule)
                    <tr>
                    <td>{{$schedule->course->name}}</td>
                    <td>{{$schedule->response_price}}</td>
                    <td>{{$schedule->location->name}}</td>
                    <td>{{$schedule->response_date}}</td>
                    <td>
                      @can('update',$schedule)
                      <a href="{{Route('editSchedule',['schedule'=>$schedule->id])}}" class="fa fa-edit"></a>
                      @endcan
                      @can('delete',$schedule)
                      <a href="#" onclick="deleteItem('{{ route('deleteSchedule',['schedule'=>$schedule->id])}}')" class="fa fa-trash" style="color: red"></a>
                      @endcan
                    </td>
                </tr>
                    @endforeach

                  
                
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <div class="float-right">
                {{$schedules->links()}}
              </div>
             
            </div>
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
       
    </script>
@endsection