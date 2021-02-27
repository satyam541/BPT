@extends('cms.layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            {{-- <div class="container-fluid"> --}}
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Content</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('topicList') }}">Topic</a></li>
                        <li class="breadcrumb-item active">Content</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.col -->
        </div>
        <!-- /.container-fluid -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->

                <!-- /.card-header -->

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <div class="card-title">
                                Content List
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" style="background-color: white">
                                <table class="table table-hover" id="example">
                                    <thead>
                                        <tr>
                                            <th>Topic</th>
                                            <th>Country</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($contents as $content)
                                            <tr>
                                                <td>{{ $content->topic->name }}</td>
                                                <td>{{ $content->country->name }}</td>
                                                <td><a
                                                        href="{{ route('editTopicContent', ['topicDetail' => $content->id]) }}"><i
                                                            class="fa fa-edit"></a></td>
                                                <td><a href="#"
                                                        onclick="deleteItem('{{ route('deleteTopicContent', ['topicDetail' => $content->id]) }}')"><i
                                                            class="fa fa-trash text-red"></i></a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer clear-fix small-pagination">
                            {{-- @can('create', new App\Models\Permission()) --}}
                            <div class="text-left col-sm-6">
                                <a id="add"
                                    href="{{ Route('createTopicContent', ['topic' => $selectedTopic, 'country' => $selectedCountry]) }}"
                                    class="btn btn-success" style="">Add new record</a>
                            </div>

                            {{-- @endcan --}}
                            <div class="text-right col-sm-6">
                                {{-- {{ $contents->links() }} --}}
                            </div>


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

            $('#example').DataTable({
                ordering: false,
                columns: [{
                        "name": "Topic"
                    },
                    {
                        "name": "Country"
                    },
                    {
                        "name": "edit",
                        sorting: false,
                        searching: false
                    },
                    {
                        "name": "Delete",
                        sorting: false,
                        searching: false
                    }
                ],

                initComplete: function() {
                    var data = this;
                    this.api().columns([0]).every(function() {
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
