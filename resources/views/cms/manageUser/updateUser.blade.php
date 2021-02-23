@extends('cms.layouts.master')
@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Update User</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{route('userList')}}">Users</a></li>
                            <li class="breadcrumb-item active">Edit</li>
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
                                <h3 class="card-title">Update User</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            {{ Form::model($user, ['route' => ['updateUser', $user->id]]) }}
                            <div class="card-body">
                                <div class="form-group">
                                    {{ Form::label('name', 'Name') }}
                                    {{ Form::text('name', null, ['class' => 'form-control']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('email', 'Email') }}
                                    {{ Form::text('email', null, ['class' => 'form-control']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('active', 'Active') }}
                                    {{ Form::checkbox('active') }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('resetPwd', 'Reset Password') }}
                                    {{ Form::checkbox('resetPwd') }}
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                            {{ Form::close() }}
                        </div>
                        <!-- /.card -->

                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Assign Roles</h3>
                            </div>
                            {{ Form::open(['route' => 'assignRole']) }}
                            {{ Form::hidden('user', $user->id) }}
                            <div class="card-body">
                                <div class="form-group row">
                                    @foreach ($roles as $role)
                                        <div class="card-body col-sm-3">
                                            <div class="checkbox no-margin">

                                                {{ Form::checkbox('role[]', $role->id, $user->hasRole($role->name)) }}
                                                {{ $role->name }}

                                            </div>
                                        </div>


                                    @endforeach
                                  
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            {{ Form::close() }}
                        </div>

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
