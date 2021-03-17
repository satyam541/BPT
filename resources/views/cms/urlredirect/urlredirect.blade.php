@extends('cms.layouts.master')
@section('content')
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
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Url redirect</li>
              </ol>
            </div><!-- /.col -->
          </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="card card-primary card-outline">

            <div class="card-header">
                <div class="card-title">
                    Filter content
                </div>
            </div>
            <div class="card-body">
                <form action="" class="form-horizontal">
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
                    <div class="col-sm-12 text-right">
                        <button class="btn btn-primary" style="margin-bottom:20px">Search</button>
                    </div>
               </form>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
           
          <div class="card card-primary card-outline">
            <div class="card-header">
              <div class="card-title">
                 UrlRedirect List
              </div>
            </div>
            <div class="card">

              <div class="table-responsive" style="background-color: white">

                  <table class="table table-hover">
                              <p class="no-margin small">Total : {{ $urls->total() }}</p>
                                    <thead>
                                        <tr>
                                            <th>Source Url</th>
                                            <th>Destination Url</th>
                                            @can('update',new App\Models\UrlRedirect())
                                            <th>Action</th>
                                            @endcan
                                            {{-- @can('delete',new App\Models\UrlRedirect())
                                            <th>Delete</th>
                                            @endcan --}}
                                        </tr>        
                                    </thead>
                                    <tbody>
                                     @foreach($urls as $url)
                                        <tr>
                                            <td>{{$url->source_url}}</td>
                                            <td>{{$url->target_url}}</td>
                                            @can('update',$url)
                                            <td>
                                            <a href="{{ route('editUrlRedirect',['url'=>$url->id]) }}" class="fa fa-edit"></a>
 
                                            @endcan
                                            @can('delete',$url)
                                            <a href="#" onclick="deleteItem('{{ route('deleteUrlRedirect',['url'=>$url->id])}}')" class="fa fa-trash text-red"></a>
                                            @endcan
                                            </td>
                                        </tr>
                                        @endforeach
    
                                    </tfoot>
                                </table>
                                <div class="card-footer">
                                  <div class="row">
                                      <div class="col-md-6">
                             @can('create',new App\Models\UrlRedirect())
                            <a id="add" href="{{ route('createUrlRedirect')}}" class="btn btn-success">add new Record</a>
                            @endcan
                                      </div>
                            <div class="col-md-6">
                              <div class="float-sm-right">{{ $urls->links() }}</div>

                            </div>
                          </div>

                      </div>
                  </div>


              </div>
          </div>
              </section>
        </section>
            </div>
@endsection

@section('footer')
<script>
  
     
</script>
@endsection