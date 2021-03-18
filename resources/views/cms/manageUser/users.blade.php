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
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Users</li>
                        </ol>
                    </div>
                </div>
                <!-- /.container-fluid -->

                <!-- /.card-header -->

                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <div class="card-title">
                            Users List
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" style="background-color: white">

                            <table class="table table-hover" id="example1">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        
                                        <th>Role</th>
                                        <th>Active</th>
                                        @can('update',new App\User())
                                        <th>Edit</th>
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            
                                            <td>{{ $user->roles->implode('name', ', ') }}</td>
                                            <td>{{ $user->active }}</td>
                                            <td>
                                            @can('update',$user)
                                            <a href="{{ route('editUser', ['user' => $user->id]) }}" class="href"><i class="fa fa-edit"></a></td>
                                            @endcan
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                        <div class="col-md-6">
                        @can('create',Auth::user(),App\User::class)
                        <a id="add" href="{{route('createUser')  }}" class="btn btn-success" style="">Add new record</a>
                        @endcan
                        </div>
                        <div class="col-md-6">
                            {{-- <div class="float-sm-right">{{ $users->links() }}</div> --}}

                        </div>
                    </div>

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
            width: '400px',
            tokenSeparators: [',', ' ']
        });
        $(document).ready(function() {

            $('#example1').DataTable({
                ordering: false,
                
                columns: [{
                        "name": "Name"
                    },
                    {
                        "name": "Email"
                    },
                    {
                        "name": "Role"
                    },
                    {
                        "name": "Active"
                    },
                    {
                        "name": "edit",
                        sorting: false,
                        searching: false
                    },
                    
                ],

                initComplete: function() {
                    var data = this;
                    this.api().columns([0,1,2,3]).every(function() {
                        var column = this;
                        var columnName = $(column.header()).text();
                        var select = $('<select class="selectJS" data-placeholder="Select ' +
                                columnName + '"><option value=""></option></select>')
                            .appendTo($(column.header()).empty())
                            .on('change', function() {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );
                                if (val == "all") {
                                    val = "";
                                }
                                column
                                    .search(val ? '^' + val + '$' : '', true, true)
                                    .draw();
                            });
                        select.append('<option value="all">All</option>')
                        column.data().unique().each(function(d, j) {
                            select.append('<option value="' + d + '">' + d +
                                '</option>')
                        });
                    });
                }
            });
        });
    
</script>
    
@endsection
