@extends('cms.layouts.master')
@section('content')


 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Whats Included Form</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('whatsincludedListRoute')}}">Whats Included</a></li>
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
                <h3 class="card-title">Whats Included Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              {{Form::model($whatsincluded,['route'=>$submitRoute,"files"=>"true"])}}
              {{Form::hidden('id',$whatsincluded->id,['class'=>'form-control','readonly'])}}
                <div class="card-body">

                  <div class="form-group">
                    {{Form::label('name','Name')}}
                    {{Form::text('name',null,['class'=>'form-control'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('icon','Icon')}}
                    {{Form::file('icon',['id'=>'icon'])}}
                    @if(!empty($whatsincluded->icon))
                    <img id="wIcon" src="{{url('images/'.$whatsincluded->icon)}}" height="70px" width="70px"/>
                    @endif
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a class="fa fa-trash" id="removeicon" onclick="removeIcon()" style="color: red"></a>
                    <a class="fas fa-undo" id="undoremoveicon" onclick="undoIcon()" style="color: red"></a>
                    {{Form::hidden('removeicontxt',null,array_merge(['id'=>'removeicontxt','class' => 'form-control']))}}
                  </div>

                  <div class="form-group">
                    {{Form::label('content','Content')}}
                    {{Form::textarea('content',$whatsincluded->content,['class'=>'form-control'])}}
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
            
            $('#undoremoveicon').hide();
                @if($whatsincluded['icon'] == null)
                $('#removeicon').hide();
                @endif
        });
        function removeIcon()
            {
                $('#removeicontxt').val('removed');
                $('#wIcon').attr('src','/images/no-image.png');
                $('#removeicon').hide();
                $('#undoremoveicon').show();
            }
            function undoIcon()
            {
                $('#removeicontxt').val(null);
                $('#wIcon').attr('src','{{url('images/'.$whatsincluded->icon)}}');
                $('#removeicon').show();
                $('#undoremoveicon').hide();
            }

    </script>
@endsection
