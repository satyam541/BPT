@extends('cms.layouts.master')
@section('content')



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Certification Courses</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Certification</li>
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
                                    Certification Courses List
                                </div>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1">
                                    <thead>
                                        <tr>
                                            <th> Certification Name</th>
                                            <th> Course Name</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach ($courses as $course)
                                            <tr>
                                                @foreach ($course->certifications as $certification)
                                                    {{-- {{dd($certifications)}} --}}
                                                    <td>{{ $certification->name }}</td>
                                                @endforeach
                                                <td>{{ $course->name  }}</td>
                                                
                                                
                                                <td>
                                                    <a href="{{Route('editCourse',['course'=>$course->id])}}" class="fa fa-edit"></a>
                                                    {{-- &nbsp;&nbsp;&nbsp;
                                                    <a href="" onclick="deleteItem('{{ route('deleteCourse',['course'=>$course->id])}}')" class="fa fa-trash" style="color: red"></a> --}}
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
                        "name": "Certification Name"
                    },
                    {
                        "name": "Course Name"
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
