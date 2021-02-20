@extends('cms.layouts.master')
@section('content')


 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Testimonial Form</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Testimonial Form</li>
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
                <h3 class="card-title">Testimonial Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              {{Form::model($testimonial,['route'=>$submitRoute,"files"=>"true"])}}
                <div class="card-body">
                    
                  <div class="form-group">
                    {{Form::label('author','Author')}}
                    {{Form::text('author',null,['class'=>'form-control'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('location','Location')}}
                    {{Form::text('location',null,['class'=>'form-control'])}}
                    
                  </div>

                  <div class="form-group">
                    {{Form::label('title','Title')}}
                    {{Form::text('title',null,['class'=>'form-control'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('designation','Designation')}}
                    {{Form::text('designation',null,['class'=>'form-control'])}}
                  </div>
                  
                  <div class="form-group">
                    {{Form::label('content','Content')}}
                    {{Form::textarea('content',null,['class'=>'form-control'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('post_date','Post Date ')}}
                    {{Form::date('post_date',null,['class'=>'form-control '])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('image','Image')}}
                    {{Form::file('image',null,['class'=>'form-control'])}}
                    @if(!empty($testimonial->image))
                    <img src="{{URL($testimonial->image_path.$testimonial->image)}}" class=" pad" style="max-width: 50%" />
                    @endif
                  </div>

                  <div class="form-group">
                    {{Form::label('rating','Rating')}}
                    {{Form::select('rating',['1'=>1,'2'=>2,'3'=>3,'4'=>4,'5'=>5],null,['tabindex'=>'-1','class'=>'form-control selectJS', 'placeholder'=>'Select Rating..'])}}
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
