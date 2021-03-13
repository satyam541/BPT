@extends('cms.layouts.master')
@section('content')



 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Online Courses</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Online Courses</li>
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
                Online Course List
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Topic</th>
                    <th>Addon</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                <tbody>
                
                    @foreach ($onlineCourses as $onlineCourse)
                    <tr>
                      <td>{{$onlineCourse->name}}</td>
                      <td>{{$onlineCourse->topic->name ?? null}}</td>
                      <td>
                        @can('update',$onlineCourse)
                        <a href="{{ route('courseAddonsList',['course'=>$onlineCourse->id]) }}" class="fas fa-puzzle-piece"></a>
                        @endcan
                      </td>
                      
                      <td>
                        @can('update',$onlineCourse)
                        <a href="{{Route('editCourse',['course'=>$onlineCourse->id])}}" class="fa fa-edit"></a>
                        @endcan
                        <a href="{{ route('deleteOnlineCourse',['course'=>$onlineCourse->id])}}" class="fa fa-trash" style="color: red"></a>
                      </td>
                    </tr>
                    @endforeach
                  
                
                </tfoot>
              </table>
            
              <a id="add" href="{{ route('createCourse')}}" class="btn btn-success" style="">Add new Record</a>
             
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
                        { "name": "Topic" },
                        { "name": "Actions", "sorting":false, searching:false },
                        { "name": "Addon", "sorting":false, searching:false }
              ]                    
            });
        });
    </script>
@endsection