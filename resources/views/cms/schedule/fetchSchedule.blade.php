@extends('cms.layouts.master')
@section('content')



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Fetch Schedules</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Fetch Schedules</li>
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
                                    Fetch Schedules
                                </div>
                            </div>
                            <form class="form-horizontal" id="fetchScheduleForm">
                                <div class="card-body">
                                    <div class="form-group row">
                                        {{Form::label('inputCountry','Select Country', ['class' => 'col-md-2 control-label  text-right'])}}
                                        
                                        <div class="col-sm-4">
                                            {{ Form::select('country', $list['countries'], null, ['tabindex'=>'-1','id' => 'inputCountry', 'class' => 'form-control selectJS', 'placeholder' => 'Choose Country']) }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        {{ Form::label('inputYear', 'Year', ['class' => 'col-md-2 control-label  text-right']) }}

                                        <div class="col-md-4">
                                            {{ Form::number('year', null, ['id' => 'inputYear', 'class' => 'form-control', 'min' => '2020', 'max' => '2099', 'required' => 'required']) }}

                                            @error('response_date')
                                                <span class="invalid-feedback bg-danger text-sm" role="alert">
                                                    <span>{{ $message }}</span>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <div class="col-sm-12 text-right">
                                        <button class="btn btn-primary">Fetch</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->

                        <div class="row">
                            <div class="card col-xs-12 col-sm-12 col-md-12 card-primary card-outline">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 col-xs-12">
                                                <p class="text-center">
                                                    Status : <strong id="api-progress-status">Idle<span id="api-progress-status-month"></span></strong>
                                                </p>
                                            <div class="progress-group" id="first-progress-bar">
                                                <span class="progress-text">No data</span>
                                                <span class="progress-number"><b>0</b>/0</span>
                            
                                                <div class="progress sm">
                                                    <div class="progress-bar  progress-bar-green" style="width: 0;"></div>
                                                </div>
                                            </div>
                                            <div class="progress-group" id="second-progress-bar">
                                                <span class="progress-text">No data</span>
                                                <span class="progress-number"><b>0</b>/0</span>
                            
                                                <div class="progress sm">
                                                    <div class="progress-bar  progress-bar-yellow" style="width: 0;"></div>
                                                </div>
                                            </div>
                                            <div class="progress-group" id="last-progress-bar">
                                                <span class="progress-text">No data</span>
                                                <span class="progress-number"><b>0</b>/0</span>
                            
                                                <div class="progress sm">
                                                    <div class="progress-bar progress-bar-aqua" style="width: 0;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
    var progressTitle = $("#api-progress-status")
    var progressTitleMonth = $("#api-progress-status-month")
    var progress1 = $("#first-progress-bar");
    var progress2 = $("#second-progress-bar");
    var progress3 = $("#last-progress-bar");
    var timer=null;
   function fetchSchedule()
   {
    var path = "{{route("fetchSchedule")}}";
    var country = $("#inputCountry").val();
    var year = $("#inputYear").val();
    var progressId = null;
    if(country == '' || year == '')
    {
        return false;
    }
    $.ajax({
        url:  path,
        type: 'POST',
        headers: { 'X-CSRF-TOKEN': $("meta[name='token']").attr('content') },
        dataType : 'html',
        data: {
            CountryID : country,
            EventYear : year
        },
        beforeSend:function()
        {
            $("#fetchScheduleForm :input").prop('disabled',true);
            $("#first-progress-bar").parent().find('.progress-bar').addClass(['progress-bar-striped','active']);
            progressId = setInterval(fetchApiStatus, 1000);
        },
        success: function (response) {
            console.log("fetch schedule log : "+response);
            alert("Schedule Fetch Complete")
        },
        complete: function()
        {
            clearInterval(progressId);
            $("#fetchScheduleForm :input").prop('disabled',false);
            $("#first-progress-bar").parent().find('.progress-bar').removeClass(['progress-bar-striped','active']);
           
            timer="true";
            console.log(timer);
        },
        error: function(response) {
            clearInterval(progressId);
            if(response.status == '404')
            {
                alert("Item not found");
            }
            else
            alert(response.statusText);
            
        }
    });
   }

   function fetchApiStatus()
   {
    $.ajax({
        url:  "{{route('fetchApiStatus')}}",
        dataType : 'json',
        success: function (response) {
            updateProgressBar(response);
        }
    });
    // $.getJSON(url,updateProgressBar);
   }

   function updateProgressBar(data)
   {
        //console.log(data);
       // progress1,progress2,progress3,progressTitle
       progressTitle.html(data.status, data.mo);
       progressTitleMonth.html('Month'+data.month);
       if(timer=="true")
      {
         
             $('#api-progress-status').text('Completed');
             $('.progress-bar').css("width","0");
             $('.progress-text').html('No data');
             $('.progress-number').html('<b>0 </b> / 0');
             return false;
      }
       if(data.first)
       {
           $.each(data,function(index,object){
               switch (index) {
                   case 'first':
                       element = progress1;
                       break;

                   case 'second':
                       element = progress2;
                       break;

                   case 'last':
                       element = progress3;
                       break;

                   default:
                       return true;
                       break;
               }
               if(object == null)
               {
                element.find('.progress-text').html('No data');
                element.find('.progress-number').html('<b>0 </b> / 0');
                element.find('.progress-bar').css('width',"0");
               }
               else
               {
                element.find('.progress-text').html(object.name);
                element.find('.progress-number').html('<b>'+object.current+' </b> / '+object.total);
                element.find('.progress-bar').css('width',((object.current*100)/object.total)+"%");
               }
           });
       }
   }

   $("#fetchScheduleForm").submit(function(e){
       e.preventDefault();
       fetchSchedule();
   })
</script>
@endsection
