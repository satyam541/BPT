@extends('cms.layouts.master')
@section('headerLinks')
@endsection
@section('content')



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Location</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Location</li>
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
                                    Location List
                                </div>

                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">

                                <div class="row">
                                    @foreach ($data as $tier => $locations)

                                        <div class="col-md-3 m-4 border">
                                            <center><strong>Tier {{ $tier }}:</strong></center>

                                            <ul class="sortable" style="list-style: none;min-height: 1000px"
                                                data-tier="{{ $tier }}">
                                                @foreach ($locations as $location)
                                                    <li id="sort_{{ $location->id }}" data-id={{ $location->id }}
                                                        class="draggable m-2 border-bottom"><i class="fa fa-sort"></i>{{ $location->name }}</li>
                                                @endforeach
                                            </ul>
                                        </div>

                                    @endforeach
                                </div>
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
        var sortUrl = "{{ route('sortTier') }}";
        $(function() {
            $(".draggable").draggable({
                revert: "valid"
            });
            $(".draggable").draggable({
                connectToSortable: ".sortable",
                revert: "invalid"
            });
            $(".sortable").sortable({
                revert: true,
                forcePlaceholderSize: true,
                tolerance: 'pointer',
                cursor: 'pointer',
                update: function(event, ui) {
                    var tier = $(this).data('tier');
                    var item = ui.item.data('id');
                    var linkOrderData = $(this).sortable('serialize');
                    var data = linkOrderData + "&sort[tier]=" + tier + "&sort[location]=" + item;
                    $.ajax({
                        url: sortUrl,
                        type: "get",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: data,
                        success: function(e) {
                            if (e && e == "success") {
                              alert("Sorted Successfully");
                            }
                        },
                        error: function(e) {
                            alert('Error');
                        },
                    });
                }
            });
            $("ul, li").disableSelection();
        });

    </script>

@endsection
