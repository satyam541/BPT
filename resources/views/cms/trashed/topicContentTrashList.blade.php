@extends('cms.layouts.master')
@section('content')



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Topic Content</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{route('topicList')}}">Topic</a></li>
                            <li class="breadcrumb-item active">Content</li>
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
                                    Topic Content Trash
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1">
                                    <thead>
                                        <tr>
                                            <th>Topic Name</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($topicContent as $trashContent)
                                            <tr>
                                                <td>{{ $trashContent->topic->name ?? '' }}</td>
                                                <td>{{ $trashContent->created_at }}</td>
                                                <td>
                                                    <a href="{{ route('restoreTopicContent', ['id' => $trashContent->id]) }}"
                                                        class="fa fa-sync fa-spin"></a>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                                    <a href="{{ route('forceDeleteTopicContent', ['id' => $trashContent->id]) }}"
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
                        "name": "Topic Name"
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
