@extends('cms.layouts.master')
@section('content')


 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Bullet Point Form</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route($type.'List')}}">{{ucfirst($type)}}</a></li>
            <li class="breadcrumb-item"><a href="{{route($type.'BulletPointList', ['module' => $module_id])}}">Bullet Points</a></li>
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
                <h3 class="card-title">{{$module->name}}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              {{Form::model($result,['route'=>$submitRoute,"files"=>"true"])}}
              {{Form::hidden('id',null)}}
                <div class="card-body">
                    
                  <div class="form-group">
                    {{Form::label('bullet_point_text','Bullet Point')}}
                    {{Form::text('bullet_point_text',null,['class'=>'form-control'])}}
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
