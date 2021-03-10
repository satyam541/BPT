@extends('cms.layouts.master')
@section('content')



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Certification Topics</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('certificationList') }}">Certification</a></li>
                            <li class="breadcrumb-item active">Topics</li>
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
                                    Certification Topics List
                                </div>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1">
                                    <thead>
                                        <tr>
                                            <th>Topics Name</th>
                                            <th>Certification Name</th>
                                            <th>Courses</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach ($topics as $topic)
                                            <tr>
                                                <td>{{ $topic->name  }}</td>
                                                <td>{{$topic->certification->name ?? "" }}</td>
                                                <td>
                                                    <a href="{{Route('assignCoursesForm',['topic_id'=>$topic->id])}}" class="btn btn-primary">Assign </a></td>
                                                <td>
                                                    <a href="{{Route('certificationTopicEdit',['id'=>$topic->id])}}" class="fa fa-edit"></a>
                                                    &nbsp;&nbsp;&nbsp;
                                                    <a href="" onclick="deleteItem('{{ route('deleteCertificationTopic',['id'=>$topic->id])}}')" class="fa fa-trash" style="color: red"></a>
                                                </td>
                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                                
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <a id="add" href="{{route('certificationTopicCreate')}}" class="btn btn-success" style="">Add new Record</a>
                            </div>
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
                "columns": [
                        {"name": "Topics Name"},
                        {"name": "Certification Name"},
                        {"name": "Courses", "sorting": false, searching: false },
                        {"name": "Actions", "sorting": false, searching: false }
                ]
            });

        });

    </script>
@endsection
