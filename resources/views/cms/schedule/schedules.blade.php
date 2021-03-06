@extends('cms.layouts.master')
@section('content')



<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h1>Schedule</h1>
              </div>
              <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                      <li class="breadcrumb-item active">Schedule</li>
                  </ol>
              </div>
          </div>
  <!-- /.content-header -->
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="card card-primary card-outline">

            <div class="card-header">
                <div class="card-title">
                    Filter content
                </div>
            </div>
            <div class="card-body">
                <form action="" class="form-horizontal">
                    <div class="form-group row">
                      <label for="inputCourse" class="col-sm-2 control-label">Course</label>
                        <div class="col-sm-4">
                            {{ Form::select('course',$list['courses'],null,['id'=>'inputCourse','class'=>'form-control select', 'placeholder'=>'ALL'])}}
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="inputLocation" class="col-sm-2 control-label">Location</label>
                        <div class="col-sm-4">
                            {{ Form::select('location',$list['locations'],null,['id'=>'inputLocation','class'=>'form-control select', 'placeholder'=>'ALL'])}}
                        </div>
                    </div>
                    <div class="box-footer">
                      <div class="col-sm-12 text-right">
                          <button class="btn btn-primary">Submit</button>
                      </div>
                  </div>
   
                </div>
                </form>
            </div>

        </div>
    </div>
</div>

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
                
                    @forelse ($schedules as $schedule)
                    <tr>
                    <td>{{$schedule->course['name']}}</td>
                    <td>{{$schedule->response_price}}</td>
                    <td>{{$schedule->location->name ?? 'Virtual'}}</td>
                    <td>{{date('d-m-Y', strtotime($schedule->response_date))}}</td>
                    <td>
                      @can('update',$schedule)
                      <a href="{{Route('editSchedule',['schedule'=>$schedule->id])}}" class="fa fa-edit"></a>
                      @endcan
                      @can('delete',$schedule)
                      <a href="#" onclick="deleteItem('{{ route('deleteSchedule',['schedule'=>$schedule->id])}}')" class="fa fa-trash" style="color: red"></a>
                      @endcan
                    </td>
                </tr>
                    @empty
                    <marquee behavior='alternate' direction='right'><h3>No Data Available</h3></marquee>
                    @endforelse

                  
                
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
  $('.select').select2();
  </script>

@endsection