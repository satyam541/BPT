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
                            {{ Form::model($certification, ['route' => $submitRoute]) }}
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
            $("#name").on('input', function() {
                updateSlug();
            });
        });

        function updateSlug() {
            var location = $("#name").val();
            var slug = '/certification-programmes/' + convertUrl(location);

            $("#reference").val(slug);

        }

    </script>

@endsection
