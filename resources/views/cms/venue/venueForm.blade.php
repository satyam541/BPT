@extends('cms.layouts.master')
@section('content')


 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Venue Form</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('venueList')}}">Venue</a></li>
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
                <h3 class="card-title">Venue Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              {{Form::model($venue,['route'=>$submitRoute,"files"=>"true"])}}
              <fieldset class="gllpLatlonPicker">  
              <div class="card-body">
                    
                  <div class="form-group">
                    {{Form::label('name','Name')}}
                    {{Form::text('name',null,['id'=>'name','class'=>'form-control'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('location_id','Location')}}
                    {{Form::select('location_id',$locations,null ,['id'=>'locationName','onchange'=>'updateSlug()','class'=>'form-control selectJS', 'placeholder'=>'Choose one'])}}
                    
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
                    {{Form::label('image','Image ')}}
                    {{Form::file('image',null,['class'=>'form-control'])}}
                    <img src="{{ $venue->getImagePath() }}" class=" pad" style="max-width:50%"/>
                  </div>

                  <div class="form-group">
                    {{Form::label('marker','Location Marker')}}
                    <div style="width: 100%;height: 300px;" class="gllpMap">Google Maps</div>
                        <br/>
                        <input type="hidden" class="gllpZoom" value="8"/>
                  </div>

                  <div class="form-group">
                    {!!Form::hidden('latitude',null,array_merge(['id'=>'gllpLatitudeId','class'=>'gllpLatitude form-control']))!!}
                    {!!Form::hidden('longitude',null,array_merge(['id'=>'gllpLongitudeId','class'=>'gllpLongitude form-control']))!!}
                  </div>

                  <div class="form-group">
                    {{Form::label('introduction','Introduction')}}
                    {{Form::textarea('introduction',null,['class'=>'form-control', 'rows'=>'4'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('description','Description')}}
                    {{Form::textarea('description',null,['class'=>'form-control summernote'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('meta_title','Meta Title')}}
                    {{Form::text('meta_title',null,['class'=>'form-control'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('meta_description','Meta Description')}}
                    {{Form::text('meta_description',null,['class'=>'form-control'])}}
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </fieldset>
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

        $("#name").on('input',function(){
        updateSlug();
    });

    });
    function updateSlug()
{
    var venue = $("#name").val();
    var slug = '/'+convertUrl(venue);  
    var selectedLocation=$('#locationName').val();
    var locations=<?php echo json_encode($locations); ?>;
    if(selectedLocation in locations){
      venueslug=locations[selectedLocation];
      slug=convertUrl(venueslug)+slug;
    }
    
    $("#reference").val(slug);
    
}
    $(document).bind("location_changed", function(event, object) {
        console.log("changed: " + $(object).attr('id') );
    });
</script>

    
@endsection
