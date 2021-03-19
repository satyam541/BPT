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
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('categoryList') }}">Category</a></li>
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
                                <h3 class="card-title">Category Form</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            {{ Form::model($category, ['route' => $submitRoute, 'files' => 'true']) }}
                            <div class="card-body">
                                <div class="form-group">
                                    {{ Form::label('name', 'Name') }}
                                    {{ Form::text('name', null, ['id' => 'name', 'class' => 'form-control']) }}

                                    {{-- <input type="name" class="form-control" id="exampleInputEmail1" placeholder="Enter email"> --}}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('reference', 'Reference') }}
                                    {{ Form::text('reference', null, ['id' => 'reference', 'class' => 'form-control']) }}

                                </div>
                                <div class="form-group">
                                    {{ Form::label('tag_line', 'Tag Line') }}
                                    {{ Form::textarea('tag_line', null, ['class' => 'form-control summernote']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('color_code', 'Color Code') }}
                                    {{ Form::text('color_code', null, ['class' => 'form-control ', 'title' => 'Any valid color_code that work for css']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('image', 'Image') }}
                                    {{ Form::file('image', null, ['class' => 'form-control']) }}
                                    @if(!empty($category->image))
                                    <img id="cImage" src="{{ $category->getImagePath() }}" height="70px" width="70px" class=" pad" />
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
                                    @if(!empty($category->icon))
                                    <img id="cIcon" src="{{ $category->getIconPath() }}" class=" pad" height="70px" width="70px" />
                                    @endif
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a class="fa fa-trash" id="removeicon" onclick="removeIcon()" style="color: red"></a>
                                    <a class="fas fa-undo" id="undoremoveicon" onclick="undoIcon()" style="color: red"></a>
                                    {{Form::hidden('removeicontxt',null,array_merge(['id'=>'removeicontxt','class' => 'form-control']))}}
                                    <br/>
                                </div>

                                <div class="form-group">
                                    {{ Form::label('is_technical', 'Is technical', ['class' => 'mr-1']) }}
                                    {{ Form::checkbox('is_technical') }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('published', 'Is Published', ['class' => 'mr-1']) }}
                                    {{ Form::checkbox('published') }}
                                </div>
    
                                <div class="form-group">
                                    {{Form::label('is_popular','Is Popular')}}
                                    <input type="checkbox" name="is_popular"@if($category->popular->exists) checked @endif>
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
                @if($category['image'] == null)
                $('#removeimage').hide();
                @endif

                $('#undoremoveicon').hide();
                @if($category['icon'] == null)
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
                $('#cImage').attr('src','{{$category->getImagePath()}}');
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
                $('#cIcon').attr('src','{{$category->getIconPath()}}');
                $('#removeicon').show();
                $('#undoremoveicon').hide();
            }

    </script>
@endsection
