@extends('cms.layouts.master')
@section('content')


 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Website Detail Form</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Website Detail Form</li>
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
                <h3 class="card-title">Website Detail Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              {{Form::model($websitedetail,['route'=>$submitRoute,"files"=>"true"])}}
                <div class="card-body">

                    <div class="form-group">
                        {{Form::label('country','Country')}}
                        {{Form::select('country_id',$countries,$websitedetail->country->country_code ,['tabindex'=>'-1','class'=>'form-control selectJS', 'placeholder'=>'Choose one'])}}
                    
                    </div>
                      
                  <div class="form-group">
                    {{Form::label('name','Name')}}
                    {{Form::text('name',null,['class'=>'form-control'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('address','Address')}}
                    {{Form::textarea('address',null,['class'=>'form-control ', 'rows'=>'4'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('contact_number','Contact Number')}}
                    {{Form::number('contact_number',null,['class'=>'form-control'])}}
                  </div>
                  
                  <div class="form-group">
                    {{Form::label('contact_email','Contact Email')}}
                    {{Form::email('contact_email',null,['class'=>'form-control'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('trainers','Trainers ')}}
                    {{Form::text('trainers',null,['class'=>'form-control '])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('courses','Courses')}}
                    {{Form::text('courses',null,['class'=>'form-control'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('learners','Learners')}}
                    {{Form::text('learners',null,['class'=>'form-control'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('reviews','Reviews')}}
                    {{Form::text('reviews',null,['class'=>'form-control '])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('locations','Locations')}}
                    {{Form::text('locations',null,['class'=>'form-control'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('image','Logo')}}
                    {{Form::file('image',null,['class'=>'form-control'])}}
                    <img src="{{ $websitedetail->getLogoPath() }}" class=" pad" style="max-width:50%"/>
                  </div>

                  <div class="form-group">
                    {{Form::label('contact_footer','Contact Footer')}}
                    {{Form::textarea('contact_footer',null,['class'=>'form-control summernote'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('copyright_footer','Copyright Footer')}}
                    {{Form::textarea('copyright_footer',null,['class'=>'form-control summernote'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('opening_hours','Opening Hours')}}
                    {{Form::text('opening_hours',null,['class'=>'form-control'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('opening_days','Opening Days')}}
                    {{Form::text('opening_days',null,['class'=>'form-control'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('twitter','Twitter')}}
                    {{Form::text('twitter',null,['class'=>'form-control'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('facebook','Facebook')}}
                    {{Form::text('facebook',null,['class'=>'form-control'])}}
                  </div>
                  <div class="form-group">
                    {{Form::label('linkedin','Linkedin')}}
                    {{Form::text('linkedin',null,['class'=>'form-control'])}}
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
