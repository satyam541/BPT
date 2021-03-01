@extends('cms.layouts.master')
@section('content')


 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Addon Form</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('AddonList')}}">Addon</a></li>
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
                <h3 class="card-title">Addon Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              {{Form::model($result,['route'=>$submitRoute,"files"=>"true"])}}
              {{Form::hidden('id',null)}}
                <div class="card-body">
                    
                  <div class="form-group">
                    {{Form::label('name','Enter Name')}}
                    {{Form::text('name',null,['class'=>'form-control'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('description','Enter Description')}}
                    {{Form::text('description',null,['class'=>'form-control'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('addon_type','Select Type')}}
                    {{Form::select('addon_type',['book'=>'book'],null,['class'=>'form-control', 'placeholder' => 'Select Type'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('price','Enter Price')}}
                    {{Form::number('price',null,['class'=>'form-control'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('is_published','Is Published')}}
                    {{Form::checkbox('is_published')}}
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
