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
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('locationList')}}">Location</a></li>
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
                <h3 class="card-title">Location Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              {{Form::model($location,['route'=>$submitRoute,"files"=>"true"])}}
              <fieldset class="gllpLatlonPicker">
                <div class="card-body">
                    {{Form::hidden('id',null)}}
                  <div class="form-group">
                    {{Form::label('name','Name')}}
                    {{Form::text('name',null,['id'=>'name','class'=>'form-control'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('country_id','Country')}}
                    {{Form::select('country_id',$countries,strToLower($location->country_id),['tabindex'=>'-1','class'=>'form-control selectJS', 'placeholder'=>'Choose one'])}}
                    
                  </div>

                  <div class="form-group">
                    {{Form::label('region_id','Region')}}
                    {{Form::select('region_id',$regions,null,['tabindex'=>'-1','class'=>'form-control selectJS', 'placeholder'=>'Choose one'])}}
                    
                  </div>
                  <div class="form-group">
                    {{Form::label('tier','Select Tier')}}
                    {{Form::select('tier',$tier,null,['tabindex'=>'-1','class'=>'form-control selectJS', 'placeholder'=>'Choose one'])}}
                    
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
                    {{Form::label('image','Image',)}}
                    {!!Form::file('image')!!}
                    @if(!empty($location->image))
                    <img id="lImage" src="{{URL('/images/'.$location['image'])}}" height="70px" width="70px" />
                    @endif
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a class="fa fa-trash" id="removeimage" onclick="removeImage()" style="color: red"></a>
                    <a class="fas fa-undo" id="undoremoveimage" onclick="undoImage()" style="color: red"></a>
                    {{Form::hidden('removeimagetxt',null,array_merge(['id'=>'removeimagetxt','class' => 'form-control']))}}
                    <br/>
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
                    {{Form::textarea('description',null,['class'=>'form-control summernote'])}}
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
                    {{Form::select('inherit_schedule',$locations,null,['tabindex'=>'-1','class'=>'form-control selectJS','placeholder'=>'Select Location'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('is_popular','Is Popular',['class'=>'mr-1'])}}
                    <input type="checkbox" name="is_popular" @if($location->popular->exists)checked @endif>
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
    
    $('#undoremoveimage').hide();
          @if($location['image'] == null)
            $('#removeimage').hide();
          @endif


    });
    $(document).bind("location_changed", function(event, object) {
        console.log("changed: " + $(object).attr('id') );
    });

    function removeImage()
        {
            $('#removeimagetxt').val('removed');
            $('#lImage').attr('src','/images/no-image.png');
            $('#removeimage').hide();
            $('#undoremoveimage').show();
        }


        function undoImage()
        {
            $('#removeimagetxt').val(null);
            $('#lImage').attr('src','{{'/images/'.$location['image']}}');
            $('#removeimage').show();
            $('#undoremoveimage').hide();
        }
</script>

    
@endsection