@extends('cms.layouts.master')
@section('content')


 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Category Form</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#">Category</a></li>
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
                <h3 class="card-title">Category Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              {{Form::model($category,['route'=>$submitRoute,"files"=>"true"])}}
                <div class="card-body">
                  <div class="form-group">
                    {{Form::label('name','Name')}}
                    {{Form::text('name',null,['class'=>'form-control'])}}

                    {{-- <input type="name" class="form-control" id="exampleInputEmail1" placeholder="Enter email"> --}}
                  </div>
                  <div class="form-group">
                    {{Form::label('reference','Reference')}}
                    {{Form::text('reference',null,['class'=>'form-control'])}}
                    
                  </div>
                  <div class="form-group">
                    {{Form::label('tag_line','Tag Line')}}
                    {{Form::textarea('tag_line',null,['class'=>'form-control ', 'rows'=>"4"])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('color_code','Color Code')}}
                    {{Form::text('color_code',null,['class'=>'form-control ','title'=>'Any valid color_code that work for css'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('image','Image')}}
                    {{Form::file('image',null,['class'=>'form-control'])}}
                    <img src="{{ $category->getImagePath() }}" class=" pad" style="max-width: 50%" />
                  </div>

                  <div class="form-group">
                    {{Form::label('icon','Icon')}}
                    {{Form::file('icon',null,['class'=>'form-control'])}}
                    <img src="{{ $category->getIconPath() }}" class=" pad" style="max-width:50%;" />
                  </div>

                  <div class="form-group">
                      
                    {{Form::label('is_online','Is Online')}}
                    {{Form::checkbox('is_online')}}

                  </div>

                  <div class="form-group">
                    {{Form::label('is_technical','Is technical')}}
                    {{Form::checkbox('is_technical')}}
                  </div>

                  <div class="form-group">
                    {{Form::label('published','Is Published')}}
                    {{Form::checkbox('published')}}
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