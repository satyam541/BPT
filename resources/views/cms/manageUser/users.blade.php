@extends('cms.layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Users</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Users</li>
                        </ol>
                    </div>
                </div>
                <!-- /.container-fluid -->

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="card card-primary card-outline">

                            <div class="card-header">
                                <div class="card-title">
                                    Filter content
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="" class="form-horizontal">
                                    <div class="form-group row">
                                        {{ Form::label('inputName', 'Name', ['class' => 'col-sm-2 control-label']) }}
                                        <div class="col-sm-4">
                                            {{ Form::select('name', $list['name'], $selectedName, ['id' => 'inputName', 'class' => 'form-control selectJS', 'placeholder' => 'ALL']) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        {{ Form::label('inputEmail', 'Email', ['class' => 'col-sm-2 control-label']) }}
                                        <div class="col-sm-4">
                                            {{ Form::select('email', $list['email'], $selectedEmail, ['id' => 'inputEmail', 'class' => 'form-control selectJS', 'placeholder' => 'ALL']) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        {{ Form::label('inputRole', 'Role', ['class' => 'col-sm-2 control-label']) }}
                                        <div class="col-sm-4">
                                            {{ Form::select('roleName', $list['role'], $selectedRole, ['id' => 'inputRole', 'class' => 'form-control selectJS', 'placeholder' => 'ALL']) }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-4">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="active" value='1' @if ($active != null) checked @endif>
                                                    Active only
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 text-right">
                                        <button class="btn btn-primary">Search</button>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /.card-header -->

                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <div class="card-title">
                            Users List
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" style="background-color: white">

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Active</th>
                                        <th>Role</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->active }}</td>
                                            <td>{{ $user->roles->implode('name', ', ') }}</td>
                                            {{-- @can('update', Auth::user(), App\Models\Article::class) --}}
                                            <td><a href="{{ route('editUser', ['user' => $user->id]) }}" class="href"><i
                                                        class="fa fa-edit"></a></td>
                                            {{-- @endcan --}}
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer clear-fix small-pagination">
                        {{-- @can('create', new App\Models\Permission()) --}}
                        <a id="add" href="" class="btn btn-success" style="">Add new record</a>
                        {{-- @endcan --}}

                        {{ $users->links() }}
                    </div>

                </div>


        </section>
    </div>
@endsection

@section('footer')
    <script>
        $(".selectJS").select2({
            tags: true,
            theme: "classic",
            tokenSeparators: [',', ' ']
        });

    </script>
@endsection
