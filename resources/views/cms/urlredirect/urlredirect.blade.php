@extends('cms.layouts.master')
@section('content')



 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        {{-- <div class="container-fluid"> --}}
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Url redirect</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="#">Url redirect</a></li>
              </ol>
            </div><!-- /.col -->
          </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="box box-solid">
    <div class="box-header">
        <div class="row">
            <div class="card col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <div class="card-title">
                            Filter
                        </div>
                    </div>
                <div class="card-body">
                    <form action="" class="">
                    
                     <div class="form-group row">
                        <label for="inputCountry" class="col-sm-2 control-label">Sourch URL</label>
                        <div class="col-sm-10">
                                {{Form::text('source',null,['class'=>'form-control'])}}
                        </div>
                    </div>

                    
                     <div class="form-group row">
                        <label for="inputCountry" class="col-sm-2 control-label">Target URL</label>
                        <div class="col-sm-10">
                                {{Form::text('target',null,['class'=>'form-control'])}}
                        </div>
                    </div>
                    
                    
                    <div class="form-group row">
                        <label for="exact" class="col-sm-2 control-label">Find Exact Match</label>
                        <div class="col-sm-10">
                            {{Form::checkbox('exact_match',null,['class'=>'col-md-3 col-form-label text-right'])}}
                        </div>
                    </div>
                    
                    
                   
                   
                </div>
                <div class="box-footer">
                    <div class="col-sm-12 text-right">
                        <button class="btn btn-primary btn-sm">Search</button>

                    </div>
                </div>
            </form>
            </div>
            <div class="table-responsive" style="background-color: white;margin-left: 10px;">

                <table class="table table-hover">
                            <p class="no-margin small">Total : {{ $urls->total() }}</p>
                                    <thead>
                                        <tr>
                                            <th>Source Url</th>
                                            <th>Destination Url</th>
                                            {{-- @can('update',new App\Models\UrlRedirect()) --}}
                                            <th>Edit</th>
                                            {{-- @endcan --}}
                                            {{-- @can('delete',new App\Models\UrlRedirect()) --}}
                                            <th>Delete</th>
                                            {{-- @endcan --}}
                                           
                                        </tr>        
                                    </thead>
                                    <tbody>
                                   
                                     @foreach($urls as $url)
                                        <tr>
                                            <td>{{$url->source_url}}</td>
                                            <td>{{$url->target_url}}</td>
                                            {{-- @can('update',$url) --}}
                                            <td><a href="{{ route('editUrlRedirect',['url'=>$url->id]) }}"><i class="fa fa-edit"></a></td>
 
                                            {{-- @endcan --}}
                                            {{-- @can('delete',$url) --}}
                                            <td><a href="#" onclick="deleteItem('{{ route('deleteUrlRedirect',['url'=>$url->id])}}')"><i class="fa fa-trash text-red"></i></a></td>
                                            {{-- @endcan --}}
                                        </tr>
                                        @endforeach
                                         
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="box-footer clear-fix small-pagination">
                       {{-- @can('create',new App\Models\UrlRedirect()) --}}
                        <a id="add" href="{{ route('createUrlRedirect')}}" class="btn btn-success">add new Record</a>
                        {{-- @endcan --}}
                            {{ $urls->appends(request()->query())->links() }}
                        </div>
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
                    </div>
                    <!-- /.content-wrapper -->
                    @endsection
@section('footer')
    <script>
        $(document).ready(function(){
            $('#add').hover(function(){
                $(this).removeClass('btn-success');
                $(this).addClass('btn-primary');
            },function(){
                $(this).removeClass('btn-primary');
                $(this).addClass('btn-success');
            });
        });
    </script>
@endsection