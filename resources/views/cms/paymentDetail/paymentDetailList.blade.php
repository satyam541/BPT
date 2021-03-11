@extends('cms.layouts.master')
@section('content')



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Payment Detail</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Payment</li>
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
                                    Payment Detail List
                                </div>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Card Fees(%)</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach ($paymentDetail as $detail)
                                            <tr>
                                                <td>{{ $detail->card  }}</td>
                                                <td>{{$detail->card_fees_in_percent }}</td>
                                                <td>
                                                    <a href="{{Route('paymentDetailEdit',['id'=>$detail->id])}}" class="fa fa-edit"></a>
                                                    &nbsp;&nbsp;&nbsp;
                                                    <a href="" onclick="deleteItem('{{ route('paymentDetailDelete',['id'=>$detail->id])}}')" class="fa fa-trash" style="color: red"></a>
                                                </td>
                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                                
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <a id="add" href="{{route('paymentDetailCreate')}}" class="btn btn-success" style="">Add new Record</a>
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
                        {"name": "Name"},
                        {"name": "Card Fees(%"},
                        {"name": "Actions", "sorting": false, searching: false }
                ]
            });

        });

    </script>
@endsection
