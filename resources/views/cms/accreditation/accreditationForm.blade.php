@extends('cms.layouts.master')
@section('content')


 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Accreditation Form</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('accreditationList')}}">Accreditation</a></li>
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
                <h3 class="card-title">Accreditation Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              {{Form::model($accreditation,['route'=>$submitRoute,"files"=>"true"])}}
                <div class="card-body">
                    
                  <div class="form-group">
                    {{Form::label('name','Name')}}
                    {{Form::text('name',null,['class'=>'form-control'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('image','Image')}}
                    {{Form::file('image',null,['class'=>'form-control'])}}
                    @if(!empty($accreditation->image))
                    <img id="aImage" src="{{ $accreditation->getImagePath() }}" class=" pad" height="70px" width="70px" />
                    @endif
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a class="fa fa-trash" id="removeimage" onclick="removeImage()" style="color: red"></a>
                    <a class="fas fa-undo" id="undoremoveimage" onclick="undoImage()" style="color: red"></a>
                    {{Form::hidden('removeimagetxt',null,array_merge(['id'=>'removeimagetxt','class' => 'form-control']))}}
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
        $(document).ready(function() {

            $('#undoremoveimage').hide();
            @if($accreditation['image'] == null)
             $('#removeimage').hide();
            @endif
 
        });
        function removeImage()
        {
            $('#removeimagetxt').val('removed');
            $('#aImage').attr('src','/images/no-image.png');
            $('#removeimage').hide();
            $('#undoremoveimage').show();
        }


        function undoImage()
        {
            $('#removeimagetxt').val(null);
            $('#aImage').attr('src','{{$accreditation->getImagePath()}}');
            $('#removeimage').show();
            $('#undoremoveimage').hide();
        }

    </script>

@endsection
