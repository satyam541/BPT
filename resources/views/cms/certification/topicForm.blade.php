@extends('cms.layouts.master')
@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Certification Topic Form</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('certificationTopicList') }}">Topic</a></li>
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
                                <h3 class="card-title">Certification Topic Form</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            {{ Form::model($topic, ['route' => $submitRoute]) }}
                            <div class="card-body">
                                <div class="form-group">
                                    {{ Form::label('certification_id', 'Certification') }}
                                    {{ Form::select('certification_id', $certifications,null,['class' => 'form-control selectJS', 'placeholder' => 'Choose One']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('name', ' Topic Name') }}
                                    {{ Form::text('name', null, ['id' => 'name', 'class' => 'form-control']) }}
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
            $("#name").on('input', function() {
                updateSlug();
            });
        });

        function updateSlug() {
            var location = $("#name").val();
            var slug = '/' + convertUrl(location);

            $("#reference").val(slug);

        }
        $(".multipleSelect").select2({
                placeholder:"Choose Course",
                
                
        });

    </script>

@endsection
