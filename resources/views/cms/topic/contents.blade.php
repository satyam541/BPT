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
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Topic Content</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.col -->
      <!-- /.container-fluid -->
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="card card-primary card-outline">
    
                <div class="card-header">
                    <div class="card-title">
                        Filter content
                    </div>
                </div>
                <div class="card-body">
                            <form action="" class="">
               
                <div class="box-body">
                    <div class="form-group row">
                        {{Form::label('inputCourse','Topic',['class'=>'col-sm-2 control-label'])}}
                        <div class="col-sm-4">
                            {{ Form::select('topic',$list['topics'],$selectedTopic,['id'=>'inputCourse','class'=>'form-control selectJS', 'placeholder'=>'ALL','tabindex'=>'-1'])}}
                        </div>
                    </div>
                    <div class="form-group row">
                        {{Form::label('inputCountry','Country',['class'=>'col-sm-2 control-label'])}}
                        <div class="col-sm-4">
                            {{ Form::select('country',$list['countries'],$selectedCountry,['id'=>'inputCountry','class'=>'form-control selectJS', 'placeholder'=>'ALL','tabindex'=>'-1'])}}
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
                                <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Topic</th>
                                    <th>Country</th>
                                    <th>edit</th>
                                    <th>Delete</th>
                                </tr>        
                            </thead>
                            <tbody>
                                @foreach($contents as $content)
                                <tr>
                                    <td>{{$content->topic->name}}</td>
                                    <td>{{$content->country->name}}</td>
                                    <td><a href="{{ route('editTopicContent',['topicDetail'=>$content->id]) }}"><i class="fa fa-edit"></a></td>
                                    <td><a href="#" onclick="deleteItem('{{ route('deleteTopicContent',['topicDetail'=>$content->id] )}}')"><i class="fa fa-trash text-red"></i></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="box-footer clear-fix small-pagination">
                        {{-- @can('create',new App\Models\Permission) --}}
                        <a id="add" href="{{Route('createTopicContent',['topic'=>$selectedTopic,'country'=>$selectedCountry])}}" class="btn btn-success" style="">Add new record</a>
                       {{-- @endcan --}}
                          
                    {{ $contents->links() }}
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
                tags: true,
                tags: true,
                theme: "classic",
                width:'400px',
                tokenSeparators: [',', ' ']
});
 </script>
@endsection
