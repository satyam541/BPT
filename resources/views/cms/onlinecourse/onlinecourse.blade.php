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
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#">Online Courses</a></li>
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
           
          <div class="card">

            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1">
                <thead>
                <tr>
                  <th>Online course Name</th>
                  <th>course Name</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                
                    @foreach ($onlineCourses as $onlineCourse)
                    <tr>
                      <td>{{$onlineCourse->online_course_name}}</td>
                      <td>{{$onlineCourse->course->name}}</td>
                      <td><a href="{{ route('editOnlineCourse',['course'=>$onlineCourse->id]) }}" class="fa fa-edit"></a>
                      <a href="#" onclick="deleteItem('{{ route('deleteOnlineCourse',['course'=>$onlineCourse ->id])}}')" class="fa fa-trash" style="color: red"></a>
                      </td>
                    </tr>
                    @endforeach
                  
                
                </tfoot>
              </table>
              <a id="add" href="{{ route('createOnlineCourse')}}" class="btn btn-success" style="">Add new Record</a>
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
            $('#example1').DataTable();
        });
    </script>
@endsection