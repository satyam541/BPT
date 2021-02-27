@extends('cms.layouts.master')
@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">FAQ's</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route($type.'List')}}  ">{{ucfirst($type)}}</a></li>
            <li class="breadcrumb-item active">FAQ's</li>
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
        <div class="col-xs-12 col-md-12 ">
            <div class="card card-primary ">
                <div class="card-header">
                    <div class="card-title">
                        {{$data->name}}
                    </div>
                </div>
                <div class="card-body">
                    <span class="message" id="success_type"></span>
                    <span class="message" id="error_type"></span>
                    <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Move</th>
                                    <th>Question</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>        
                            </thead>
                            <tbody class="sortable" data-module="{{ $type }}">
                                @foreach($data->faqs as $faq)
                                {{-- {{dd($faq)}} --}}
                                    @if(empty($faq))
                                    @continue
                                    @endif
                                <tr id="id_{{$faq['id']}}">
                                    <td class="sortable-handle">
                                        <span class="fa fa-sort"></span>
                                        @if(!empty($faq->display_order))
                                        <span class="fa fa-tag" style="color:black"></span>
                                        @endif
                                    </td>
                                    <td>{!!$faq->question!!}</td>
                                    <td><a href="{{route('editFaq',['faq'=>$faq->id])}}"><i class="fa fa-edit"></i></a></td>
                                    <td><a href="#" onclick="deleteItem('{{ route('deleteFaq',['faq'=>$faq->id])}}')"><i class="fa fa-trash text-red"></i></a></td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                </div>
                <div class="card-footer">
                    <a id="add" href="{{route('createFaq', ['type' => $type, 'id'=>$data->id])}}" class="btn btn-success" style="">Add new Record</a>
                </div>
            </div>
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
     var changePosition = function(requestData){
        success = $('#success_type');
        error = $("#error_type");
        console.log(requestData);
        success.find('.message').html(requestData.module+" sort saved !");
        error.find('.message').html(requestData.module+" sort fail !");
            $.ajax({
                url: '{{ route("sortFaq") }}',
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
