@extends('cms.layouts.master')
@section('content')



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Category</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Category</a></li>
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
                              Category List
                            </div>
                          </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Bulletpoints</th>
                                            <th>Whats Included</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($categories as $category)
                                            <tr>
                                                <td>{{ $category->name }}</td>
                                                <td> <a href="{{ route('categoryBulletPointList', ['module' => $category->id]) }}"
                                                        class=" fa fa-bullseye"></a></td>
                                                <td> <a href="{{ route('categoryWhatsIncludedList', ['module' => $category->id]) }}"
                                                        class=" fa fa-list"></a></td>
                                                <td><a href="{{ Route('editCategory', ['category' => $category->id]) }}"
                                                        class="fa fa-edit"></a>
                                                    <a href="#"
                                                        onclick="deleteItem('{{ route('deleteCategory', ['category' => $category->id]) }}')"
                                                        class="fa fa-trash" style="color: red"></a>
                                                </td>
                                            </tr>
                                        @endforeach


                                        </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                              <a id="add" href="{{ route('createCategory') }}" class="btn btn-success" style="">Add new Record</a>
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
                "columns": [{
                        "name": "Name"
                    },
                    {
                        "name": "Bulletpoints",
                        "sorting": false,
                        searching: false
                    },
                    {
                        "name": "Whatsincluded",
                        "sorting": false,
                        searching: false
                    },
                    {
                        "name": "platform",
                        "sorting": false,
                        searching: false
                    }
                ]

            });

            $('#add').hover(function() {
                $(this).removeClass('btn-success');
                $(this).addClass('btn-primary');
            }, function() {
                $(this).removeClass('btn-primary');
                $(this).addClass('btn-success');
            });
        });

    </script>
@endsection
