@extends('cms.layouts.master')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Manage Schedule Price</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Schedule Price</li>
                        </ol>
                    </div>
                </div>
                <!-- /.container-fluid -->
                {{-- <div class="card card-solid"> --}}

                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-primary card-outline">
                                    <div class="card-header">
                                        <div class="card-title">
                                            Filter
                                        </div>
                                    </div>
                                    <form action="" class="form-horizontal">
                                        <div class="card-body">

                                            <div class="form-group row">
                                                {{ Form::label('inputCourse', 'Course', ['class' => 'col-sm-2 control-label']) }}
                                                <div class="col-sm-4">
                                                    {{ Form::select('course', $list['courses'], $selectedCourse, ['id' => 'inputCourse', 'class' => 'form-control selectJS', 'title' => 'Choose one']) }}
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="card-footer">
                                            <div class="col-sm-12 text-right">
                                                <button class="btn btn-primary btn-sm">Search</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    {{ $course->name }}
                                </div>
                                <div class="card-body ">

                                    <table id="example1" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Location</th>
                                                <th>Increment Type</th>
                                                <th>Increment Amount</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($locations as $location)
                                                <tr>
                                                    {{ Form::open(['route' => ['updateCustomPrice', $course->id, $location->id]]) }}
                                                    <td>{{ $location->name }}</td>
                                                    <td>

                                                        {{ Form::select('method', [null => 'choose one', 'Increment' => 'Fixed Increment', 'Percentage' => 'Fixed %age', 'Price' => 'Fixed Price'], $location->customCoursePrice($course->id)->method, ['class' => 'form-control']) }}
                                                    </td>
                                                    <td>
                                                        {{ Form::text('amount', $location->customCoursePrice($course->id)->amount, ['class' => 'form-control']) }}
                                                    </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button type="submit" class="btn btn-danger">Update</button>
                                                        </div>
                                                    </td>
                                                    {{ Form::close() }}

                                                </tr>


                                            @endforeach



                                        </tbody>

                                    </table>
                                </div>
                                <div class="card-footer clear-fix small-pagination">

                                </div>
                            </div>
                        </div>

                    </div>
                {{-- </div> --}}
            </div>
        </section>
    </div>
    @endsection

    @section('footer')
        <script>
            // jquery data table required to use this
            $('#example1').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": false,
                "info": true,
                "autoWidth": true,
                "lengthMenu": [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, "All"]
                ]
            });

        </script>
    @endsection
