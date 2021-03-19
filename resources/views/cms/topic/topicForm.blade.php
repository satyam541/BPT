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
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('topicList') }}">Topic</a></li>
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
                                <h3 class="card-title">Topic Form</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            {{ Form::model($topic, ['route' => $submitRoute, 'files' => 'true']) }}
                            <input type="hidden" name="id" value="{{$topic->id}}"/>
                            <div class="card-body">

                                <div class="form-group">
                                    {{ Form::label('name', 'Name') }}
                                    {{ Form::text('name', null, ['id' => 'name', 'class' => 'form-control']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('category_id', 'Category') }}
                                    {{ Form::select('category_id', $categories, null, ['tabindex' => '-1', 'id' => 'categoryName', 'class' => 'form-control selectJS', 'placeholder' => 'Choose one']) }}

                                </div>
                                <div class="form-group ">
                                    <label for=>Category Slug</label>
                                    <input type="text" name="category_slug" class="form-control" style="width: 21%">
                                    <label for=>Topic Slug</label>
                                    <input type="text" name="topic_slug" class="form-control" style="width: 21%">
                                </div>
                        

                                <div class="form-group">
                                    {{ Form::label('tag_line', 'Tag Line') }}
                                    {{ Form::textarea('tag_line', null, ['class' => 'form-control summernote']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('image', 'Image') }}
                                    {{ Form::file('image', null, ['class' => 'form-control']) }}
                                    @if(!empty($topic->image))
                                    <img id="tImage" src="{{ $topic->getImagePath() }}" class=" pad" height="70px" width="70px" />
                                    @endif
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a class="fa fa-trash" id="removeimage" onclick="removeImage()" style="color: red"></a>
                                    <a class="fas fa-undo" id="undoremoveimage" onclick="undoImage()" style="color: red"></a>
                                    {{ Form::hidden('removeimagetxt', null, array_merge(['id' => 'removeimagetxt', 'class' => 'form-control'])) }}
                                    <br />
                                </div>

                                <div class="form-group">
                                    {{ Form::label('ip_trademark', 'Ip Trademark') }}
                                    {{ Form::textarea('ip_trademark', null, ['class' => 'form-control  summernote']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('accreditation_id', 'Accreditation') }}
                                    {{ Form::select('accreditation_id', $list['accreditations'], null, ['tabindex' => '-1', 'class' => 'form-control selectJS', 'placeholder' => 'Choose one']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('accredited', 'Is Accredited', ['class' => 'mr-1']) }}
                                    {{ Form::checkbox('accredited') }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('priority', 'Has Priority', ['class' => 'mr-1']) }}
                                    {{ Form::checkbox('priority') }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('published', 'Is Published', ['class' => 'mr-1']) }}
                                    {{ Form::checkbox('published') }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('is_popular', 'Is Popular') }}
                                    <input type="checkbox" name="is_popular" @if (!empty($topic->popular->created_at)) checked @endif>
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
                @if($topic['image'] == null)
                $('#removeimage').hide();
                @endif
        });
        function removeImage()
            {
                $('#removeimagetxt').val('removed');
                $('#tImage').attr('src','/images/no-image.png');
                $('#removeimage').hide();
                $('#undoremoveimage').show();
            }
            function undoImage()
            {
                $('#removeimagetxt').val(null);
                $('#tImage').attr('src','{{$topic->getImagePath()}}');
                $('#removeimage').show();
                $('#undoremoveimage').hide();
            }

        

    </script>

@endsection
