@extends('cms.layouts.master')
@section('content')



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Website Detail</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('websiteDetailList') }}">Website Detail</a></li>
                            <li class="breadcrumb-item active">Trash</li>
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

                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <div class="card-title">
                                    Website Detail Trash
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($trashedWebsiteDetail as $trash)
                                            <tr>
                                                <td>{{ $trash->name }}</td>
                                                <td>{{ $trash->created_at }}</td>
                                                <td>
                                                    <a href="{{ route('restoreWebsiteDetail', ['id' => $trash->id]) }}"
                                                        class="fa fa-sync fa-spin"></a>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                                    <a href="{{ route('forceDeleteWebsiteDetail', ['id' => $trash->id]) }}"
                                                        class="fa fa-trash" style="color: red"></a>
                                                </td>
                                            </tr>
                                        @endforeach


                                        </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
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
            $('#example1').DataTable({
                "columns": [{
                        "name": "Name"
                    },
                    {
                        "name": "Date",
                        searching: false
                    },
                    {
                        "name": "Actions",
                        "sorting": false,
                        searching: false
                    }
                ]
            });
        });

    </script>
@endsection
