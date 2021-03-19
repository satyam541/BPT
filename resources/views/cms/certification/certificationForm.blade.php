@extends('cms.layouts.master')
@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Certification Form</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('certificationList') }}">Certification</a></li>
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
                                <h3 class="card-title">Certification Form</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            {{ Form::model($certification, ['route' => $submitRoute,'files' => 'true']) }}
                            <div class="card-body">
                                {{ Form::hidden('id', $certification->id, null, ['class' => 'form-control']) }}
                                <div class="form-group">
                                    {{ Form::label('name', 'Name') }}
                                    {{ Form::text('name', null, ['id' => 'name', 'class' => 'form-control']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('tka_name', 'TKA Name') }}
                                    {{ Form::text('tka_name', null, ['class' => 'form-control']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('slug', 'Slug') }}
                                    {{ Form::text('slug', null, ['id' => 'reference', 'class' => 'form-control']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('image', 'Image') }}
                                    {{ Form::file('image', null, ['class' => 'form-control']) }}
                                    @if(!empty($certification->image))
                                    <img id="cImage" src="{{ $certification->getImagePath() }}" height="70px" width="70px" class=" pad" />
                                    @endif
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a class="fa fa-trash" id="removeimage" onclick="removeImage()" style="color: red"></a>
                                    <a class="fas fa-undo" id="undoremoveimage" onclick="undoImage()" style="color: red"></a>
                                    {{Form::hidden('removeimagetxt',null,array_merge(['id'=>'removeimagetxt','class' => 'form-control']))}}
                                    <br/>
                                </div>
                                <div class="form-group">
                                    {{ Form::label('icon', 'Icon') }}
                                    {{ Form::file('icon', null, ['class' => 'form-control']) }}
                                    @if(!empty($certification->icon))
                                    <img id="cIcon" src="{{ $certification->getIconPath() }}" class=" pad" height="70px" width="70px" />
                                    @endif
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a class="fa fa-trash" id="removeicon" onclick="removeIcon()" style="color: red"></a>
                                    <a class="fas fa-undo" id="undoremoveicon" onclick="undoIcon()" style="color: red"></a>
                                    {{Form::hidden('removeicontxt',null,array_merge(['id'=>'removeicontxt','class' => 'form-control']))}}
                                    <br/>
                                </div>
                                <div class="form-group">
                                    {{ Form::label('is_published', 'Is Published') }}
                                    {{ Form::checkbox('is_published') }}
                                </div>

                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        {{ Form::close() }}
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
                @if($certification['image'] == null)
                $('#removeimage').hide();
                @endif

                $('#undoremoveicon').hide();
                @if($certification['icon'] == null)
                $('#removeicon').hide();
                @endif
            
            
        });
        function removeImage()
            {
                $('#removeimagetxt').val('removed');
                $('#cImage').attr('src','/images/no-image.png');
                $('#removeimage').hide();
                $('#undoremoveimage').show();
            }
            function undoImage()
            {
                $('#removeimagetxt').val(null);
                $('#cImage').attr('src','{{$certification->getImagePath()}}');
                $('#removeimage').show();
                $('#undoremoveimage').hide();
            }

            function removeIcon()
            {
                $('#removeicontxt').val('removed');
                $('#cIcon').attr('src','/images/no-image.png');
                $('#removeicon').hide();
                $('#undoremoveicon').show();
            }
            function undoIcon()
            {
                $('#removeicontxt').val(null);
                $('#cIcon').attr('src','{{$certification->getIconPath()}}');
                $('#removeicon').show();
                $('#undoremoveicon').hide();
            }

    </script>
@endsection
