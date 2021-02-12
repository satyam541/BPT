@extends('cms.layouts.master')
@section('content')


 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Location Form</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#">Location</a></li>
            <li class="breadcrumb-item"><a href="#">Form</a></li>
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
                <h3 class="card-title">Location Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              {{Form::model($location,['route'=>$submitRoute,"files"=>"true"])}}
                <div class="card-body">
                    {{Form::hidden('id',null)}}
                  <div class="form-group">
                    {{Form::label('name','Name')}}
                    {{Form::text('name',null,['id'=>'name','class'=>'form-control'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('country_id','Country')}}
                    {{Form::select('country_id',$countries,$location->country_id,['class'=>'form-control selectJS', 'placeholder'=>'Choose one'])}}
                    
                  </div>

                  <div class="form-group">
                    {{Form::label('region_id','Region')}}
                    {{Form::select('region_id',$regions,null,['class'=>'form-control selectJS', 'placeholder'=>'Choose one'])}}
                    
                  </div>

                  <div class="form-group">
                    {{Form::label('address','Address')}}
                    {{Form::textarea('address',null,['class'=>'form-control ', 'rows'=>'4'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('reference','Reference')}}
                    {{Form::text('reference',null,['id'=>'reference','class'=>'form-control'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('phone','Phone')}}
                    {{Form::text('phone',null,['class'=>'form-control'])}}
                  </div>
                  
                  <div class="form-group">
                    {{Form::label('email','Email')}}
                    {{Form::text('email',null,['class'=>'form-control'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('intro','Intro')}}
                    {{Form::textarea('intro',null,['class'=>'form-control', 'rows'=>'4'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('image','Image',['class'=>'form-control'])}}
                    {!!Form::file('image')!!}
                    <br/>
                    @if($location['image']=='')
                        <img src="{{URL('/images/no-image.png')}}" style="width: 150px" />
                    @else
                        <img src="{{URL('/images/'.$location['image'])}}" style="width: 150px" />
                    @endif
                  </div>

                  <div class="form-group">
                    {{Form::label('inputEmail23','Location Marker')}}
                    <div style="width: 100%;height: 300px;" class="gllpMap">Google Maps</div>
                        <br/>
                        <input type="hidden" class="gllpZoom" value="8"/>
                  </div>

                  <div class="form-group">
                    {!!Form::hidden('latitude',$location['latitude'],array_merge(['id'=>'gllpLatitudeId','class'=>'gllpLatitude form-control']))!!}
                    {!!Form::hidden('longitude',$location['longitude'],array_merge(['id'=>'gllpLongitudeId','class'=>'gllpLongitude form-control']))!!}
                  </div>

                  <div class="form-group">
                    {{Form::label('description','Description')}}
                    {{Form::textarea('description',null,['class'=>'form-control', 'id'=>'summernote'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('meta_title','meta Title')}}
                    {{Form::text('meta_title',null,['class'=>'form-control'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('meta_description','meta Description')}}
                    {{Form::text('meta_description',null,['class'=>'form-control'])}}
                  </div>
                  
                  <div class="form-group">
                    {{Form::label('meta_keywords','meta Keywords')}}
                    {{Form::text('meta_keywords',null,['class'=>'form-control'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('fetch_schedule','fetch_schedule')}}
                    {{Form::checkbox('fetch_schedule',1)}}
                  </div>

                  <div class="form-group">
                    {{Form::label('inherit_schedule','Inherit Schedule')}}
                    {{Form::select('inherit_schedule',$locations,null,['class'=>'form-control selectJS','placeholder'=>'Select Location'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('is_popular','Is Popular',['class'=>'mr-1'])}}
                    {{Form::checkbox('is_popular')}}
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
@section('footerScripts')

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/js/select2.min.js"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyADlk166150RMLLGby78Ayq9kUKyAdHtp0"></script>
<script src="{{URL('/js/jquery-gmaps-latlon-picker.js?lnkn')}}"></script>
<script>
    $(document).ready( function() {

        if (!$.gMapsLatLonPickerNoAutoInit) {
            $(".gllpLatlonPicker").each(function () {
                $obj = $(document).gMapsLatLonPicker($('#gllpLatitudeId').val(),$('#gllpLongitudeId').val());
                $obj.init( $(this) );
            });
        }
        $("#name").on('focusout',function(){
        updateSlug();
    });
    function updateSlug()
{
    var location = $("#name").val();
    var slug = convertUrl(location);
    $("#reference").val(slug);
    
}
    });
    $(document).bind("location_changed", function(event, object) {
        console.log("changed: " + $(object).attr('id') );
    });
</script>
<script type="text/javascript">

    var url = "{{ route('autoRegion') }}";

    $('.autoRegion').typeahead({

        source:  function (query, process) {

        return $.get(url, { query: query }, function (data) {

                return process(data);

            });

        }

    });
</script>
    <script>
              $(".js-example-basic-multiple").select2({
                tags: true,
                theme: "classic",
                tokenSeparators: [',', ' ']
            })
        </script>

@endsection