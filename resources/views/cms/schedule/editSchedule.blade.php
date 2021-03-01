@extends('cms.layouts.master')
@section('content')


 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Edit Manual Schedule</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('manualScheduleList')}}">Schedule</a></li>
            <li class="breadcrumb-item active">Edit Schedule</li>
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
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Manual Schedule</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              {{Form::model($schedule,array('route'=>$submitRoute,'files'=>'true'))}}  
              <div class="card-body">
                    
                  <div class="form-group">
                    {{Form::label('course_id','Course Name')}}
                    {{ Form::select('course_id',$list['courses'],null,['id'=>'inputCourse','class'=>'form-control selectJS', 'placeholder'=>'Choose one','onchange'=>"updateDuration()"])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('country_id','Country')}}
                    {{ Form::select('country_id',$list['countries'],null,['id'=>'inputCountry','class'=>'form-control selectJS', 'placeholder'=>'Choose one','onchange'=>"updateLocations()"])}}
                    
                  </div>
                  <div class="form-group">
                    {{Form::label('location','Location')}}
                    {{ Form::select('location',$list['locations'],$schedule->location->id,['id'=>'inputLocation','class'=>'form-control selectJS', 'placeholder'=>'Choose one',"onchange"=>"updateVenue()"])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('duration','Duration')}}
                    {{Form::text('duration',null,['id'=>'inputDuration','class'=>'form-control'])}}
                  </div>
                  
                  <div class="form-group">
                    {{Form::label('response_date','Event Date')}}
                    {{Form::text('response_date',date('d-m-Y', strtotime($schedule->response_date)),['id'=>'inputDates','class'=>'form-control'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('event_time','Event Time ')}}
                    {{Form::time('event_time',"10:00:00",['id'=>'inputTime','class'=>'form-control'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('event_price','Event Price in GBP')}}
                    {{Form::number('event_price',null,['id'=>'inputPrice','step'=>'0.01','class'=>'form-control'])}}
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                {{Form::close()}}
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
    $(document).ready(function () {
        $("#inputDates").datepicker({
            dateFormat: "yy-m-d",
           
            
        });
    });
    </script>
@endsection