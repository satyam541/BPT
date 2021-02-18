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
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
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
        @foreach($popularItems as $type => $items)
        <div class="col-xs-6 col-md-6">
            <div class="card card-primary ">
                <div class="card-header">
                    <div class="card-title">{{ ucfirst($type) }}</div>
                </div>
                <div class="card-body">
                    
                    <table class="table table-hover sortable" data-module="{{ $type }}">
                            <thead>
                                <tr>
                                    <th>Move</th>
                                    <th>Name</th>
                                    <th>Del</th>
                                </tr>        
                            </thead>
                            <tbody>
                                @foreach($items as $item)
                                    @if(empty($item->module))
                                    @continue
                                    @endif
                                <tr id="id_{{$item['id']}}">
                                    <td class="sortable-handle">
                                        <span class="fa fa-sort"></span>
                                        @if(!empty($item->module->category))
                                        <span class="fa fa-tag" style="color:{{$item->module->category->color_code}}"></span>
                                        @endif
                                    </td>
                                    <td>{{$item->module->name}}</td>
                                    <td><a href="#" onclick="deleteItem('{{ route('deletePopular',['popular'=>$item->id])}}')"><i class="fa fa-trash text-red"></i></a></td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                </div>
                <div class="box-footer clear-fix small-pagination">
                    
                </div>
            </div>
        </div>
        @endforeach
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
     var changePosition = function(requestData){
        success = $('#success_type');
        error = $("#error_type");
        success.find('span').html(requestData.module+" sort saved !");
        error.find('span').html(requestData.module+" sort fail !");
            $.ajax({
                url: '{{ route("sortPopular") }}',
                type: 'POST',
                data: requestData.data,
                headers: { 'X-CSRF-TOKEN': $("meta[name='token']").attr('content') },
                success: function(data) {
                    success.fadeIn('slow', function(){
                        toastr.success('Successfully Sorted');
                        success.delay(3000).fadeOut(); 
                    });
                },
                error: function(){
                    error.fadeIn('slow', function(){
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
