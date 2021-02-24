@extends('cms.layouts.master')
@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">FAQ Form</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{route($data->module_type.'List')}}">{{ucfirst($data->module_type)}}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('faqList', ['type' => $data->module_type, 'id' => $data->module_id]) }}">FAQ's</a></li>
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
                <!-- Main content -->

                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <div class="card-title">FAQ</div>

                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            {{ Form::model($data, ['route' => 'insertFaq']) }}
                            {{ Form::hidden('module_id', null) }}
                            {{ Form::hidden('id', null) }}
                            {{ Form::hidden('module_type', null) }}
                            <div class="card-body">

                                <div class="form-group row">
                                    {{ Form::label('question', 'Question', ['class' => 'col-md-3 col-form-label text-right']) }}

                                    <div class="col-md-9">
                                        {{ Form::textarea('question', null, ['class' => 'form-control summernote']) }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    {{ Form::label('answer', 'Answer', ['class' => 'col-md-3 col-form-label text-right']) }}

                                    <div class="col-md-9">
                                        {{ Form::textarea('answer', null, ['class' => 'form-control summernote']) }}
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <input type="submit" class="btn btn-primary" value="Submit">
                            </div>
                            {{ Form::close() }}
                        </div>

                    </div>
                    <!-- /.card-body -->

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    @endsection
    <!-- /.content-wrapper -->
@section('footer')
    
@endsection