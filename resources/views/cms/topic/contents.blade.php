@extends('cms.layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Content</li>
            </ol>
          </div>
        </div>
      <!-- /.container-fluid -->
        <div class="box box-solid">
            <div class="box-header">
                <div class="row">
                    <div class="card col-md-12">
                        <div class="card-body">
                            <form action="" class="form-horizontal">
                <div class="box-header">Filter content</div>
                <div class="box-body">
                    <div class="form-group row">
                        {{Form::label('inputCourse','Topic',['class'=>'col-sm-2 control-label'])}}
                        <div class="col-sm-4">
                            {{ Form::select('topic',$list['topics'],$selectedTopic,['id'=>'inputCourse','class'=>'form-control selectJS', 'placeholder'=>'ALL'])}}
                        </div>
                    </div>
                    <div class="form-group row">
                        {{Form::label('inputCountry','Country',['class'=>'col-sm-2 control-label'])}}
                        <div class="col-sm-4">
                            {{ Form::select('country',$list['countries'],$selectedCountry,['id'=>'inputCountry','class'=>'form-control selectJS', 'placeholder'=>'ALL'])}}
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="col-sm-12 text-right">
                        <button class="btn btn-default">Search</button>
                    </div>
                </div>
            </form>
                    
           </div>
    
    
                <!-- /.card-header -->
                
                <div class="box-body no-padding">
                    
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
                                    <td><a href="{{ route('editCourseContent',['courseDetail'=>$content->id]) }}"><i class="fa fa-edit"></a></td>
                                    <td><a href="#" onclick="deleteItem('{{ route('deleteCourseContent',['courseDetail'=>$content->id] )}}')"><i class="fa fa-trash text-red"></i></a></td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
 </div>
</div>
<div class="box-footer clear-fix small-pagination">
    {{-- @can('create',new App\Models\Permission) --}}
    <a id="add" href="{{Route('createTopicContent',['topic'=>$selectedTopic,'country'=>$selectedCountry])}}" class="btn btn-success" style="">Add new record</a>
   {{-- @endcan --}}
      
{{ $contents->links() }}
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
