@extends('cms.layouts.master')
@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Update Role</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{route('roleList')}}">Roles</a></li>
                            <li class="breadcrumb-item active">Update</li>
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
                                <h3 class="card-title">Update Role</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            {{ Form::model($role, ['route' => ['updateRole', $role->id]]) }}
                            <div class="card-body">
                                <div class="form-group">
                                    {{ Form::label('name', 'Name') }}
                                    {{ Form::text('name', null, ['class' => 'form-control']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('desc', 'Description') }}
                                    {{ Form::text('description', null, ['class' => 'form-control']) }}
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            {{ Form::close() }}
                        </div>
                        <!-- /.card -->

                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Assign Permissions</h3>
                            </div>
                            {{ Form::open(['route' => 'assignPermission']) }}
                            {{ Form::hidden('role', $role->id) }}
                            <div class="card-body">
                                <div class="form-group row">
                                    @foreach ($permissions as $module_name => $permission)
                                        <div class="card-body col-md-12 col-xs-12 col-sm-12 border-bottom">
                                            <h4 class="card-footer">{{ strtoupper($module_name) }}:</h4>
                                            <div class="card-body">
                                                <div class="row">
                                                    @foreach ($permission as $access)
                                                        <div class="col-sm-3">
                                                            <div class="checkbox">
                                                                <label title="{{ $access->description }}" class="">
                                                                    {{ Form::checkbox('permission[]', $access->id, $role->hasPermission($access->module->name, $access->access)) }}
                                                                    {{ $access->access }}
                                                                </label>
                                                            </div>

                                                        </div>

                                                    @endforeach
                                                </div>


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
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
