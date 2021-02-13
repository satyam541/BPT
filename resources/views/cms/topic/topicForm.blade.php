@extends('cms.layouts.master')
@section('content')


 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Topic Form</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#">Topic</a></li>
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
                <h3 class="card-title">Topic Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <input type="hidden" name="categorySlug" value="{{ $categorySlug }}" id="categorySlug">
              {{Form::model($topic,['route'=>$submitRoute,"files"=>"true"])}}
                <div class="card-body">

                  <div class="form-group">
                    {{Form::label('name','Name')}}
                    {{Form::text('name',null,['class'=>'form-control'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('category_id','Category')}}
                    {{Form::select('category_id',$categories,null,['class'=>'form-control js-example-basic-multiple', 'placeholder'=>'Choose one'])}}
                    
                  </div>
                  <div class="form-group">
                    {{Form::label('reference','Reference')}}
                    {{Form::text('reference',null,['class'=>'form-control '])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('tag_line','Tag Line')}}
                    {{Form::text('tag_line',null,['class'=>'form-control'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('image','Image')}}
                    {{Form::file('image',null,['class'=>'form-control'])}}
                    <img src="{{ $topic->getImagePath() }}" class=" pad" style="max-width: 50%" />
                  </div>
                  
                  <div class="form-group">
                    {{Form::label('ip_trademark','Ip Trademark')}}
                    {{Form::textarea('ip_trademark',null,['class'=>'form-control  summernote'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('accreditation_id','Accreditation')}}
                    {{ Form::select('accreditation_id',$list['accreditations'],null,['class'=>'form-control js-example-basic-multiple', 'placeholder'=>'Choose one'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('accredited','Is Accredited',['class'=>'mr-1'])}}
                    {{Form::checkbox('accredited')}}
                  </div>

                  <div class="form-group">
                    {{Form::label('is_online','Is Online',['class'=>'mr-4'])}}
                    {{Form::checkbox('is_online')}}
                  </div>

                  <div class="form-group">
                    {{Form::label('priority','Has Priority',['class'=>'mr-1'])}}
                    {{Form::checkbox('priority')}}
                  </div>
                  <div class="form-group">
                    {{Form::label('published','Is Published',['class'=>'mr-1'])}}
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
@section('footer')

                 <script>
              $(".js-example-basic-multiple").select2({
                tags: true,
                tags: true,
                theme: "classic",
                tokenSeparators: [',', ' ']
               
            });
        </script>
            
@endsection