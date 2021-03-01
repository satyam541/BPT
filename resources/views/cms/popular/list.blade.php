@extends('cms.layouts.master')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Popular</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Popular</li>
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
                    <div class="container">
                        <span class="message" id="success_type"></span>
                        <span class="message" id="error_type"></span>
                        <div class="tab">
                            @foreach ($popularItems as $type => $items)
                              
                                <button class="tablinks" onclick="openCity(event, '{{ $type }}')">{{ $type }}</button> <!-- header name -->
                            @endforeach
                        </div>
                        @forelse ($popularItems as $type => $items)

                            <div id={{ $type }} class="tabcontent">
                                <table class="table table-hover">
                                    <tbody class="sortable" data-module="{{ $type }}">
                                        @foreach ($items as $item)
                                            @if (empty($item->module))
                                                @continue
                                            @endif
                                            <tr id="id_{{ $item['id'] }}">
                                                <td class="sortable-handle">
                                                    <span class="fa fa-sort"></span>
                                                    @if (!empty($item->module->category))
                                                        <span class="fa fa-tag"
                                                            style="color:{{ $item->module->category->color_code }}"></span>
                                                    @endif
                                                </td>
                                                <td>{{ $item->module->title ?? $item->module->name }}</td>
                                                <td><a href="#"
                                                        onclick="deleteItem('{{ route('deletePopular', ['popular' => $item->id]) }}')"><i
                                                            class="fa fa-trash text-red"></i></a>
                                                </td>
                                            </tr> 
                                      @endforeach
                                  </tbody>
                                </table>
                            </div>
                        @empty
                            <marquee behavior='alternate' direction='right'>
                                <h3>No Data Available</h3>
                            </marquee>
                        @endforelse


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
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
    var changePosition = function(requestData) {
        console.log(requestData);
        success = $('#success_type');
        error = $("#error_type");
        success.find('span').html(requestData.module + " sort saved !");
        error.find('span').html(requestData.module + " sort fail !");
        $.ajax({
            url: '{{ route('sortPopular') }}',
            type: 'POST',
            data: requestData.data,
            headers: {
                'X-CSRF-TOKEN': $("meta[name='token']").attr('content')
            },
            success: function(data) {
                success.fadeIn('slow', function() {
                    toastr.success('Successfully Sorted');
                    success.delay(3000).fadeOut();
                });
            },
            error: function() {
                error.fadeIn('slow', function() {
                    error.delay(3000).fadeOut();
                });
            }
        });
    };
    $(document).ready(function(){
            var sortableTable = $('.sortable');
            if (sortableTable.length > 0) {
                sortableTable.sortable({
                    handle: '.sortable-handle',
                    axis: 'y',
                    items : 'tr',
                    update: function(event, ui){
                        var serializeData = $(this).sortable("serialize");
                        console.log(serializeData);
                        serializeData += '&module='+$(this).data("module");
                        changePosition({
                            data : serializeData,
                            module : $(this).data("module")
                        });
                    },
                });
            }
    });

</script>
@endsection
