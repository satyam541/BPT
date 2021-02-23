@extends('cms.layouts.master')
@section('content')


 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Update Permission</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('permissionList')}}">Permissions</a></li>
            <li class="breadcrumb-item active">Edit</li>
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
                <h3 class="card-title">Update Permission</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              {{Form::model($permission,array('route'=>array('updatePermission',$permission->id))) }}
                <div class="card-body">
                  <div class="form-group">
                    {{Form::label('moduleName','Module Name')}}
                    {{Form::text('moduleName',null,['class'=>'form-control','id'=>'autoModule'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('access','Access')}}
                    {{Form::text('access',null,['class'=>'form-control'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('description','Description')}}
                    {{Form::text('description',null,['class'=>'form-control'])}}
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
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
    var path = "{{ route('moduleAutoComplete') }}";
    $('#autoModule').typeahead({
        source:  function (query, process) {
        return $.get(path, { term: query }, function (data) {
                return process(data);
            });
        }
    });
    </script>
@endsection