@extends('cms.layouts.master')
@section('content')



 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Unlinked Topics</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('topicList')}}">Topic</a></li>
            <li class="breadcrumb-item active">Unlinked</li>
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
                Unlinked Topics
                </div>
            </div>
            <div class="card-body">
              <table id="example1">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                
                    @foreach ($topics as $topic)
                    <tr>
                        <td>{{$topic->name}}</td>
                        {{Form::model($category,array('route'=>['linkCategoryRoute',['id'=>$topic->id]]))}}
                        <td>
                        {{Form::select('category_id',$category,null,['class'=>'selectJS form-control','placeholder'=>'Select Category'])}}
                        </td>
                            <td>  <button class="btn btn-primary">Link</button></td>
                        {{Form::close()}}
                    </tr>
                    @endforeach
                  
                
                </tbody>
              </table>
              
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
        $(document).ready(function(){
            $('#example1').DataTable({
              "columns": [
                        { "name": "Name" },
                        { "name": "Category", "sorting":false, searching:false },
                        { "name": "Actions", "sorting":false, searching:false  }
              ]                    
            });
        });
    </script>
@endsection