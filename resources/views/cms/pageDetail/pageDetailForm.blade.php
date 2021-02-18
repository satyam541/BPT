@extends('cms.layouts.master')
@section('content')


 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Page Content Form</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Page Content Form</li>
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
                <h3 class="card-title">Page Content Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              {{Form::model($pageDetail,['route'=>$submitRoute,"files"=>"true"])}}
                <div class="card-body">

                  <div class="form-group">
                    {{Form::label('page_name','PageName')}}
                    {{Form::text('page_name',null,['class'=>'form-control'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('section','Section')}}
                    {{Form::text('section',null,['class'=>'form-control '])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('sub_section','Sub Section')}}
                    {{Form::text('sub_section',null,['class'=>'form-control'])}}
                  </div>
                  
                  <div class="form-group">
                    {{Form::label('heading','Heading')}}
                    {{Form::text('heading',null,['class'=>'form-control'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('content','Content')}}
                    {{Form::textarea('content',null,['class'=>'form-control summernote'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('page_tag_line','Page Tag Line')}}
                    {{Form::text('page_tag_line',null,['class'=>'form-control'])}}
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
