@extends('cms.layouts.master')
@section('content')


 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Edit Schedule</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('scheduleList')}}">Schedule</a></li>
            <li class="breadcrumb-item active">Form</li>
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
                <h3 class="card-title">Edit Schedule</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              {{Form::model($schedule,['route'=>$submitRoute,"files"=>"true"])}}
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
                    {{Form::label('location_id','Location')}}
                    {{ Form::select('location_id',$list['locations'],null,['id'=>'inputLocation','class'=>'form-control selectJS', 'placeholder'=>'Choose one',"onchange"=>"updateVenue()"])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('duration','Duration')}}
                    {{Form::text('duration',null,['id'=>'inputDuration','class'=>'form-control'])}}
                  </div>
                  
                  <div class="form-group">
                    {{Form::label('response_date','Event Date')}}
                    {{Form::date('response_date',null,['id'=>'inputDate','class'=>'form-control'])}}
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
    $('#checkAll').on('click', function(){
        checkAll($(this).is(':checked'));
    });
    function checkAll(state)
    {
        var locations = $("#locationCheck").find('input');
        $.each(locations, function(key, elm){
            $(elm).prop('checked', state);
        });
    }
function updateLocations()
{
    countryId = $("#inputCountry").val();
    locationVal = $("#inputLocation").val();
    
    if(!countryId)
    {
        return false;
    }
    $.ajax({
        url:"{{ route('locationsOfCountry') }}",
        data:{country:countryId},
        dataType:"JSON",
        method:"GET",
        success:function(locations){
            output = "";
            $.each(locations,function(i,location){
                output += '<span class="col-md-3"><input name="location[]" type="checkbox" id="location-'+location.id+'" value="'+location.name+'">';
                output += '<label for="location-'+location.id+'">&nbsp;&nbsp;&nbsp;'+location.name+'</label></span>';
            });
            $('#locations').html(output);
        },
        error: function(e)
        {
            console.log("something went wrong while fetching locations for country : "+countryId);
            console.log(e);
        }
    });
}
function updateDuration()
{
    courseId = $("#inputCourse").val();
    if(!courseId)
    {
        return false;
    }
    $.ajax({
        url:"{{ route('courseDetail') }}",
        data:{course:courseId},
        dataType:"JSON",
        method:"GET",
        success:function(course){
            $("#inputDuration").val(course.duration);
        },
        error: function(e)
        {
            console.log("something went wrong while fetching duration for course : "+courseId);
            console.log(e);
        }
    });
}

</script>

<script src="https://cdn.rawgit.com/dubrox/Multiple-Dates-Picker-for-jQuery-UI/master/jquery-ui.multidatespicker.js"></script>
<script>
    $(document).ready(function () {
        $("#inputDates").multiDatesPicker({
            dateFormat: "yy-m-d",
        });
        $(".selectJS").select2({
                tags: true,
                theme: "classic",
                tokenSeparators: [',', ' ']
               
          
      });
    });
</script>
@endsection