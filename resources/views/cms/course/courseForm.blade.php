@extends('cms.layouts.master')
@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Course Form</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('courseList') }}">Course</a></li>
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
                                <h3 class="card-title">Course Form</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            {{ Form::model($course, ['route' => $submitRoute, 'files' => 'true']) }}
                            <div class="card-body">
                                {{ Form::hidden('id', null) }}
                                {{ Form::hidden('online_id', $course->onlinePrice->id ?? '') }}
                                <div class="form-group">
                                    {{ Form::label('name', 'Name') }}
                                    {{ Form::text('name', null, ['id' => 'name', 'class' => 'form-control']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('topic_id', 'Topic') }}
                                    {{ Form::select('topic_id', $list['topics'], $course->topic_id, ['tabindex' => '-1', 'class' => 'form-control selectJS', 'id' => 'topicName', 'placeholder' => 'Choose one', 'onchange' => 'updateSlug()']) }}

                                </div>
                                <div class="form-group">
                                    {{ Form::label('reference', 'Reference') }}
                                    {{ Form::text('reference', null, ['id' => 'reference', 'class' => 'form-control ']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('tag_line', 'Tag Line') }}
                                    {{ Form::textarea('tag_line', null, ['class' => 'form-control summernote']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('tka_name', 'TKA Name') }}
                                    {{ Form::text('tka_name', null, ['class' => 'form-control']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('code', 'Code') }}
                                    {{ Form::text('code', null, ['class' => 'form-control']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('ip_trademark', 'Trademark Text') }}
                                    {{ Form::textarea('ip_trademark', null, ['class' => 'form-control summernote']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('duration', 'Duration') }}
                                    {{ Form::text('duration', null, ['class' => 'form-control', 'placeholder' => '5 Days']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('duration_global', 'Global Duration') }}
                                    {{ Form::text('duration_global', null, ['class' => 'form-control']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('exam_price', 'Exam Price') }}
                                    {{ Form::number('exam_price', null, ['class' => 'form-control', 'step' => '0.001']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('difficulty', 'Difficulty') }}
                                    {{ Form::select('difficulty', ['Beginner' => 'Beginner', 'Intermediate' => 'Intermediate', 'Advance' => 'Advance'], null, ['tabindex' => '-1', 'class' => 'form-control selectJS', 'placeholder' => 'Choose one']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('image', 'Image') }}
                                    {{ Form::file('image', null, ['class' => 'form-control']) }}
                                    @if(!empty($course->image))
                                    <img id="cImage" src="{{ $course->getLogoPath() }}" class=" pad" height="70px" width="70px" />
                                    @endif
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a class="fa fa-trash" id="removeimage" onclick="removeImage()" style="color: red"></a>
                                    <a class="fas fa-undo" id="undoremoveimage" onclick="undoImage()" style="color: red"></a>
                                    {{Form::hidden('removeimagetxt',null,array_merge(['id'=>'removeimagetxt','class' => 'form-control']))}}
                                    <br/>
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
                                    {{ Form::label('exam_included', 'Exam Included', ['class' => 'mr-1']) }}
                                    {{ Form::checkbox('exam_included') }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('published', 'Published', ['class' => 'mr-2']) }}
                                    {{ Form::checkbox('published') }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('is_popular', 'Is Popular') }}
                                    <input type="checkbox" name="is_popular" @if ($course->popular->exists) checked @endif>
                                </div>

                                <div class="form-group">
                                    {{ Form::label('is_online', 'Is Online') }}
                                    <input type="checkbox" name="is_online" class="is_online" @if ($course->is_online != null) checked @endif>
                                </div>

                                <div id='onlinePrice' class="form-group">
                                    {{ Form::label('online_price', 'Online Course Price') }}
                                    {{ Form::text('online_price', $course->onlinePrice->price ?? '', ['class' => 'form-control']) }}
                                </div>

                            </div>
                            <!-- /.card-body -->
                            
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
            $('#onlinePrice').hide();
            $('.is_online').change(function() {
                if ($(this).is(':checked')) $('#onlinePrice').show();
                else $('#onlinePrice').hide();
            }).change();
            $("#name,#topicName").on('input', function() {
                updateSlug();
            });

            $(".js-example-basic-multiple").select2({
                tags: true,
                theme: "classic",
                tokenSeparators: [',', ' ']

            });

            $('#undoremoveimage').hide();
            @if($course['image'] == null)
             $('#removeimage').hide();
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
            $('#cImage').attr('src','{{$course->getLogoPath()}}');
            $('#removeimage').show();
            $('#undoremoveimage').hide();
        }
        function updateSlug() {
            var location = $("#name").val();
            var slug = '/' + convertUrl(location);
            var selectedTopic = $('#topicName').select2("val");
            var topics = <?php echo json_encode($list['slugs']); ?>;        if (selectedTopic in topics) {
                topicslug = topics[selectedTopic];
                slug = topicslug + slug;
            }

            $("#reference").val(slug);

        }

    </script>

@endsection
