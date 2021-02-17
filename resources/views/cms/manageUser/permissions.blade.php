@extends('cms.layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Permission</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Permission</li>
                        </ol>
                    </div>
                </div>
                <!-- /.container-fluid -->
                <div class="box box-solid">
                    <div class="box-header">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-primary card-outline">
                                    <div class="card-header">
                                        <div class="card-title">
                                            Filter
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form action="">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-6 col-xs-4 col-lg-4 col-sm-10">
                                                        {{ Form::select('moduleName', $module, $selectedModule, array_merge(['id' => 'module', 'class' => 'form-control js-example-basic-multiple','tabindex'=>'-1'])) }}
                                                    </div>
                                                    <div class="col-md-6 col-xs-4 col-lg-4 col-sm-10">
                                                        {{ Form::select('access', $access, $selectedAccess, array_merge(['id' => 'access', 'class' => 'form-control  js-example-basic-multiple','tabindex'=>'-1'])) }}
                                                    </div>
                                                    <div class="col-md-6 col-xs-4 col-lg-4 col-sm-10">
                                                        <button class="btn btn-primary btn-sm">Search</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>  
                            </div> 
                        </div>


                        <!-- /.card-header -->

                        <div class="card">

                            <div class="table-responsive" style="background-color: white">

                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Module</th>
                                            <th>Access</th>
                                            <th>Description</th>
                                            {{-- @can('update', new App\Models\Permission()) --}}
                                            <th>Edit</th>
                                            {{-- @endcan --}}
                                            {{-- @can('delete', new App\Models\Permission()) --}}
                                            <th>Delete</th>
                                            {{-- @endcan --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($permissions as $permission)
                                            <tr>
                                                <td>{{ $permission->module->name ?? '' }}</td>
                                                <td>{{ $permission->access }}</td>
                                                <td>{{ $permission->description }}</td>
                                                {{-- @can('update', $permission) --}}
                                                <td><a
                                                        href="{{ route('editPermission', ['permission' => $permission->id]) }}"><i
                                                            class="fa fa-edit"></a></td>
                                                {{-- @endcan --}}
                                                {{-- @can('delete', $permission) --}}
                                                <td><a href="#"
                                                        onclick="deleteItem(route('deletePermission'),'{{ $permission->id }}')"><i
                                                            class="fa fa-trash text-red"></i></a></td>
                                                {{-- @endcan --}}
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-md-6">
                                        {{-- @can('create', new App\Models\Permission()) --}}
                                        <a href="{{ route('createPermission') }}" class="btn btn-primary">add new
                                            Record</a>
                                        {{-- @endcan --}}
                                    </div>
                                    <div class="col-md-6">
                                        <div class="float-sm-right">{{ $permissions->links() }}</div>

                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>
                </div>
        </section>
    </div>
    @endsection
    @section('footer')
    @endsection
